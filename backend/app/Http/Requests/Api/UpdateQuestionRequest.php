<?php

namespace App\Http\Requests\Api;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateQuestionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'test_category_id' => 'integer|exists:test_categories,id',
            'test_level_id' => 'integer|exists:test_levels,id',
            'content' => 'string',
            'type' => 'string',
        ];
    }

    public function failedValidation(Validator $validator){

        throw new HttpResponseException(response()->json([
            'success' => false,
            'error' => true,
            'message' => 'Error of validation',
            'listError' => $validator->errors(),
        ]));
    }
    public function messages(){
        return[
            'content.string' => 'Content is not string',
        ];
        
    }
}
