<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Train;

class PageController extends Controller
{
    public function index(Request $request)
    {
        // setta il fuso orario
        date_default_timezone_set('Europe/Rome');
        // formatta il timestamp corrente in ore, minuti, secondi
        $time = date('h:i:s', time());

        // recupera i nomi delle aziende da config/seeder.php
        $companies = config('seeder.companies');

        // seleziona massimo dieci treni, in ordine di orario di partenza, che hanno un orario di partenza posteriore alla variabile $time 
        $trains = Train::select('azienda_id', 'codice_treno', 'stazione_di_arrivo', 'orario_di_partenza', 'ritardo', 'numero_carrozze', 'binario')->where('orario_di_partenza', '>', $time)->orderBy('orario_di_partenza', 'ASC')->limit(10)->get();

        return view('welcome', compact('trains', 'companies'));
    }
}
