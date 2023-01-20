<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class UpdateBookRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'id' => 'required|integer',
            'name' => 'nullable|string',
            'ISBN' => 'nullable|string',
            'value' => 'nullable|numeric',
        ];
    }

    public function failedValidation(Validator $validator)

    {

        throw new HttpResponseException(response()->json([

            'success'   => false,

            'message'   => 'Validation errors',

            'data'      => $validator->errors()

        ]));
    }



    public function messages()
    {
        return [
            'id.required' => 'An id is required',
            'id.integer' => 'The id must be an integer',
            'name.string' => 'A name must be a string',
            'ISBN.string' => 'ISBN must be a string',
            'value.decimal' => 'Value must be a decimal',
        ];
    }
}
