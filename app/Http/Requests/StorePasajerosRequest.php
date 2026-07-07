<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePasajerosRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'personas' => ['required', 'array', 'min:1'],
            'personas.*.nombre' => ['required', 'string', 'max:100'],
            'personas.*.apellidos' => ['required', 'string', 'max:100'],
            'personas.*.peso' => ['required', 'numeric', 'min:1', 'max:300'],
            'personas.*.fecha_nacimiento' => ['required', 'date', 'before:today'],
        ];
    }
}
