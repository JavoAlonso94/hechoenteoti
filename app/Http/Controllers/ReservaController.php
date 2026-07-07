<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReservaRequest;
use App\Models\Paquete;
use App\Models\Reserva;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ReservaController extends Controller
{
    public function store(StoreReservaRequest $request)
    {
        $data = $request->validated();
        $paquete = Paquete::findOrFail($data['paquete_id']);

        $reserva = DB::transaction(function () use ($data, $paquete) {
            $total = 0;
            $personas = [];

            foreach ($data['personas'] as $persona) {
                $edad = Carbon::parse($persona['fecha_nacimiento'])->age;
                $precio = $edad <= 10 ? $paquete->child_price : $paquete->adult_price;
                $total += $precio;

                $personas[] = [
                    'nombre' => $persona['nombre'],
                    'apellidos' => $persona['apellidos'],
                    'peso' => $persona['peso'],
                    'fecha_nacimiento' => $persona['fecha_nacimiento'],
                    'edad' => $edad,
                ];
            }

            $reserva = Reserva::create([
                'paquete_id' => $paquete->id,
                'contacto_nombre' => $data['contacto_nombre'],
                'contacto_telefono' => $data['contacto_telefono'],
                'contacto_correo' => $data['contacto_correo'],
                'num_personas' => count($personas),
                'total' => $total,
            ]);

            $reserva->personas()->createMany($personas);

            return $reserva;
        });

        return response()->json([
            'ok' => true,
            'reserva_id' => $reserva->id,
            'total' => $reserva->total,
            'num_personas' => $reserva->num_personas,
        ]);
    }
}
