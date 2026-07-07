<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Reserva extends Model
{
    protected $fillable = [
        'paquete_id', 'fecha_viaje', 'contacto_nombre', 'contacto_telefono', 'contacto_correo',
        'num_personas', 'total', 'metodo_pago', 'estado',
    ];

    public function paquete(): BelongsTo
    {
        return $this->belongsTo(Paquete::class);
    }

    public function personas(): HasMany
    {
        return $this->hasMany(ReservaPersona::class);
    }
}
