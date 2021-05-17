@extends('site.templates.principal')
@section('principal')
  @push('scriptsHead')
    <link rel="stylesheet" type="text/css" href="css/reciclar.css">
  @endpush
  <style type="text/css">
    #dados{
      padding: 0;
    }
  </style>

  <div id="map" style="width:100%;height:754px;">
    
  </div>

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
      var styleArray = [
      {
          featureType: "poi.business",
          elementType: "labels",
          stylers: [
            { visibility: "off" }
          ]
        }
      ];
      function initMap() {
        if(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)){
          var map = new google.maps.Map(document.getElementById('map'), {
            center: new google.maps.LatLng(-23.589115,-48.048801),
            zoom: 12.5,
            styles: styleArray,
            disableDefaultUI: true,
            scrollwheel: false,
            options:{
              gestureHandling: 'greedy',
              draggable: !("ontouchend" in document)
            }
          });
        }
        else{
          var map = new google.maps.Map(document.getElementById('map'), {
            center: new google.maps.LatLng(-23.589115,-48.048801),
            zoom: 14,
            styles: styleArray,
            disableDefaultUI: true,
            scrollwheel: false,
            options:{
              gestureHandling: 'greedy',
              draggable: !("ontouchend" in document)
            }
          });
        }   

        @if(isset($cooperativas))
          @foreach($cooperativas as $marker)
            var info{{ $marker->id_cooperativa }} = new google.maps.InfoWindow({
              content: 
                "<h2>{{ $marker->razao_social }}</h2>"
                +"<h5>Endereço</h5> {{ $marker->endereco }}<br>"
                +"<h5 style='margin-bottom:10'>O ponto coleta os seguintes tipos de lixo</h5>"
                +"<span class=\"glyphicon glyphicon-file\"></span><strong> {{$marker->material_aceito}}</strong>"
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
@section('rodape')
  @include("site.templates.rodape")
  <style type="text/css">
    #dados{
      min-height: 100%;height: auto;display: block;position: inherit;
    }
  </style>
@endsection
    