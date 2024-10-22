<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Models
use App\Models\Pasta;

class PastaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pasta::truncate();

        $pastas = config('pasta');

        foreach ($pastas as $pasta) {
            $newPasta = new Pasta();
            $newPasta->src = $pasta['src'];
            $newPasta->title = $pasta['titolo'];
            $newPasta->type = $pasta['tipo'];
            $explodedCottura = explode(' ', $pasta['cottura']);
            $newPasta->cooking_time = intval($explodedCottura[0]);
            $pesoSubstr = substr($pasta['peso'], 0, strlen($pasta['peso']) - 1);
            $newPasta->weight = intval($pesoSubstr);
            $newPasta->description = $pasta['descrizione'];
            $newPasta->save();
        }
    }
}
