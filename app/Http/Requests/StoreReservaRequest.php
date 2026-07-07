<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreReservaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'paquete_id' => ['required', 'exists:paquetes,id'],
            'contacto_nombre' => ['required', 'string', 'max:150'],
            'contacto_telefono' => ['required', 'string', 'max:30'],
            'contacto_correo' => ['required', 'email', 'max:150'],
            'personas' => ['required', 'array', 'min:1'],
            'personas.*.nombre' => ['required', 'string', 'max:100'],
            'personas.*.apellidos' => ['required', 'string', 'max:100'],
            'personas.*.peso' => ['required', 'numeric', 'min:1', 'max:300'],
            'personas.*.fecha_nacimiento' => ['required', 'date', 'before:today'],
        ];
    }
}
