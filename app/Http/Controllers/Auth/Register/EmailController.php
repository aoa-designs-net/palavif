<?php

namespace App\Http\Controllers\Auth\Register;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RedirectsUsers;
use App\Http\Controllers\Auth\Traits\CreateUser;
use App\Http\Controllers\Auth\Traits\TemporaryStorage;

class EmailController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Email Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users using email 
    | registration as well as their validation and creation. 
    |
    */

    use CreateUser, RedirectsUsers, TemporaryStorage;

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
    public function partOneForm()
    {
        return view('auth.register.parts.one', ['form_part' => 'ONE', 'user' => null]);
    }

    /**
     * Show the application registration form.
     * 
     * @param  \App\Models\TemporaryStorage  $temp
     * 
     * @return \Illuminate\View\View
     */
    public function partTwoForm(\App\Models\TemporaryStorage $temp)
    {
        return view('auth.register.parts.two', ['form_part' => 'TWO', 'user' => $temp->uuid]);
    }

    /**
     * Handle part one email registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function registerPartOne(Request $request)
    {
        $validated = $this->validate($request, [
            'form-part'             => 'required|string|in:ONE,TWO',
            'sponsor-username'      => ['nullable', 'exists:users,username'],
            'sponsor-availability'  => ['sometimes', 'nullable'],
            'first-name'            => ['required', 'string', 'max:180'],
            'last-name'             => ['required', 'string', 'max:180'],
            'gender-select'         => ['required', 'string', 'in:male,female,others'],
            'date_of_birth'         => ['required', 'string', 'date_format:Y-m-d'],
            'email_address'         => ['required', 'string', 'email', 'max:180', 'unique:users,email'],
        ],['sponsor-username.exists' => 'Sponsor username doesn\'t exist',]);
        return collect($partOneFormData = $this->storeTemp($validated))->isNotEmpty()
            ? redirect()->route('register.email.part.two', ['temp' => $partOneFormData->uuid])
            : back()->withInputs();
    }
    /**
     * Handle part two email registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function registerPartTwo(Request $request)
    {
        $validator =  $this->PartTwovalidator($request->all());
        if ($validator->fails()) {
            return redirect()->route('register.email.part.two', ['temp' => $request->user])->withErrors($validator);
        }

        event(new Registered($user = $this->createUser($request->all())));

        $this->guard()->login($user);

        if ($response = $this->registered($request, $user)) {
            return $response;
        }

        return redirect()->route('dashboard.index');

        // return $request->wantsJson()
        //     ? new JsonResponse([], 201)
        //     : redirect($this->redirectPath());
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
            'user'      => ['required', 'string', 'uuid', 'exists:temporary_storages,uuid'],
            'your-username'  => ['required', 'string', 'max:180', 'unique:users,username'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'location' => ['required', 'string'],
            'userPhoneNumber' => ['required', 'string'],
            'placer_username'  => 'nullable|exists:users,username',
            'accept_terms_privacy' => ['required', 'accepted']
        ]);
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
}
