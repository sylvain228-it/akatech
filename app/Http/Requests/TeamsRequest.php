<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeamsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'f_name' => ['required', 'string', 'max:255'],
            'poste' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            'social_links' => ['nullable', 'string', 'max:255'],
            'bio' => ['nullable', 'string', 'max:2000'],
        ];
        if ($this->method() == "POST") {
            $rules += ['image' => ['required', 'image', 'mimes:png,jpg,jpeg', 'max:5242880'],];
        }
        if ($this->method() == "PUT") {
            $rules += ['image' => ['nullable', 'image', 'mimes:png,jpg,jpeg', 'max:5242880'],];
        }
        return $rules;
    }
}
