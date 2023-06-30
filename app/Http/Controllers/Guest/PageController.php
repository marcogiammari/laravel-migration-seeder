<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Train;

class PageController extends Controller
{
    public function index()
    {
        // $trains = Train::all();
        $trains = Train::select('azienda', 'codice_treno', 'stazione_di_arrivo', 'orario_di_partenza', 'in_orario', 'numero_carrozze', 'binario')->orderBy('orario_di_partenza', 'ASC')->get();

        return view('welcome', compact('trains'));
    }
}
