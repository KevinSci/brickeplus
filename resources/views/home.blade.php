<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="./font-awesome-4.7.0/css/font-awesome.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  @vite('resources/css/app.css')
  <title>Bricke+</title>
</head>
<body>
  <header>
    <a href="#" class="logo">Bricke+</a>
    <ul class="nav">
      <li><a href="#"><i class="fa fa-home" aria-hidden="true"></i></a></li>
      <a href="{{ route('logout') }}">Cerrar Sesion</a>
      <li><a href="{{ route('collection') }}">Lista</a></li>

    </ul>

  </header>
  <div class="banner">
    <div class="content the-little-mermaid active">
        <img src="{{ asset('img/the-little-mermaid-title.png') }}" 
        alt="" 
        class="movie-title">
        <h4>
          <span>2023</span><span><i>12mas</i></span>2h 14min<span>Romance</span>
        </h4>
        <p>
          La sirena Ariel está fascinada por el mundo de los humanos, pero su padre le prohíbe relacionarse con ellos. En un viaje secreto, se enamora
          de un humano y recurre a una perversa hechicera para que, 
          mediante un conjuro, su amor triunfe.
        </p>
        <div class="button">
          <a href="#"><i class="fa fa-play" aria-hidden="true"></i>Watch </a> 
          <a href="https://www.youtube.com/watch?v=IWMC7FW81MQ"><i class="fa fa-play-circle" aria-hidden="true"></i> Watch Trailer</a>
    </div>
    </div>
    <div class="content bg-avatar">
        <img src="{{ asset('img/movies/bg-avatar.png') }}" 
        alt="" 
        class="movie-title">
        <h4>
          <span>2022</span><span><i>12mas</i></span>3h 12min<span>Acción/Ciencia ficción</span>
        </h4>
        <p>
          Jake Sully y Ney'tiri han formado una familia y hacen todo lo posible por permanecer juntos. 
          Sin embargo, deben abandonar su hogar y explorar las regiones de Pandora cuando 
          una antigua amenaza reaparece.
        </p>
        <div class="button">
          <a href="#"><i class="fa fa-play" aria-hidden="true"></i>Watch </a>
          <a href="https://www.youtube.com/watch?v=d9MyW72ELq0&pp=0gcJCfwAo7VqN5tD"><i class="fa fa-play-circle" aria-hidden="true"></i> Watch Trailer</a>
    </div>
    </div>
    <div class="content bg-transformers">
        <img src="{{ asset('img/movies/bg-transformers.png') }}" 
        alt="" 
        class="movie-title">
        <h4>
          <span>2023</span><span><i>12mas</i></span>2h 7min<span>Acción/Ciencia ficción</span>
        </h4>
        <p>
          Durante la década de 1990, los Maximals, Predacons y Terrorcons 
          se unen a la batalla existente en la Tierra entre Autobots y Decepticons.
        </p>
        <div class="button">
          <a href="#"><i class="fa fa-play" aria-hidden="true"></i>Watch </a> 
          <a href="https://www.youtube.com/watch?v=NjBGzJ5FFmI"><i class="fa fa-play-circle" aria-hidden="true"></i> Watch Trailer</a>
    </div>
    </div>
    <div class="content mario">
        <img src="{{ asset('img/movies/bg-mario.png') }}" 
        alt="" 
        class="movie-title">
        <h4>
          <span>2023</span><span><i>12mas</i></span>1h 32min<span>Infantil/Comedia</span>
        </h4>
        <p>
          Dos hermanos plomeros, Mario y Luigi, caen por las alcantarillas y llegan a un mundo subterráneo 
          mágico en el que deben enfrentarse al malvado Bowser para rescatar a la princesa Peach, 
          quien ha sido forzada a aceptar casarse con él.
        </p>
        <div class="button">
          <a href="#"><i class="fa fa-play" aria-hidden="true"></i>Watch </a> 
           <a href="https://www.youtube.com/watch?v=DmCZoiCp5C0"><i class="fa fa-play-circle" aria-hidden="true"></i> Watch Trailer</a>
    </div>
    </div>
    
    <div class="carousel-box">
    <div class="carousel">
    <div class="carousel-item" onclick="changeBg('{{ asset('img/movies/bg-little-mermaid.jpg') }}', 'the-little-mermaid');">
      <img src="{{ asset('img/movies/the-little-mermaid.jpeg') }}" alt="">
    </div>
    <div class="carousel-item"  onclick="changeBg('{{ asset('img/movies/bg-avatar.jpg') }}', 'bg-avatar');">
      <img src="{{ asset('img/movies/avatar.jpeg') }}" alt="">
    </div>
    <div class="carousel-item"  onclick="changeBg('{{ asset('img/movies/bg-transformers.jpg') }}', 'bg-transformers');">
      <img src="{{ asset('img/movies/transformers.jpg') }}" alt="">
    </div>
      <div class="carousel-item"  onclick="changeBg('{{ asset('img/movies/bg-mario.jpg') }}', 'mario');">
      <img src="{{ asset('img/movies/mario.jpg') }}" alt="">
    </div>
    </div>
     </div>

   
    <ul class="sci">
      <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
      <li><a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
      <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
    </ul>
</div>
<div class="Trailer">
  <video 
    src="assets/sirenita.mp4"
    muted
    controls>
  </video>
  <img class="close" 
       src="imagenes/close.png" 
       alt="Cerrar"
       onclick="toggleVideo(event);" />
</div>
<script>
  src="https://code.jquery.com/jquery-3.7.1.js"
  integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
  crossorigin="anonymous">
  </script>
  <script src="https://code.jquery.com/jquery-3.7.0.js">
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js">
  </script>
  <script>

      $(document).ready(function(){
    $('.carousel').carousel();
  });

  function toggleVideo(){
  const Trailer = document.querySelector('.Trialer');
  const video = document.querySelector('video');
  video.pause();
  Trailer.classList.toggle('active');
}

function changeBg(bgImage, contentClass) {
    const banner = document.querySelector('.banner');
    const contents = document.querySelectorAll('.content');
    
    // Cambiar el fondo del banner
    banner.style.backgroundImage = `url('${bgImage}')`;
    banner.style.backgroundSize = 'cover';
    banner.style.backgroundPosition = 'center';
    
    // Manejar la visibilidad del contenido
    contents.forEach(content => {
        content.classList.remove('active');
        if (content.classList.contains(contentClass)) {
            content.classList.add('active');
        }
    });
}
  </script>
</body>
</html>