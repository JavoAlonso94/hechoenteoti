<?php

namespace App\Http\Controllers;

use App\Models\Paquete;

class PagesController extends Controller
{
    public function index()
    {
        $paquetes = Paquete::orderBy('id')->get()->mapWithKeys(fn ($p) => [
            $p->id => [
                'name' => $p->name,
                'adult' => $p->adult_price,
                'child' => $p->child_price,
                'tag' => $p->tag,
                'image' => $p->image,
            ],
        ])->toArray();

        return view('pages.index', compact('paquetes'));
    }
}
