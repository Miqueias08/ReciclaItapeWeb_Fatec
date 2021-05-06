@extends('site.templates.principal')
@section('principal')
  @push('scriptsHead')
    <link rel="stylesheet" type="text/css" href="css/reciclar.css">
  @endpush


  <nav class="navbar navbar-expand-lg">
    <a class="navbar-brand" href="#">Recicla Itapê</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="/">Reciclar <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/admin/login">Administrador</a>
        </li>
      </ul>
    </div>
  </nav>









  <div id="map"></div>










  @push('scriptsFooter')
    <script>
      var customLabel = {
        restaurant: {
          label: 'R'
        },
        bar: {
          label: 'B'
        }
      };

      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: new google.maps.LatLng(-23.589115,-48.048801),
          zoom: 14
        });
        @if(isset($markers))
        @foreach($markers as $marker)
        var info{{ $marker->id }} = new google.maps.InfoWindow({
          content: "<h2>{{ $marker->name }}</h2>"
          +"<p>{{ $marker->content }}</p>"
          +"<h5>Endereço</h5> {{ $marker->address }}<br>"
          +"<h5>O ponto coleta os seguintes tipos de lixo</h5> <br>"
          @if($marker->papel)
          +"<span class=\"glyphicon glyphicon-file\"></span><strong> Papel</strong> "
          @endif
          @if($marker->plastico)
          +"<span class=\"glyphicon glyphicon-cd\"></span><strong> Plastico</strong> "
          @endif
          @if($marker->vidro)
          +"<span class=\"glyphicon glyphicon-glass\"></span><strong> Vidro</strong>"
          @endif
        });
        var marker{{ $marker->id }} = new google.maps.Marker({
         position: {lat: {{ $marker->lat }}, lng: {{ $marker->lng }} },
         map: map,
         title: "{{ $marker->name }}"
       });
        marker{{ $marker->id }}.addListener('click', function(){
          info{{ $marker->id }}.open(map,marker{{ $marker->id }})
        });

        marker{{ $marker->id }}.setMap(map);
        @endforeach

        @endif
      }

      function downloadUrl(url, callback) {
        var request = window.ActiveXObject ?
        new ActiveXObject('Microsoft.XMLHTTP') :
        new XMLHttpRequest;

        request.onreadystatechange = function() {
          if (request.readyState == 4) {
            request.onreadystatechange = doNothing;
            callback(request, request.status);
          }
        };

        request.open('GET', url, true);
        request.send(null);
      }
    </script>
    <script defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAw8jpw8F00TCDpJR9moG02PG3Ge_s3K1I&callback=initMap">
  </script>
  @endpush
@endsection
    