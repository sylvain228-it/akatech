<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServicesRequest extends FormRequest
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
            'title' => ['required', 'string', 'max:255'],
            'price' => ['nullable', 'numeric'],
            'cover' => ['nullable', 'image', 'mimes:jpg,png,jpeg,gif,svg', 'max:2048'],
            'description' => ['required', 'string', 'max:255'],
            'content' => ['nullable', 'string', 'max:2000'],
        ];
        return $rules;
    }
}