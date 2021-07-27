<?php

namespace App\Http\Requests;

use Illuminate\Support\Str;
use Illuminate\Foundation\Http\FormRequest;
use App\Http\Controllers\Auth\Traits\PreparePhoneNumber;

class EmailRegistrationRequest extends FormRequest
{
    /**
     * Indicates if the validator should stop on the first rule failure.
     *
     * @var bool
     */
    protected $stopOnFirstFailure = true;

    /**
     * The route to redirect to if validation fails.
     *
     * @var string
     */
    // protected $redirectRoute = ;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // come back to validate that $this->user exist before returning true
        // dd(request()->all(), $this->user);
        return true;
    }

    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        $this->merge([
            'userPhoneNumber' => PreparePhoneNumber::take($this->userPhoneNumber),
            'your_username' => Str::lower($this->your_username)
        ]);
    }

    /**
     * The redirector instance.
     *
     * @return \Illuminate\Routing\Redirector
     */
    protected function redirector()
    {
        return redirect()->route('register.email.part.two', ['temp' => $this->user]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'user'      => ['required', 'string', 'uuid', 'exists:temporary_storages,uuid'],
            'your_username'  => ['required', 'string', 'max:180', 'unique:users,username'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'location' => ['required', 'string'],
            'userPhoneNumber' => ['required', 'unique:users,phone_number'],
            'placer_username'  => 'nullable|exists:users,username',
            'accept_terms_privacy' => ['required', 'accepted']
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'your-username.unique' => 'The username already exist',
            'userPhoneNumber.unique' => 'The phone number already exist',
        ];
    }
}
