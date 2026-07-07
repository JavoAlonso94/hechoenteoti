<?php

namespace Database\Seeders;

use App\Models\Paquete;
use Illuminate\Database\Seeder;

class PaqueteSeeder extends Seeder
{
    public function run(): void
    {
        foreach (config('vuelos.paquetes', []) as $pkg) {
            Paquete::create([
                'name' => $pkg['name'],
                'adult_price' => $pkg['adult'],
                'child_price' => $pkg['child'],
                'tag' => $pkg['tag'] ?? null,
                'image' => $pkg['image'] ?? null,
            ]);
        }
    }
}
