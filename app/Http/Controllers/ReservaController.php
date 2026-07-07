<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReservaRequest;
use App\Models\Paquete;
use App\Models\Reserva;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ReservaController extends Controller
{
    /**
     * Fase 1: registra el vuelo, al responsable de la reserva y el método de pago.
     * El total aquí es un estimado (precio adulto x num_personas); se ajusta en la fase 2.
     */
    public function store(StoreReservaRequest $request)
    {
        $data = $request->validated();
        $paquete = Paquete::findOrFail($data['paquete_id']);

        $reserva = Reserva::create([
            'paquete_id' => $paquete->id,
            'fecha_viaje' => $data['fecha_viaje'],
            'contacto_nombre' => $data['contacto_nombre'],
            'contacto_telefono' => $data['contacto_telefono'],
            'contacto_correo' => $data['contacto_correo'],
            'num_personas' => $data['num_personas'],
            'total' => $data['num_personas'] * $paquete->adult_price,
            'metodo_pago' => $data['metodo_pago'],
            'estado' => 'pendiente_pasajeros',
        ]);

        return response()->json([
            'ok' => true,
            'reserva_id' => $reserva->id,
            'total_estimado' => $reserva->total,
        ]);
    }

    /**
     * Fase 2: se solicita después de "pagar". Aquí sí se capturan los pasajeros
     * y se recalcula el total real según la edad de cada uno.
     */
    public function storePasajeros(StorePasajerosRequest $request, Reserva $reserva)
    {
        $paquete = $reserva->paquete;
        $data = $request->validated();

        $reserva = DB::transaction(function () use ($data, $paquete, $reserva) {
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

            $reserva->personas()->createMany($personas);
            $reserva->update([
                'num_personas' => count($personas),
                'total' => $total,
                'estado' => 'completada',
            ]);

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
