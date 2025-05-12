<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FigureUpdateRequest extends FormRequest
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
            'name' => 'string|max:255',
            'birth_name' => 'string|max:255',
            'birth_date' => 'date',
            'birth_place' => 'string|max:255',
            'death_date' => 'nullable|date',
            'death_place' => 'string|max:255',
            'nationality' => 'string|max:255',
            'short_description' => 'string|max:255',
            'portrait_url' => 'url',
            'biography' => 'string',
            'isVerified' => 'boolean',
        ];
    }
}
