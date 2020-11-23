<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         DB::table('markers')->insert([
            'name' => 'Fatec Itapetininga',
            'address' => 'R. João Viêira Camargo, 104 - Vila Barth, Itapetininga - SP, 18205-600',
            'lat' => '-23.601105',
            'lng' => '-48.051410',
            'type' => 'teste',
            'papel'=>true,
            'plastico'=>true,
            'vidro'=>true,
        ]);
         DB::table('usuarios')->insert([
            'email' => 'miqueiasfernando@gmail.com',
            'senha' => Hash::make('123'),
        ]);
        DB::table('usuarios')->insert([
            'email' => 'alex.almeida3@fatecitapetininga.edu.br',
            'senha' => Hash::make('123'),
        ]);
         DB::table('usuarios')->insert([
            'email' => 'gilson.santos3@fatecitapetininga.edu.br',
            'senha' => Hash::make('123'),
        ]);
    }
}
