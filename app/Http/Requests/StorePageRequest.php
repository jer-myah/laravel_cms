<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePageRequest extends FormRequest
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
            'image' => 'required|image|mimes:png,jpg|max:1024',
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
            'image.required' => 'Cover image field is required!',
            'image.mimes' => 'Only jpg and png allowed!',
            'content.required' => 'Name is required!',
            'meta_title.required' => 'Meta title is required!',
            'meta_title.max' => 'Meta title is too long!',
            'meta_description.required' => 'Meta description is required!',
            'meta_description.max' => 'Meta description is too long!',
            'meta_keywords.required' => 'Meta keywords is required!',
        ];
    }
}
