<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class DocumentUploadRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'document' => ['required', 'file', 'mimes:pdf', 'max:5120']
        ];
    }

    public function messages():array{
        return [
            'document.required' => 'Please upload a document.',
            'document.max' => 'Document size must be less than 5MB.',
            'document.mimes' => 'Document must be a PDF file.',
            'document.file' => 'Document must be a file.',
        ];
    }
}
