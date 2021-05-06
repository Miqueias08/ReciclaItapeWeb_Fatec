<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pontos')->insert([
            'nome' => Str::random(10),
            'endereco' => "Rua Teste",
            'lat' => -23.58393906088055,
            'lng' => -48.041836782554775,
            'tipo' => "Tipo:Teste",
        ]);
    }
}
