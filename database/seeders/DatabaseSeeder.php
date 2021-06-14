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

        cooperativas::insert([
            "razao_social"=>"Cooperativa X",
            "email"=>"miqueiasfernando1@gmail.com",
            "senha"=>Hash::make("123"),
            "telefone"=>"(15)3272-7070",
            "imagem"=>"teste.jpg",
            "tipo_documento"=>"PJ",
            "cnpj"=>"07.962.851/0007-50",
            "cpf"=>"",
            "endereco"=>"Rua Alessandro Joaquim da Costa, N°:136, Centro - Itapetininga - SP",
            "lat"=>-23.617767254050896,
            "lng"=>-48.060991293599216,
            "descricao"=>"Cooperita de reciclagem da cidade de Itapetininga",
            "status"=>1
        ]);

        cooperativas::insert([
            "razao_social"=>"Cooperativa Y",
            "email"=>"miqueiasfernando2@gmail.com",
            "senha"=>Hash::make("123"),
            "telefone"=>"(15)3272-7070",
            "imagem"=>"teste.jpg",
            "tipo_documento"=>"PJ",
            "cnpj"=>"07.962.851/0007-50",
            "cpf"=>"",
            "endereco"=>"Rua Alessandro Joaquim da Costa, N°:136, Centro - Itapetininga - SP",
            "lat"=>-23.58821120786324,
            "lng"=>-48.02549413928775,
            "descricao"=>"Cooperita de reciclagem da cidade de Itapetininga",
            "status"=>1
        ]);

        cooperativas::insert([
            "razao_social"=>"Cooperativa Z",
            "email"=>"miqueiasfernando3@gmail.com",
            "senha"=>Hash::make("123"),
            "telefone"=>"(15)3272-7070",
            "imagem"=>"teste.jpg",
            "tipo_documento"=>"PJ",
            "cnpj"=>"07.962.851/0007-50",
            "cpf"=>"",
            "endereco"=>"Rua Alessandro Joaquim da Costa, N°:136, Centro - Itapetininga - SP",
            "lat"=>-23.578378450260626,
            "lng"=>-48.07776502750831,
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
        /*USUARIOS*/
        usuarios::insert([
            "nome"=>"Miquéias Fernando",
            "email"=>"miqueiasfernando@gmail.com",
            "senha"=>Hash::make("12345678")
        ]);

        entregas_usuarios::insert([
            "peso"=>8310,
            "tipo_material"=>"papel",
            "usuario_id"=>1,
            "id_cooperativa"=>1
        ]);

        usuarios::insert([
            "nome"=>"Alex Mariano",
            "email"=>"alexmariano@gmail.com",
            "senha"=>Hash::make("12345678")
        ]);
         entregas_usuarios::insert([
            "peso"=>2450,
            "tipo_material"=>"plastico",
            "usuario_id"=>2,
            "id_cooperativa"=>1
        ]);

        usuarios::insert([
            "nome"=>"Gilson Willian",
            "email"=>"gilson@gmail.com",
            "senha"=>Hash::make("12345678")
        ]);
        entregas_usuarios::insert([
            "peso"=>2245,
            "tipo_material"=>"vidro",
            "usuario_id"=>3,
            "id_cooperativa"=>1
        ]);
         usuarios::insert([
            "nome"=>"Jade Calado Rolim",
            "email"=>"jade@gmail.com",
            "senha"=>Hash::make("12345678")
        ]);
         entregas_usuarios::insert([
            "peso"=>1500,
            "tipo_material"=>"papel",
            "usuario_id"=>4,
            "id_cooperativa"=>1
        ]);
        usuarios::insert([
            "nome"=>"Jadir Frota Varejão",
            "email"=>"jadir@gmail.com",
            "senha"=>Hash::make("12345678")
        ]);
        entregas_usuarios::insert([
            "peso"=>1850,
            "tipo_material"=>"metal",
            "usuario_id"=>5,
            "id_cooperativa"=>1
        ]);

        usuarios::insert([
            "nome"=>"Doriana Vilas Boas Canejo",
            "email"=>"doriana@gmail.com",
            "senha"=>Hash::make("12345678")
        ]);
        entregas_usuarios::insert([
            "peso"=>2300,
            "tipo_material"=>"metal",
            "usuario_id"=>6,
            "id_cooperativa"=>1
        ]);

        usuarios::insert([
            "nome"=>"Cristal Alvim Foquiço",
            "email"=>"cristal@gmail.com",
            "senha"=>Hash::make("12345678")
        ]);
        entregas_usuarios::insert([
            "peso"=>1320,
            "tipo_material"=>"metal",
            "usuario_id"=>7,
            "id_cooperativa"=>1
        ]);
    }
}
