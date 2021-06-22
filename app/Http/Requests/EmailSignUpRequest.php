<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmailSignUpRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // check if user email exist
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'sponsor-username'      => ['sometimes', 'string', 'max:180'],
            'sponsor-availability'  => ['sometimes', 'nullable'],
            'first-name'            => ['required', 'string', 'max:180'],
            'last-name'             => ['required', 'string', 'max:180'],
            'gender-select'         => ['required', 'string', 'in:male,female,others'],
            'date_of_birth'         => ['required', 'string', 'date_format:d-m-Y'],
            'email_address'         => ['required', 'string', 'email', 'max:180', 'unique:users,email'],
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
            'first-name.required' => 'Please enter your first name.',
            'first-name.max' => 'First name can not be more than 180 characters.',
            'last-name.required' => 'Please enter your last name.',
            'last-name.max' => 'Last name can not be more than 180 characters.',

        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'date_of_birth' => 'date of birth',
        ];
    }

    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        $this->merge([
            // 'date_of_birth' => date('d/m/Y', strtotime($this->date_of_birth),
        ]);
    }
}
