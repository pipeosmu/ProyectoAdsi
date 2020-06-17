<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
                'name_category' => 'required|min:4|unique:categories',
                'image' => 'max:1000'
            ];
        }else{
            //Form Create
            return [
                'name_category' => 'required|min:4|unique:categories',
                'image' => 'required|image|max:1000'
            ];
        }
    }

    public function messages(){
        return [
            'name_category.required' => 'El campo nombre es obligatorio',
            'name_category.min' => 'El campo nombre debe tener mínimo :min caracteres',
            'name_category.unique' => 'El campo nombre debe ser único',
            'image.required' => 'El campo imagen es obligatorio',
            'image.image' => 'El campo imagen debe ser de tipo imagen',
            'image.max' => 'El campo imagen no puede superar 1 kilobyte'
        ];
    }
}
