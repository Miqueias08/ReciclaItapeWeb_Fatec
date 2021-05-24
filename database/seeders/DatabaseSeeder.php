<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\cooperativas;
use App\Models\administradores;
use App\Models\tutoriais;
use App\Models\entregas_usuarios;
use App\Models\materiais_cooperativas;
use App\Models\usuarios;

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
        administradores::insert([
            "nome"=>"Alex Mariano",
            "email"=>"alex@gmail.com",
            "senha"=>Hash::make("123")
        ]);
        administradores::insert([
            "nome"=>"Gilson Willian",
            "email"=>"gilson@gmail.com",
            "senha"=>Hash::make("123")
        ]);

        cooperativas::insert([
            "razao_social"=>"Cooperita",
            "email"=>"miqueiasfernando@gmail.com",
            "senha"=>Hash::make("123"),
            "telefone"=>"(15)3272-7070",
            "imagem"=>"teste.jpg",
            "tipo_documento"=>"PJ",
            "cnpj"=>"07.962.851/0007-50",
            "cpf"=>"",
            "endereco"=>"Rua Alessandro Joaquim da Costa, N°:136, Centro - Itapetininga - SP",
            "lat"=>-23.58393906088055,
            "lng"=>-48.041836782554775,
            "descricao"=>"Cooperita de reciclagem da cidade de Itapetininga",
            "status"=>1
        ]);

        tutoriais::insert([
            "autor"=>"Miqueias Fernando",
            "titulo"=>"Como Reciclar Papel",
            "subtitulo"=>"A reciclagem do papel é....",
            "imagem"=>"teste.jpg",
            "texto"=>Str::random(9000),
            "video"=>"https://www.youtube.com/embed/fjt5gWCx120",
        ]);

        materiais_cooperativas::insert([
            "categoria"=>"Papel",
            "id_cooperativa"=>1
        ]);

        usuarios::insert([
            "nome"=>"Miquéias Fernando",
            "email"=>"miqueiasfernando@gmail.com",
            "senha"=>Hash::make("12345678")
        ]);

        entregas_usuarios::insert([
            "peso"=>20,
            "tipo_material"=>"papel",
            "usuario_id"=>1,
            "id_cooperativa"=>1
        ]);
    }
}
