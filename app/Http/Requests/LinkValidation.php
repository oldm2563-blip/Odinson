<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LinkValidation extends FormRequest
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
            'title' => 'required',
            'link' => ['required', 'url', 'active_url'],
            'catagory_id' => 'required'
        ];
    }

    public function messages(): array
    {
    return [
        'title.required' => 'Please Fill out The title.',
        'link.required' => 'The URL field cannot be empty.',
        'link.url' => 'This must be a valid URL format.',
        'link.active_url' => 'This URL does not exist or is unreachable.',
        'catagory_id.required' => 'Please select a category.',
        ];
    }   
}
