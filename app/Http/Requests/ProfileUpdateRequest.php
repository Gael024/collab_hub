<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'lowercase',
                'email',
                'max:255',
                Rule::unique(User::class)->ignore($this->user()->id),
            ],
            'celular' => ['required', 'string', 'regex:/^[0-9]{10}$/'],
            'edad' => ['nullable', 'integer', 'min:1', 'max:120'],
            'pais' => ['nullable', 'string', 'max:50'],
            'estado' => ['nullable', 'string', 'max:255'],
            'codigo_postal' => ['nullable', 'string', 'max:10'],
        ];
    }

    public function messages(): array {
        return [
            'celular.regex' => 'El número de celular debe tener exactamente 10 dígitos.',
            'edad.min' => 'La edad debe ser mayor a 14 años.',
            'edad.max' => 'La edad no puede ser mayor a 80 años.',
        ];
    }
}
