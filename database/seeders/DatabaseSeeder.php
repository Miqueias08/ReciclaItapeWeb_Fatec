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








         tutoriais::insert([
            "autor"=>"Miqueias Fernando",
            "titulo"=>"Reciclagem: o que é e qual a importância",
            "subtitulo"=>"A reciclagem, assim como",
            "imagem"=>"teste.jpg",
            "texto"=>"A reciclagem, assim como o tratamento dado ao lixo, é mais antiga do que se pensa Ela faz parte dos três “R’s” ou “erres”: reciclagem, reutilização e redução. Como a reciclagem consiste em reprocessar um item, ela é diferente da reutilização (em que há apenas a utilização do item para outra função) e da redução (que consiste em diminuir o consumo de determinados produtos).Mas essa “definição fria”, apesar de importante, não nos leva à origem da história nem ajuda a entender qual a importância da reciclagem. Além de se perguntar “o que é reciclagem”, você já imaginou “como surgiu” a prática de reciclar as coisas? Vamos começar da origem: o lixo. Mas antes, dê uma olhada no vídeo exclusivo do canal do Portal eCycle no YouTube – aproveite e inscreva-se para acompanhar os lançamentos:
Qual a origem da reciclagem
Desde que o mundo é mundo, o lixo existe. Os nômades já descartavam os restos dos animais que caçavam e, à medida em que o homem foi ficando mais “civilizado”, a quantidade de lixo produzida por ele também aumentou.

De acordo com um estudo da Universidade Estadual do Rio de Janeiro (UERJ), as civilizações antigas (como os hindus) já dispunham de sistema de esgoto, além de pavimentação nas ruas. Os israelitas, por exemplo, possuíam regras explícitas de como descartar seus excrementos e os restos dos animais sacrificados, bem como os cadáveres e o lixo produzido no reino.

Na Idade Média, sabe-se que várias cidades italianas tinham normas para a destinação de objetos e carcaças de animais, assim como a eliminação de águas paradas e a proibição de lixo e fezes nas ruas.

Foi também na Idade Média que surgiram os primeiros serviços de coleta de lixo. Inicialmente, estes eram prestados por particulares, mas quando fracassavam, optava-se pelo serviço público – que era exercido pelos carrascos da cidade e seus auxiliares, tendo muitas vezes a ajuda das prostitutas.

Porém, na segunda metade do século XIX, com a Revolução Industrial, houve um aumento significativo na produção de lixo, causando graves impactos sanitários. Foi necessário programar novas medidas para amenizar a complicada situação dos bairros operários e também dos bairros nobres.

No século XX, a questão do lixo já não girava em torno apenas do descarte de materiais orgânicos. O destino de todo esse lixo (inclusive o industrial) também consistia em um grande problema, tanto que até a metade do século, EUA e Europa jogavam grande parte do lixo coletado nos mares, rios e áreas limítrofes.

Contudo, até aquele momento, o mundo nunca havia produzido tanto em todos os aspectos imagináveis. A Revolução Industrial trouxe consigo novos patamares de produção e, a partir desse momento histórico, a situação do descarte se tornou algo mais complexo e preocupante. Se antes o lixo era constituído apenas de material orgânico, agora ele tem características diversas: pode ser eletrônico, radioativo, industrial, químico, entre outros.

Com isso, surgiu a necessidade de pensar em alternativas que não fossem simplesmente estocar todo esse lixo em aterros ou descartá-lo de forma irregular no ambiente, já que a maior parte do “lixo moderno” demora muito mais tempo para se desintegrar naturalmente. Assim, a reciclagem assumiu um papel importante diante de tal necessidade.

A questão da reutilização também não é nova. O uso da matéria orgânica como adubo, por exemplo, é uma tradição que se perpetua por séculos – além da possibilidade de enterrar seus resíduos orgânicos para enriquecer a terra, hoje também se usa a técnica da compostagem.
O que é reciclagem
Entender o que é reciclagem é simples: trata-se de pegar algo que não tem mais utilidade e transformá-lo novamente em matéria-prima para que se forme um item igual ou sem relação com o anterior. Isso é feito de várias maneiras e vemos o resultado desse processo no nosso cotidiano.

Esse é o caso de alguns bens de consumo, como latas de alumínio, papel de escritório e recipientes de plástico. Esses materiais são reciclados em grandes quantidades. Aliás, a reciclagem desse tipo de material era comum no início do século XX, quando muitos produtos eram reutilizados devido às crises econômicas (como a de 1929) e às guerras mundiais. Na década de 1940, produtos como o náilon, a borracha, papel e muitos metais eram racionados e reciclados, para ajudar a suportar o esforço da Segunda Guerra Mundial (1939-1944).

Após esse período de recessão, países como os EUA viveram momentos de grande prosperidade econômica que impulsionaram uma cultura de consumo e desperdício. No caso da Europa – que ficou praticamente destruída após a guerra –, a implantação do Plano Marshall (que estabelecia ajuda de 17 bilhões de dólares dada pelos EUA a países devastados pela guerra) ajudou a reconstrução econômica de nações como Inglaterra, França, Alemanha e Itália.

Dessa forma, tanto Estados Unidos como os países da Europa viveriam anos de colaboração comercial que trariam novamente êxito econômico, contribuindo muito para uma sequência de décadas de abundância na fabricação de bens de consumo. Sendo assim, foi só nos anos 1970 que a reciclagem voltou a fazer parte das discussões sociais, destacando-se a criação do Dia da Terra – iniciada pelo senador estadunidense Gaylord Nelson, ativista ambiental, para a criação de uma agenda ambiental.

Atualmente, o termo reciclagem faz parte do cotidiano de milhões de pessoas ao redor do planeta, inclusive no Brasil.

Como reciclar?
Existem várias formas de destinar seu lixo para reciclagem. Em princípio, se um produto for reciclável (veja como saber), basta descartá-lo de forma correta nos cestos apropriados. Porém, nem todos os bairros, condomínios e casas possuem serviço de coleta seletiva e muitas vezes o descarte pode ser feito por meio de postos independentes (veja como localizar postos de reciclagem próximos à sua residência). Em outras ocasiões, a prefeitura municipal se encarrega desse serviço.

Também é importante dizer que o avanço tecnológico pode fazer com que um item que atualmente não é reciclável, torne-se reciclável no futuro.

Cores da coleta seletiva: reciclagem e seus significados
Para os que já são recicláveis, é preciso ter alguns cuidados especiais antes de enviá-los para coleta seletiva. Veja alguns exemplos:

Plástico
Consiste em transformar os plásticos (tanto os oriundos de sobra industrial – sobras virgens do processo produtivo – quanto os descartados pós-consumo – materiais recuperados no lixo por meio da coleta seletiva) em pequenos grânulos, que podem ser utilizados na produção de novos materiais, como sacos de lixo, pisos, mangueiras, embalagens não-alimentícias, peças de automóveis etc.

Papel
A grande quantidade de papel que é consumida no mundo causa graves problemas ambientais, como o desmatamento de florestas. Para conter esse problema, uma das soluções é a reciclagem, que reaproveita o papel usado para produzir outro novo em folha; a reciclagem é simples e barata.

Caixas de leite
A maioria das embalagens longa vida é feita a partir de uma mistura de materiais com propriedades diversas. Mesmo assim, é possível reciclá-las. É importante descartar os materiais recicláveis limpos, para não ocorrer a proliferação de doenças, odores, bem como para evitar a contaminação de itens recicláveis que estejam no mesmo local, pois caso ocorra a contaminação, a reciclagem dos materiais contaminados fica mais difícil.

Caixas de pizza
Óleo e gordura da pizza dificultam processo de reciclagem do papelão das caixas. Mas há alternativas, como criar outras embalagens ou separar as partes da caixa que não foram manchadas pela gordura, como a superfície, e enviar para coleta seletiva.

Pneus
Não são tóxicos, mas causam problemas. Apesar de não serem compostos de materiais tão nocivos a ponto de prejudicarem o meio ambiente, os pneus descartados de forma errada contribuem para a proliferação de doenças, como a dengue. Além disso, somente no Brasil, 45 milhões de pneus são produzidos por ano e muitos pneus acabam jogados em rios, o que aumenta a calha dos mesmos, podendo causar transbordamentos. Uma boa alternativa é recauchutar em uma oficina ou doar para empresas que o reutilizam de outras formas.

Lâmpadas fluorescentes
Mercúrio e chumbo são metais que estão dentro da lâmpada e podem prejudicar nossa saúde, portanto é importante tomar cuidado ao descartá-las. Outra medida é assegurar que as lâmpadas não sejam enviadas para aterros comuns. Por isso, consultar os postos de reciclagem adequados é essencial.

Lixo eletrônico
Conserte, doe, reutilize ou recicle, mas não jogue seus eletrônicos no lixo comum, pois eles possuem vários componentes e substâncias que podem causar doenças, como cádmio, chumbo e mercúrio. Sendo assim, o melhor que você pode fazer é procurar postos de reciclagem para eletrônicos (acesse a sessão específica para busca de postos do eCycle) ou tentar devolver os produtos para os fabricantes, que ficarão responsáveis a dar uma destinação correta a partir da lei de resíduos sólidos.

Amianto
A recomendação é de que o amianto seja descartado juntamente com resíduos tóxicos, em aterros especializados. O amianto é um material perigoso e que não tem como ser reutilizado ou reciclado.

O upcycle
Assim como a reciclagem, a prática de upcycling também consiste em dar uma nova utilidade a algo que foi descartado, porém, com a diferença de não usar energia para transformar o objeto em matéria-prima. Ou seja, é ainda mais ecológico, pois dispensa a energia gasta na atividade industrial. Em outras palavras, trata-se de reaproveitamento.

Podemos observar esse processo em situações que esbanjam criatividade, como reaproveitar geladeiras como bibliotecas.

Upcycle: o que é e exemplos
A tendência do upcycling também vem sendo abraçada pelas indústrias da moda e da decoração.

Qual a importância da reciclagem
Hoje em dia, com o aumento crescente na produção de resíduos e no lixo oceânico, a reciclagem é de extrema importância. Muitos países já tem essa preocupação, apoiam programas ambientais e, consequentemente, de reciclagem. No Brasil, de acordo com a associação sem fins lucrativos Cempre (Compromisso Empresarial para Reciclagem), o faturamento das cooperativas de catadores tem sido crescente nos últimos anos e houve ganhos de produtividade, mas ainda há muito por fazer.

25 milhões de toneladas de lixo vão para os oceanos todo ano
Um dos próximos passos para manter esse progresso é a formalização da atividade desempenhada pelos catadores. Além disso, muitos municípios brasileiros ainda não contam com um serviço de coleta seletiva.

Apesar de conhecermos a importância da reciclagem, ainda são poucos os resíduos coletados e reciclados no Brasil. Há uma defasagem de infraestrutura para coleta e processamento e faltam políticas públicas que incentivem a logística reversa e a redução de embalagens desnecessárias por parte de empresas, por exemplo.

Mesmo que você saiba que um item pode ser reciclável (por conta das informações da embalagem), isso não significa que ele será efetivamente reciclado. Portanto, é muito importante reduzir sua quantidade de resíduos – a compostagem doméstica é essencial para isso em termos de resíduos orgânicos; quanto aos recicláveis, a mudança de hábitos é fundamental. Sempre que puder, evite embalagens ou use produtos com a embalagem reutilizada – se não for possível, procure pelo menos por embalagens recicladas e/ou recicláveis.

Embalagens sustentáveis: o que são, exemplos e vantagens
É muito importante participar e apoiar ideias verdes que ajudem a disseminar o conceito de reciclagem no Brasil e no mundo.

Veja também:
Reciclagem de plásticos: como se dá e no que se transformam?
Guia básico da reciclagem: saiba como reaproveitar e reciclar uma série de itens do dia a dia
Entenda os processos por trás da reciclagem de equipamentos eletrônicos
O que é compostagem e como fazer
O que é a Avaliação de Ciclo de Vida (ACV) de produtos e quais seus impactos sobre o desenvolvimento sustentável?
O que é neutralização de carbono?
COMPARTILHE
Comentários

Apoio:
Roche
Saiba onde descartar seus resíduos
O QUE PRECISA DESCARTAR?

Selecione o objeto
Verifique o campo
ONDE VOCÊ DESEJA DESCARTAR?
_____-___
Inserir um CEP válido
Não sabe seu CEP?

SEU E-MAIL
Digite seu e-mail
Inserir um e-mail válido

Concorda em receber comunicações e ofertas?
Verifique o campo
Vídeos em Destaque
Acesse a matéria Como saber se estou grávida?Mulher gravida
Como saber se estou grávida?
Acesse a matéria Chá de amora: para que serve e benefícios da folha de amoraChá de amora
Chá de amora: para que serve e benefícios da folha de amora
Acesse a matéria 18 opções de remédio para dor de gargantaDor de garganta - uma mulher com as mãos tocando seu pescoço
18 opções de remédio para dor de garganta
Acesse a matéria O que é poluição do ar? Conheça causas e tiposPoluição do ar
O que é poluição do ar? Conheça causas e tipos
",
            "video"=>"",
        ]);
    }
}
