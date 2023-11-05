<?php

namespace App\Http\Requests;

use Illuminate\Http\JsonResponse;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class EmployeeStoreRequest extends FormRequest
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
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'cpf' => 'required|string|size:14|unique:employees,cpf',
            'phone' => 'nullable|regex:/\(\d{2}\) \d{5}-\d{4}/',
            'skills' => 'required|array|min:1|max:3',
        ];
    }

    protected function failedValidation(Validator $validator) {
        $response = new JsonResponse(['errors' => $validator->errors()], 400);
        throw new \Illuminate\Validation\ValidationException($validator, $response);
    }
}
