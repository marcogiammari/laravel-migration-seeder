<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator;
use App\Models\Train;

class TrainsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Generator $faker)
    {
        // recupera le città da config/seeder.php
        $cities = config('seeder.cities');

        for ($i = 0; $i < 100; $i++) {


            $newTrain = new Train();

            // numero casuale per settare il 25% di probabilità
            $newTrain->azienda_id =  rand(0, 3);

            // assegnazione casuale della città
            $newTrain->stazione_di_arrivo = $cities[rand(0, count($cities) - 1)];
            $newTrain->orario_di_partenza = $faker->time();
            $newTrain->orario_di_arrivo = $faker->time();
            $newTrain->codice_treno = strval(rand(1000, 9999));
            $newTrain->numero_carrozze = $faker->numberBetween(6, 12);

            // numero casuale per settare il 20% di probabilità
            $on_time = rand(0, 4);
            // on_time è numero diverso da zero il treno è in orario, altrimenti calcola un ritarto variabile tra 5 e 50 minuti
            if ($on_time) {
                $newTrain->ritardo = "No";
            } else {
                $newTrain->ritardo = strval(5 * rand(1, 10)) . '\'';
            }
            $newTrain->cancellato = $faker->boolean();
            $newTrain->binario = $faker->numberBetween(6, 12);
            $newTrain->save();
        }
    }
}
