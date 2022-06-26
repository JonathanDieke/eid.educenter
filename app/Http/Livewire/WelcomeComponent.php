<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Lockout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\ValidationException;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\View\Components\AppLayout;

class WelcomeComponent extends Component
{
    public $name;
    public $email;
    public  $password;
    public $password_confirmation ;
    protected $auth;

    public $formType ;

    public function mount(AuthenticatedSessionController $auth){
        $this->auth = $auth ;
        // $this->name = "jojo";
        $this->email = "jojo@jojo.ci";
        $this->password = "password";
        // $this->password_confirmation = " " ;
    }

    public function setForm($formType){
        $this->formType = $formType ;
    }

    protected function rules(){
        if($this->formType == "loginForm"){
            return   [
                'email' => ['required', 'string', 'email', 'max:128'],
                'password' => ['required', 'string'],
            ];
        }elseif($this->formType == "registerForm"){
            return   [
                'name' => ['required', 'string', 'max:128'],
                'email' => ['required', 'string', 'email', 'max:128', 'unique:users'],
                'password' => ['required', 'string', 'confirmed', Password::defaults()],
            ];

        }
    }

    public function updated($propertyName){
        // if(in_array($propertyName, array("email", "password")) ){
        //     $this->validateOnly($propertyName,  [
        //         'email' => ['required', 'string', 'email', 'max:128'],
        //         'password' => ['required', Password::defaults()],
        //     ]);
        // }else{
        //     $this->validateOnly($propertyName);
        // }
        $this->validateOnly($propertyName);
    }

    public function hydrate()
    {
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function register(){

        $this->validate();

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }

    public function login(){
        $this->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ]);

        $this->authenticate();

        session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Attempt to authenticate the request's credentials.
     *
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function authenticate(){
        $this->ensureIsNotRateLimited();

        if (! Auth::attempt(['email' => $this->email, 'password' => $this->password] )) { // other param for attempt method : $this->boolean('remember')
            RateLimiter::hit($this->throttleKey());

            throw ValidationException::withMessages([
                'email' => trans('auth.failed'),
            ]);
        }

        RateLimiter::clear($this->throttleKey());
    }

    /**
     * Ensure the login request is not rate limited.
     *
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function ensureIsNotRateLimited(){
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        event(new Lockout(new Request(array(), compact('password', 'email'))));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'email' => trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    /**
     * Get the rate limiting throttle key for the request.
     *
     * @return string
     */
    public function throttleKey()
    {
        return Str::lower($this->email).'|'.request()->ip();
    }
    public function render()
    {
        return view('livewire.welcome-component')->layout(AppLayout::class);
    }
}
