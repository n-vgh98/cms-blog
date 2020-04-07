<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoryRequset extends FormRequest
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
    protected function prepareForValidation()
    {
       if ($this->input('slug')){
           $this->merge(['slug'=>make_slug($this->input('slug'))]);
        }else{
           $this->merge(['slug'=>make_slug($this->input('slug'))]);
       }
    }

    public function rules()
    {
        return [
            'title'=>'required',
            'slug'=> Rule::unique('categories')->ignore(request()->category),
        ];
    }

    public function messages()
    {
        return [
            'title.required'=>'Please enter a title',
            'slug.unique'=>'This alias is already registered',
        ];
    }
}
