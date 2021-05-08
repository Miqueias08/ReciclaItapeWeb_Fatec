<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\cooperativas;
use App\Models\administradores;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        administradores::insert([
            "nome"=>"Miqueias Fernando",
            "email"=>"miqueiasfernando@gmail.com",
            "senha"=>Hash::make("123")
        ]);

        cooperativas::insert([
            "razao_social"=>"Cooperita",
            "tipo_documento"=>"PJ",
            "cnpj"=>"07.962.851/0007-50",
            "cpf"=>"",
            "endereco"=>"Rua Alessandro Joaquim da Costa, N°:136, Centro - Itapetininga - SP",
            "lat"=>-23.58393906088055,
            "lng"=>-48.041836782554775,
            "descricao"=>"Cooperita de reciclagem da cidade de Itapetininga",
            "status"=>1
        ]);
    }
}
