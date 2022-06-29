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
use Carbon\Carbon;

class WelcomeComponent extends Component
{
    public $name, $lname, $birthdate, $country, $state, $city, $native_language, $use_language, $gender;
    public $email;
    public  $password;
    public $password_confirmation ;

    protected $auth;
    public $formType ;
    private $date;

    public function mount(AuthenticatedSessionController $auth){
        $this->auth = $auth ;
        // $this->name = "jojo";
        // $this->lname = "lord";
        // $this->gender = "male";
        // $this->birthdate = "2000-12-23";
        // $this->country = "pays1";
        // $this->state = "etat1";
        // $this->city = "ville1";
        // $this->native_language = "french";
        // $this->use_language = "french";
        $this->email = "rodriguez.kennedy@example.org";
        $this->password = "password";
        // $this->password_confirmation = "password" ;

        $this->date = Carbon::now()->subYears(5);
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
                'lname' => ['required', 'string', 'max:128'],
                'gender' => ['required', 'string', 'max:128', 'in:male,female'],
                'birthdate' => ['required', 'date', 'date_format:Y-m-d', "before_or_equal:$this->date"],
                'country' => ['required', 'string', 'max:128'],
                'state' => ['required', 'string', 'max:128'],
                'city' => ['required', 'string', 'max:128'],
                'native_language' => ['required', 'string', 'max:128', 'in:french,english,spanish, russian'],
                'use_language' => ['required', 'string', 'max:128', 'in:french,english,spanish, russian'],
                'email' => ['required', 'string', 'email', 'max:128', 'unique:users'],
                'password' => ['required', 'string', 'confirmed', Password::defaults()],
            ];

        }
    }

    public function updated($propertyName, $valueProperty){
        $this->validateOnly($propertyName);
    }

    public function hideModal()
    {
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function register(){
        // $this->resetErrorMessage();
        $data = $this->validate();
        $data["password"] = Hash::make($data["password"]);
        dd($data);

        $user = User::create($data);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }

    public function login(){
        // $this->resetErrorMessage();
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
