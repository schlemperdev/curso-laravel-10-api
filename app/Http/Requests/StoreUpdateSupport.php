<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUpdateSupport extends FormRequest
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
        $rules = [
            'subject' => 'required|unique:supports|min:3|max:255',
            'message' => 'required|min:10|max:5000',
        ];

        if ($this->method() === 'PUT' || $this->method() === 'PATCH') {
            $rules['subject'] = [
                'required',
                'min:3',
                'max:255',
                Rule::unique('supports')->ignore($this->id ?? $this->support),
            ];
        }

        return $rules;
    }
}
