<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImageCarouselRequest extends FormRequest
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
            'title' => ['nullable', 'string', 'max:100'],
            'description' => ['nullable', 'string', 'max:255'],
            'link' => ['nullable', 'string', 'max:255'],
            'link_text' => ['nullable', 'string', 'max:255'],
            'link2' => ['nullable', 'string', 'max:255'],
            'link2_text' => ['nullable', 'string', 'max:255'],
            'img_pos' => ['nullable', 'string', 'max:255'],
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