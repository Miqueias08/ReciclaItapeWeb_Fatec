
<?php $__env->startSection('principal'); ?>
  <?php $__env->startPush('scriptsHead'); ?>
    <link rel="stylesheet" type="text/css" href="css/reciclar.css">
  <?php $__env->stopPush(); ?>


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










  <?php $__env->startPush('scriptsFooter'); ?>
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
        <?php if(isset($markers)): ?>
        <?php $__currentLoopData = $markers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $marker): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        var info<?php echo e($marker->id); ?> = new google.maps.InfoWindow({
          content: "<h2><?php echo e($marker->name); ?></h2>"
          +"<p><?php echo e($marker->content); ?></p>"
          +"<h5>Endereço</h5> <?php echo e($marker->address); ?><br>"
          +"<h5>O ponto coleta os seguintes tipos de lixo</h5> <br>"
          <?php if($marker->papel): ?>
          +"<span class=\"glyphicon glyphicon-file\"></span><strong> Papel</strong> "
          <?php endif; ?>
          <?php if($marker->plastico): ?>
          +"<span class=\"glyphicon glyphicon-cd\"></span><strong> Plastico</strong> "
          <?php endif; ?>
          <?php if($marker->vidro): ?>
          +"<span class=\"glyphicon glyphicon-glass\"></span><strong> Vidro</strong>"
          <?php endif; ?>
        });
        var marker<?php echo e($marker->id); ?> = new google.maps.Marker({
         position: {lat: <?php echo e($marker->lat); ?>, lng: <?php echo e($marker->lng); ?> },
         map: map,
         title: "<?php echo e($marker->name); ?>"
       });
        marker<?php echo e($marker->id); ?>.addListener('click', function(){
          info<?php echo e($marker->id); ?>.open(map,marker<?php echo e($marker->id); ?>)
        });

        marker<?php echo e($marker->id); ?>.setMap(map);
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <?php endif; ?>
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
  <?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>
    
<?php echo $__env->make('site.templates.principal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\mique\OneDrive\Área de Trabalho\GitHub\ReciclaItapeWeb_Fatec\resources\views/site/reciclar.blade.php ENDPATH**/ ?>