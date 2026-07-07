<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Paquete extends Model
{
    protected $fillable = ['name', 'adult_price', 'child_price', 'tag', 'image'];

    public function reservas(): HasMany
    {
        return $this->hasMany(Reserva::class);
    }
}
