<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePageRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255|min:4',
            'content' => 'required|string',
            'meta_title' => 'required|string|max:255|min:4',
            'meta_description' => 'required|string|max:255|min:4',
            'meta_keywords' => 'required|string|max:255|min:4',
        ];
    }

    /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return [
            'title.required' => 'Title field is required!',
            'title.string' => 'Title field must be string!',
            'content.required' => 'Name is required!',
            'meta_title.required' => 'Meta title is required!',
            'meta_title.max' => 'Meta title is too long!',
            'meta_description.required' => 'Meta description is required!',
            'meta_description.max' => 'Meta description is too long!',
            'meta_keywords.required' => 'Meta keywords is required!',
        ];
    }
}
