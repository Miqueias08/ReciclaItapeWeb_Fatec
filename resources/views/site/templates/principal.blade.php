<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">  
    <link rel="stylesheet" type="text/css" href="/css/site.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="/fontawesome/css/all.css" rel="stylesheet">
    <meta name="_token" content="{!! csrf_token() !!}"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">  
    <title>{{ config('app.name') }}</title> 
    @stack('scriptsHead')
</head>
<body>
  @yield("loading")
  <nav class="navbar navbar-expand-lg py-4">
      <div class="container">
        <a href="/" class="navbar-brand h1 mb-0">{{ config('app.name') }}</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSite">
            <i class="fas fa-align-justify"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarSite">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                  <a href="/" class="nav-link">Pontos de Reciclagem</a>
              </li>
              <li class="nav-item">
                  <a href="/cooperativas" class="nav-link">Cooperativas</a>
              </li>
              <li class="nav-item">
                  <a href="/tutoriais" class="nav-link">Tutoriais</a>
              </li>
              <li class="nav-item">
                  <a href="/ranking" class="nav-link">Ranking</a>
              </li>
               <li class="nav-item">
                  <a href="/login/cadastro" class="nav-link">Login - Cadastro</a>
              </li>
                <li class="nav-item" id="instagram-icon">
                  <a href="" target="_blank" class="nav-link">
                      <i class="fab fa-instagram"></i>
                  </a>
                </li>
                <li class="nav-item" id="facebook-icon">
                  <a href="#" class="nav-link">
                      <i class="fab fa-facebook-square"></i>
                  </a>
                </li>
            </ul>
          </div>
      </div>
    </nav>

    <div class="aviso-site">
      {{ config('app.name') }} @if(ISSET($titulo)) - {{$titulo}} @endif
    </div>

  <div class="container-fluid" id="dados">
          @yield('principal')
  </div>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script type="text/javascript" src="/js/jquery.js"></script>
  <script type="text/javascript" src="/js/bootstrap.js" async></script>
  <script type="text/javascript">
    $( "#instagram-icon" ).hover(function() {
        $(".fa-instagram").css("color","#FD1D1D");
      }, function() {
        $(".fa-instagram").css("color","black");
      }
    );
    $( "#facebook-icon" ).hover(function() {
        $(".fa-facebook-square").css("color","#3b5998");
      }, function() {
        $(".fa-facebook-square").css("color","black");
      }
    );
  </script>
  @stack('scriptsFooter')
</body>

</html>
