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
          <a class="nav-link" href="/admin/login">Administrador
</a>
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
          zoom: 14,
          options:{
            gestureHandling: 'greedy'
          }
        });

        @if(isset($cooperativas))
          @foreach($cooperativas as $marker)
            var info{{ $marker->id_cooperativa }} = new google.maps.InfoWindow({
              content: 
                "<h2>{{ $marker->razao_social }}</h2>"
                +"<h5>Endereço</h5> {{ $marker->endereco }}<br>"
                +"<h5>O ponto coleta os seguintes tipos de lixo</h5> <br>"
              });
              var marker{{ $marker->id_cooperativa }} = new 
              google.maps.Marker({
                position: {
                  lat: {{ $marker->lat }}, 
                  lng: {{ $marker->lng }}
                },
                map: 
                  map,
                  title: "{{ $marker->razao_social }}"
              });
              marker{{ $marker->id_cooperativa }}.addListener('click', function(){
                info{{ $marker->id_cooperativa }}.open(map,marker{{ $marker->id_cooperativa }})
            });
            marker{{ $marker->id_cooperativa }}.setMap(map);
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
    src="https://maps.googleapis.com/maps/api/js?key={{config('app.api_maps')}}&callback=initMap">
  </script>
  @endpush
@endsection
    