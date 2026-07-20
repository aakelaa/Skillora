<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApplyToJobRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()?->isFreelancer() ?? false;
    }

    public function rules(): array
    {
        return [
            'cover_letter' => ['required', 'string', 'min:30', 'max:2000'],
        ];
    }
}
