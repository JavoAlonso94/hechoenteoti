<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Configuración de Paquetes de Vuelos en Globo
    |--------------------------------------------------------------------------
    |
    | Aquí se definen los paquetes disponibles para los vuelos en globo
    | sobre Teotihuacán. Cada paquete incluye nombre, precios por adulto
    | y niño, etiqueta descriptiva y una imagen opcional.
    |
    */
    'paquetes' => [
        1 => [
            'name'   => 'Vuelo esencial',
            'adult'  => 2199,
            'child'  => 1999,
            'tag'    => '✅ Brindis + diploma',
            'image'  => 'assets/img/carrusel/940-788-max.jpg',
        ],
        2 => [
            'name'   => 'Vuelo + Desayuno',
            'adult'  => 2299,
            'child'  => 2149,
            'tag'    => '🍽️ Desayuno en hacienda',
            'image'  => null, 
        ],
        3 => [
            'name'   => 'Todo incluido (CDMX)',
            'adult'  => 2749,
            'child'  => 2599,
            'tag'    => '🚐 Transporte redondo + desayuno',
            'image'  => null,
        ],
        4 => [
            'name'   => 'Experiencia completa',
            'adult'  => 2949,
            'child'  => 2799,
            'tag'    => '🏛️ Acceso pirámides + guía',
            'image'  => null,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Configuración adicional de vuelos
    |--------------------------------------------------------------------------
    */
    'horarios_disponibles' => [
        'lunes_a_viernes' => ['06:00', '06:30'],
        'sabado_domingo'  => ['06:00', '06:30', '07:00'],
    ],

    'descuentos' => [
        'grupo_4' => [
            'porcentaje' => 6,
            'codigo'     => 'TEOTI2025',
            'min_personas' => 4,
        ],
    ],

    'disponibilidad_proximas' => [
        '2026-06-20',
        '2026-06-21',
        '2026-06-22',
        '2026-06-27',
        '2026-06-28',
    ],
];
