<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ReservaPersona extends Model
{
    protected $table = 'reserva_personas';

    protected $fillable = ['reserva_id', 'nombre', 'apellidos', 'peso', 'fecha_nacimiento', 'edad'];

    protected $casts = ['fecha_nacimiento' => 'date'];

    public function reserva(): BelongsTo
    {
        return $this->belongsTo(Reserva::class);
    }
}
