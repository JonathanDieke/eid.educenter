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
use App\Models\Country;
use App\View\Components\AppLayout;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;

class WelcomeComponent extends Component
{
    // public $name, $lname, $birthdate, $country, $state, $city, $native_language, $use_language, $gender;
    public $email;
    public  $password;
    // public $password_confirmation ;

    public $register, $states = [], $cities = [];

    protected $auth;
    public $formType ;
    private $date;

    public $listeners = ["getDate"] ;

    public function getDate($date){
        $this->register['birthdate'] = $date ;
    }

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
        // $this->email = "rodriguez.kennedy@example.org";
        // $this->password = "password";
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
                'register.name' => ['required', 'string', 'max:128'],
                'register.lname' => ['required', 'string', 'max:128'],
                'register.gender' => ['required', 'string', 'max:128', 'in:male,female'],
                'register.birthdate' => ['required', 'date', 'date_format:Y-m-d', "before_or_equal:$this->date"],
                'register.country' => ['required', 'string', 'max:128'],
                'register.state' => ['required', 'string', 'max:128'],
                'register.city' => ['required', 'string', 'max:128'],
                'register.native_language' => ['required', 'string', 'max:128', 'in:french,english,spanish, russian'],
                'register.use_language' => ['required', 'string', 'max:128', 'in:french,english,spanish, russian'],
                'register.email' => ['required', 'string', 'email', 'max:128', 'unique:users,email'],
                'register.password' => ['required', 'string', 'confirmed', Password::default()],
            ];

        }
    }

    public function updatedRegisterCountry($propertyValue, $propertyName){
        $this->register['state'] = "";
        $this->register['city'] = "";
            $this->states = Country::where('id', $propertyValue)->first()->states ;
    }
    public function updatedRegisterState($propertyValue, $propertyName){
        $this->register['city'] = "";
        $this->cities = Country::where('id', $this->register['country'])->first()->states->where('id', $propertyValue)->first()->cities ;
    }

    public function hideModal()
    {
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function register(){
        // $this->resetErrorMessage();
        $this->validate();
        // dd($data);
        $this->register["password"] = Hash::make($this->register["password"]);
        // dd($data);

        $user = User::create($this->register);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }

    public function login(){
        // $this->resetErrorMessage();
        $this->validate();

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
        $countries = Country::all();
        return view('livewire.welcome-component', compact('countries'));
    }
}
