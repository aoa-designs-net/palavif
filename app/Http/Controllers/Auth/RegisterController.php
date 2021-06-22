<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RedirectsUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RedirectsUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        return view('auth.register', ['form_part' => session('form_part') ?? 'ONE', 'user' => null]);
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        $this->validate($request, ['form-part' => 'required|string|in:ONE,TWO']);

        if ($request->input('form-part') === "ONE") {
            $intendingUser =  $this->intendingUser($this->PartOnevalidator($request->all())->validate());
            session(['form_part' => 'TWO']);
            return $intendingUser->uuid
                ? view('auth.register', ['form_part' => session('form_part'), 'user' => $intendingUser->uuid])
                : back()->with('error', 'An Error Occurred')->withInput();
        }

        if ($request->input('form-part') === "TWO") {
            $validator =  $this->PartTwovalidator($request->all());
            if ($validator->fails()) {
                session(['form_part' => 'TWO']);
                return back()->withErrors($validator);
            }
            dd($validator, 'Passed');
        }




        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        $this->guard()->login($user);

        if ($response = $this->registered($request, $user)) {
            return $response;
        }

        return $request->wantsJson()
            ? new JsonResponse([], 201)
            : redirect($this->redirectPath());
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard();
    }

    /**
     * The user has been registered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function registered(Request $request, $user)
    {
        //
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function PartOnevalidator(array $data)
    {
        return Validator::make($data, [
            'sponsor-username'      => ['sometimes', 'string', 'max:180'],
            'sponsor-availability'  => ['sometimes', 'nullable'],
            'first-name'            => ['required', 'string', 'max:180'],
            'last-name'             => ['required', 'string', 'max:180'],
            'gender-select'         => ['required', 'string', 'in:male,female,others'],
            'date_of_birth'         => ['required', 'string', 'date_format:Y-m-d'],
            'email_address'         => ['required', 'string', 'email', 'max:180', 'unique:users,email'],
        ]);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function PartTwovalidator(array $data)
    {
        return Validator::make($data, [
            'user'      => ['required', 'string', 'uuid', 'exists:intending_users,uuid'],
            'your-username'  => ['required', 'string', 'max:180', 'unique:users,username'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'location' => ['required', 'string'],
            'userPhoneNumber' => ['required', 'string'],
            'placer_username'  => 'nullable|exists:users,username',
            'accept_terms_privacy' => ['required', 'accepted']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['first-name'] . " " . $data['last-name'],
            'username' => $data['your-username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'date_of_birth' => $data['date-of-birth'],
            'gender' => $data['gender-select'],
            'phone_number' => $data['your-phone-number'],
            'phone_country' => $data['your-phone-country'],
            'location' => $data['your-location'],
            'sponser_username' => $data['sponsor-username'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * 
     * @return \App\Models\IntendingUser
     */
    protected function intendingUser(array $data)
    {
        return \App\Models\IntendingUser::create([
            'request' => $data,
        ]);
    }
}
