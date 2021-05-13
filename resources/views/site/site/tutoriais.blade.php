@extends('site.templates.principal')
@section('principal')
  @push('scriptsHead')
    <link rel="stylesheet" type="text/css" href="css/tutoriais.css">
  @endpush
  <div id="box1" class="container box1">
    <div class="titulo">
      <h1 id="Tutoriais">
        Tutoriais sobre a reciclagem
      </h1>
      <p>
        Aprenda a reciclar de forma correta!
      </p>
    </div>
  
    <div class="noticias">
      <div class="cardcontainer">
        <div class="photo"> <img src="https://images.pexels.com/photos/2346006/pexels-photo-2346006.jpeg?auto=format%2Ccompress&cs=tinysrgb&dpr=1&w=500">
          <div class="photos">Photos</div>
        </div>
        <div class="content">
          <p class="txt4">City Lights In Newyork</p>
          <p class="txt5">A city that never sleeps</p>
          <p class="txt2">New York, the largest city in the U.S., is an architectural marvel with plenty of historic monuments, magnificent buildings and countless dazzling.</p>
        </div>
        <div class="footer">
          <p><a class="waves-effect waves-light btn-news" href="#">Read More</a><a id="heart"><span class="like"><i class="fab fa-gratipay"></i>Like</span></a></p>
          <p class="txt3"><i class="far fa-clock"></i>10 Minutes Ago <span class="comments"><i class="fas fa-comments"></i>45 Comments</span></p>
        </div>
      </div>
    </div>
    

 
  
  @push('scriptsFooter')
  
  @endpush
@endsection
    