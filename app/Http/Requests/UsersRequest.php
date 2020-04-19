<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
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
            'name'=>'required',
            'email'=>'required|email',
            'roles'=>'required',
            'status'=>'required',
            'password'=>'required|min:8',
            'photo'=>'required',
        ];
    }

    public function messages()
    {

       return [
            'name.required'=>'Please enter your first and last name',
            'email.required'=>'Please enter your email',
            'email.email'=>'Your email is invalid',
            'roles.required'=>'Please select at least one role',
            'status.required'=>'Please specify your status',
            'password.required'=>'please enter your password',
            'password.min'=>'Your password must be more than 8 characters long',
            'photo.required'=>'please enter your photo',
       ];

    }
}
