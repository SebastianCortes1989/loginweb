<?php 

namespace App\Http\Requests\Login;

use Illuminate\Foundation\Http\FormRequest;
use Response;

class LoginFormRequest extends FormRequest
{
    public function rules()
    {
        return [
            'email' => 'required',
            'password' => 'required',
        ];
    }

    public function authorize()
    {
        return true;
    }

    public function messages()
    {
        return [
            'email.required'  => 'Favor ingrese E-mail',
            'password.required'  => 'Favor ingrese Password',
        ];
    }
    
}