<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        if($this->method() == 'PUT'){
            //Form Update
            return [
                'identification_user' => 'required|min:4|unique:users',
                'first_name' => 'required|min:4',
                'second_name' => 'required|min:4',
                'first_lastname' => 'required|min:4',
                'second_lastname' => 'required|min:4',
                'email' => 'required|email|unique',
                'phone' => 'required|number',
                'civil_status' => 'required',
                'password' => 'required|confirmed'
            ];
        }else{
            //Form Create
            return [
                'identification_user' => 'required|min:4|unique:users',
                'first_name' => 'required|min:4',
                'second_name' => 'required|min:4',
                'first_lastname' => 'required|min:4',
                'second_lastname' => 'required|min:4',
                'birthdate' => 'required|date',
                'email' => 'required|email|unique',
                'phone' => 'required|number',
                'civil_status' => 'required',
                'gender' => 'required',
                'role' => 'required',
                'password' => 'required|confirmed'
            ];
        }
    }

    public function messages(){
        return[
            'identification_user.required' => 'El campo identificación de usuario es obligatorio',
            'identification_user.min' => 'El campo identificación de usuario debe tener mínimo :min caracteres',
            'identification_user.unique' => 'El campo identificación de usuario debe ser único',
            'first_name.required' => 'El campo primer nombre es obligatorio',
            'first_name.min' => 'El campo primer nombre debe tener mínimo :min caracteres',
            'second_name.required' => 'El campo segundo nombre es obligatorio',
            'second_name.min' => 'El campo segundo nombre debe tener mínimo :min caracteres',
            'first_lastname.required' => 'El campo primer apellido es obligatorio',
            'first_lastname.min' => 'El campo primer apellido debe tener mínimo :min caracteres',
            'second_lastname.required' => 'El campo segundo apellido es obligatorio',
            'second_lastname.min' => 'El campo segundo apellido debe tener mínimo :min caracteres',
            'birthdate.required' => 'El campo fecha de nacimiento es obligatorio',
            'birthdate.date' => 'El campo fecha de nacimiento debe ser una fecha',
            'email.required' => 'El campo correo electrónico es obligatorio',
            'email.email' => 'El campo correo electrónico es inválido',
            'email.unique' => 'El campo correo electrónico debe ser único',
            'phone.required' => 'El campo teléfono es obligatorio',
            'phone.number' => 'El campo teléfono debe tener únicamente números',
            'civil_status.required' => 'El campo estado civil es obligatorio',
            'gender.required' => 'El campo género es obligatorio',
            'role.required' => 'El campo tipo de usuario es obligatorio',
            'password.required' => 'El campo contraseña es obligatorio',
            'password.confirmed' => 'Las contraseñas no coindicen' 
        ];
    }
}
