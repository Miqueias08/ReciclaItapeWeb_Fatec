<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/css/administrador.css">
    <link href="/fontawesome/css/all.css" rel="stylesheet">
    @stack("head_scripts")
    <title>{{ config('app.name') }}</title>
  </head>
  <body>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-2 sidebar">
          <div class="col-md-12 logo-sidebar">
            <a href="/" style="text-decoration: none;color: white;">{{ config('app.name') }}</a>
            <!-- <img src="/img/logo.png"> -->
          </div>
          
          <ul class="lista-de-botoes">
            <li class="btn-lista">
              <a href="/administrador/cooperativas"><i class="fas fa-map-marked-alt"></i>Cooperativas</a>
            </li>  
            <li class="c-sidebar-nav-title"><span>Cadastros</span></li> 
            <li class="btn-lista">
              <a href="/administrador/cadastro/cooperativas"><i class="fas fa-map"></i>Nova Cooperativa</a>
            </li>  
          </ul>
       
        </div>
        
        <div class="col-md-10 principal">
          <header>  
            <div class="col-md-12 usuario-data">
              <div class="col-md-9 header-top-btn"> 
                
              </div>
              <div class="col-md-3 btn-users">
                <ul class="lista-users">
                  <li>
                    <img src="/img/user.png" class="img-user">  
                    <ul class="lista-users-dropdown">
                      <!-- Separador -->
                      <li class="separador-dropdown">Minha Conta</li>
                      <li class="itens-dropdown"><a href=""><i class="fas fa-address-card"></i>Perfil</a></li>
                      <li class="itens-dropdown"><a href=""><i class="fas fa-key"></i>Alterar senha</a><span class="badge bg-secondary badge-info">2</span></li>
                      <!-- Separador -->
                      <li class="separador-dropdown">Pontos</li>
                      <li class="itens-dropdown"><a href="">Busca Pontos</a></li>
                      <li class="itens-dropdown"><a href="/sair"><i class="fas fa-address-card"></i>Sair</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-md-12 caminho-site">
              <ol class="breadcrumb border-0 m-0">
                <li class="breadcrumb-item"><strong>{{Str::upper(request()->route()->uri)}}</strong></li>
              </ol>
            </div>
          </header>
          <div class="conteudo">
            @yield("conteudo")
          </div>
        </div>
      

      </div>
    </div>



    <script type="text/javascript" src="/js/jquery.js"></script>
    <script type="text/javascript" src="/js/geral.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    @stack("footer_scripts")
  </body>
</html>