<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class CreateRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'price' => 'required|integer|min:0|max:90000000',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'فیلد نام اجباری میباشد',
            'name.string' => 'فیلد نام باید از نوع متن میباشد',
            'name.max' => 'فیلد نام باید از کمتر از 255 کاراکتر باشد',
            'price.required' => 'فیلد قیمت اجباری است.',
            'price.integer' => 'فیلد قیمت باید از نوع عددی باشد',
        ];
    }

    public function failedValidation(Validator $validator)
    {
        $errors = $validator->errors(); // Here is your array of errors
        throw new HttpResponseException(response()->json($errors, 422));
    }
}
