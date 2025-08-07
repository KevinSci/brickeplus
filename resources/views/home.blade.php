<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="./font-awesome-4.7.0/css/font-awesome.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <title>Bricke+</title>
</head>
<style>
  *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
:root{
    --primary:#ff3700;
}

body{
    background: #000000;
    font-family: 'Poppins', 'sans-serif';
}

/* ==== HEADER ==== */
header{
    position: fixed; /* Fijo para que no tape el contenido al hacer scroll */
    top: 0;
    left: 0;
    width: 100%;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 30px 100px;
    z-index: 10;   
    background: transparent;
}

.logo{
    font-size: 40px;
    color: #ffff;
    letter-spacing: 1px;
    font-weight: 800;
}

.logo img {
    max-width: 180px;
    height: auto;
    display: block;
}

.nav {
    display: flex;
}
.nav li{
    list-style: none;
    margin: 0 10px;
}

.nav li a{
    color: #ffff;
    text-decoration: none;
    font-weight: 500;
    letter-spacing: 1px;
    cursor: pointer;
    transition: 0.3s;
}

.nav li:hover a{
    color: var(--primary);
}

/* ==== BANNER ==== */
.banner{
    position: relative;
    width: 100%;
    min-height: 100vh;
    padding: 120px 100px 0; /* espacio arriba para que el header no tape */
    display: flex;
    justify-content: space-between;
    align-items: center;
    background: url(../imagenes/bg-little-mermaid.jpg) no-repeat;
    background-size: cover;
    background-position: center;
    overflow: hidden;
    transition: 0.5s;
}

.banner::before{
    position: absolute;
    content: '';
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
}

.content{
    position: relative;
    max-width: 550px;
    display: none;
    visibility: hidden;
    transform: scale(0);
    transition: 0.5s;
}

.content.active{
    display: block;
    visibility: visible;
    transform: scale(1);
    transition: 0.5s;
}

.movie-title {
    max-width: 250px;
}

/* ==== TEXTO DE LA PELÍCULA ==== */
.banner .content h4 {
    color: rgba(255, 255, 255, 0.5);
    font-weight: 400;
    font-size: 30px;
}

.banner .content h4 span{
    padding: 0 10px;
    border-right: 1px solid rgba(255, 255, 255, 0.5);
}

.banner .content h4 span:first-child{
    padding-left: 0;
}

.banner .content h4 span:last-child{
    border-right: none;
}

.banner .content h4 span i{
    background: var(--primary);
    color: #fff;
    padding: 0 8px;
    display: inline-block;
    border-radius: 2px;
}

.banner .content p{
    font-size: 1em;
    font-weight: 300;
    line-height: 1.5em;
    color: #ffffff;
    margin: 10px 0 20px;
}

.banner .content .button{
    position: relative;
}

.banner .content .button a{
    position: relative;
    display: inline-block;
    margin-right: 10px;
    background: var(--primary);
    color: #ffffff;
    padding: 6px 20px;
    text-decoration: none;
    font-weight: 500;
    letter-spacing: 1px;
    text-transform: uppercase;
    transition: 0.5s;
    cursor: pointer;
}

.banner .content .button a:nth-child(2){
    background: rgba(0, 0, 0, 0.5);
    border: 1px solid rgba(0, 0, 0, 0.2);
}

.banner .content .button a:hover:nth-child(2){
    background: var(--primary);
}

/* ==== CARRUSEL ==== */
.banner .carousel-box{
    position: relative;
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-wrap: wrap;
}

.carousel{
    position: relative;
    height: 550px;
    perspective: 150;
}

.carousel .carousel-item{
    width: 250px;
    cursor: pointer;
}

.carousel .carousel-item img{
    max-width: 200px;
    border-radius: 10px;
    transform: translateX(8px) translateY(-100px);
    object-fit: cover;
    object-position: center;
}

/* ==== BOTÓN PLAY ==== */
.play{
    position: absolute;
    bottom: 50px;
    left: 100px;
    display: inline-flex;
    justify-content: flex-start;
    align-items: center;
    color: #ffffff;
    text-decoration: none;
    text-transform: uppercase;
    font-weight: 500;
    letter-spacing: 1px;
    font-size: 1.2em;
    cursor: pointer !important;
    transition: 0.3s;
}

.play i{
    margin-right: 10px;
    font-size: 40px;
    cursor: pointer !important;
}

.play:hover{
    color: var(--primary);
}

/* ==== REDES SOCIALES ==== */
.sci{
    position: absolute;
    bottom: 50px;
    right: 30px;
    display: inline-flex;
    justify-content: center;
    align-items: center;
    gap: 25px;
}

.sci a{
    color: #ffffff;
    text-decoration: none;
    text-transform: uppercase;
    font-weight: 500;
    letter-spacing: 1px;
    font-size: 25px;
    transition: 0.3s;
    cursor: pointer;
}

.sci a:hover{
    color: var(--primary);
}

/* ==== TRAILER ==== */
.Trailer{
    position: fixed;
    top: 50px;
    left: 50px;
    transform: translate(-50%, -50%);
    z-index: 100;
    width: 100%;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    backdrop-filter: blur(20px);
    visibility: hidden;
    opacity: 0;
    transition: 0.5s;
}

.Trailer.active{
    visibility: visible;
    opacity: 1;
}

.Trailer video{
    max-width: 900px;
    outline: none;
}

.close{
    position: absolute;
    top: 30px;
    right: 30px;
    cursor: pointer;
    filter: invert(1);
    max-width: 30px;
}

img, video {
    max-width: 100%;
    height: auto;
}

/* ===================== */
/* MEDIA QUERIES */
/* ===================== */

/* Tablets */
@media (max-width: 1024px) {
    header {
        padding: 20px 50px;
        flex-direction: column;
        gap: 10px;
    }

    .banner {
        padding-top: 140px;
        padding-left: 50px;
        padding-right: 50px;
        flex-direction: column;
        text-align: center;
    }

    .banner .carousel-box {
        flex-wrap: wrap;
    }
}

/* Celulares */
@media (max-width: 600px) {
    .logo img {
        max-width: 120px;
    }

    header {
        padding: 15px 20px;
        flex-direction: column;
        align-items: center;
    }

    .logo {
        font-size: 28px;
    }

    .nav {
        flex-direction: column;
        align-items: center;
        margin-top: 10px;
    }

    .nav li {
        margin: 5px 0;
    }

    .banner {
        padding-top: 130px; /* más espacio para evitar encimado */
        padding-left: 20px;
        padding-right: 20px;
        flex-direction: column;
        align-items: center;
        text-align: center;
    }

    .content {
        max-width: 100%;
    }

    .carousel {
        height: auto;
    }

    .carousel .carousel-item img {
        max-width: 150px;
        transform: none;
    }

    .play {
        position: static;
        margin-top: 15px;
    }

    .sci {
        position: static;
        margin-top: 20px;
    }
}
</style>
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