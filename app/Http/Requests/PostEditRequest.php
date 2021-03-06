<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PostEditRequest extends FormRequest
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
    protected  function prepareForValidation()
    {
        if ($this->input('slug')){
            $this->merge(['slug'=>make_slug($this->input('slug'))]);
        }else{
            $this->merge(['slug'=>make_slug($this->input('title'))]);
        }
    }
    public function rules()
    {
        return [
            'title'=>'required|min:10',
            'slug'=> Rule::unique('posts')->ignore(request()->post),
            'description'=>'required',
            'category'=>'required',
            'status'=>'required',
        ];
    }

    public function messages()
    {
        return[
            'title.required'=>'Please enter a title',
            'title.min'=>'Your title must be more than 10 characters long',
            'slug.unique'=>'This alias is already registered',
            'description.required'=>'Please enter your description',
            'category.required'=>'Please select your category',
            'status.required'=>'Please select your status',
        ];
    }
}
