<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FigureCreateRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'birth_name' => 'required|string|max:255',
            'birth_date' => 'required|date',
            'birth_place' => 'required|string|max:255',
            'death_date' => 'nullable|date',
            'death_place' => 'nullable|string|max:255',
            'nationality' => 'required|string|max:255',
            'short_description' => 'required|string|max:255',
            'gender' => 'required',
            'portrait_url' => 'nullable|url',
            'biography' => 'nullable|string',
            'isVerified' => 'boolean',
        ];
    }
}
