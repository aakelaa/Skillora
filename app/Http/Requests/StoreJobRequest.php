<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreJobRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()?->isClient() ?? false;
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'min:20'],
            'category_id' => ['nullable', 'exists:categories,id'],
            'budget' => ['required', 'numeric', 'min:0'],
            'deadline' => ['nullable', 'date', 'after:today'],
            'attachment_path' => ['nullable', 'file', 'mimes:pdf,doc,docx,png,jpg,jpeg', 'max:5120'],
        ];
    }
}
