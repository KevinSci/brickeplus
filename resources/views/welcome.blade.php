<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="./font-awesome-4.7.0/css/font-awesome.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  @vite('resources/css/main.css')
  <title>Movie Website | Animated Landing Page</title>
</head>
<body>
  <header>
    <a href="#" class="logo">Movies</a>
    <ul class="nav">
      <li><a href="#"><i class="fa fa-home" aria-hidden="true"></i></a></li>
      <li><a href="#">Adults</a></li>
      <li><a href="#">Kids</a></li>
      <li><a href="#">Trend</a></li>
      <li><a href="#">My List</a></li>
    </ul>
    <div class = "search">
      <input type="text" placeholder="Search">
       <i class="fa fa-search" aria-hidden="true"></i>
  </header>
  <div class="banner">
    <div class="content active">
        <img src="{{ asset('img/bg-little-mermaid.jpg') }}" 
        alt="" 
        class="movie-title">
        <h4>
          <span>2023</span><span><i>12mas</i></span>2h 14min<span>Romance</span>
        </h4>
        <p>
          La sirena Ariel está fascinada por el mundo de los humanos, pero su <br>
          padre le prohíbe relacionarse con ellos. En un viaje secreto, se enamora de un humano y<br> 
          recurre a una perversa hechicera para que, mediante un conjuro, su amor triunfe.<br>
        </p>
        <div class="button">
          <a href="#"><i class="fa fa-play" aria-hidden="true"></i>Watch </a> 
          <a href="#"><i class="fa fa-plus" aria-hidden="true"></i>My list </a> 
    </div>
    </div>
    <div class="carousel-box">
    <div class="carousel">
    <div class="carousel-item">
      <img src="{{ asset('img/the-little-mermaid.jpeg') }}" alt="">
    </div>
        <div class="carousel-item">
      <img src="{{ asset('img/65.jpg') }}" alt="">
    </div>
        <div class="carousel-item">
      <img src="{{ asset('img/the-black-demon.jpg') }}" alt="">
    </div>
        <div class="carousel-item">
      <img src="{{ asset('img/the-covenant.jpg') }}" alt="">
    </div>
    </div>
     </div>
    <a href="#" class="play" onclick="toggleVideo();">
    <i class="fa fa-play-circle" aria-hidden="true"></i> Watch Trailer </a> 
   
    <ul class="sci">
      <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
      <li><a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
      <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
    </ul>
   </div>
    <div class="Trailer">
      <video src=""
      muted
      controls="true"
      autoplay="true"
      ></video>
      <img class="close" 
      src="{{ asset('img/close.png') }}" 
      alt=""
      onclick="toggleVideo();"/>
    </div>
    <script
  src="https://code.jquery.com/jquery-3.7.1.js"
  integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
  crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  <script src="./js/script.js"></script>
  <script>
      $(document).ready(function(){
    $('.carousel').carousel();
  });
  </script>
</body>
</html>