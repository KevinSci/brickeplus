 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalogo</title>
    @vite('resources/css/collection.css')

</head>
<body>
    <header class="header">

        <div class="menu container">

            <a href="# " class="logo">Brickeplus</a>
            <input type="checkbox" id="menu" />
            <label for="menu"> 
                <img src="{{ asset('img/menu.png')}}" class="menu-icono" alt="menu">
            </label>
                <nav class="navbar">
                    <ul>
                        <li><a href="#">Inicio</a></li>
                        <li><a href="#">Peliculas</a></li>
                    </ul>
                </nav>


        </div>
    </header>

    <section class="movies container">

        <h2>Peliculas Mas Vistas</h2>
        <hr>
        <div class="box-container-1">
            <div class="box-1">
                <div class="content">
                    <img src="{{ asset('img/1.jpg')}}" alt="">
                    <h3>La sirenita</h3>
                    <p>
                       La sirena Ariel está fascinada por el mundo de los humanos, pero su
padre le prohíbe relacionarse con ellos. En un viaje secreto, se enamora de un humano y
recurre a una perversa hechicera para que, mediante un conjuro, su amor triunfe.
                    </p>
                    <div class="btn-container"> <!-- Contenedor nuevo para el botón -->
            <a href="detalle-pelicula.html" class="ver-btn">Ver Película</a>
        </div>
                </div>
            </div>

            <div class="box-1">

                <div class="content">
                    <img src="{{ asset('img/2.jpeg')}}" alt="">
                    <h3>Avatar: El Camino del Agua</h3>
                    <p>
                       Jake Sully y Ney'tiri han formado una familia y hacen todo lo posible 
                       por permanecer juntos. Sin embargo, deben abandonar su hogar y explorar 
                       las regiones de Pandora cuando una antigua amenaza reaparece.
                    </p>
                    <div class="btn-container"> <!-- Contenedor nuevo para el botón -->
            <a href="detalle-pelicula.html" class="ver-btn">Ver Película</a>
        </div>
                </div>
            </div>

            <div class="box-1">

                <div class="content">
                    <img src="{{ asset('img/3.jpg')}}" alt="">
                    <h3>Transformers: el despertar de las bestias</h3>
                    <p>
Durante la década de 1990, los Maximals, Predacons y Terrorcons se unen a la batalla
existente en la Tierra entre Autobots y Decepticons.                
                   </p>
                   <div class="btn-container"> <!-- Contenedor nuevo para el botón -->
            <a href="detalle-pelicula.html" class="ver-btn">Ver Película</a>
        </div>
                </div>
            </div>

            <div class="box-1">

                <div class="content">
                    <img src="{{ asset('img/4.jpg')}}" alt="">
                    <h3>Super Mario Bros. La película</h3>
                    <p>
Dos hermanos plomeros, Mario y Luigi, caen por las alcantarillas y llegan a un mundo 
subterráneo mágico en el que deben enfrentarse al malvado Bowser para rescatar a la 
princesa Peach, quien ha sido forzada a aceptar casarse con él.                
                  </p>
                  <div class="btn-container"> <!-- Contenedor nuevo para el botón -->
            <a href="detalle-pelicula.html" class="ver-btn">Ver Película</a>
        </div>
                </div>
            </div>

        </div>

    </section>

        <section class="movies container">

        <h2>Peliculas De Accion</h2>
        <hr>
        <div class="box-container-2">
            <div class="box-2">

                <div class="content">
                    <img src="{{ asset('img/9.jpg')}}" alt="">
                    <h3>Venom: El último baile</h3>
                    <p>
                        Proximamente...
                    </p>
                </div>
            </div>

            <div class="box-2">

                <div class="content">
                    <img src="{{ asset('img/10.jpg')}}" alt="">
                    <h3>Venom</h3>
                    <p>
                        Proximamente...
                    </p>
                </div>
            </div>

            <div class="box-2">

                <div class="content">
                    <img src="{{ asset('img/11.jpg')}}" alt="">
                    <h3>Spider-Man: sin camino a casa</h3>
                    <p>
                        Proximamente...
                    </p>
                </div>
            </div>

            <div class="box-2">

                <div class="content">
                    <img src="{{ asset('img/12.jpg')}}" alt="">
                    <h3>Avengers: Infinity War</h3>
                    <p>
                        Proximamente...
                    </p>
                </div>
            </div>

        </div>
    </section>

    <section class="movies container">

        <h2>Peliculas De Estreno</h2>
        <hr>
        <div class="box-container-3">
            <div class="box-3">

                <div class="content">
                    <img src="{{ asset('img/17.jpg')}}" alt="">
                    <h3>Life: vida inteligente</h3>
                    <p>
                        Proximamente...
                    </p>
                </div>
            </div>

            <div class="box-3">

                <div class="content">
                    <img src="{{ asset('img/18.jpg')}}" alt="">
                    <h3>Morbius</h3>
                    <p>
                        Proximamente...
                    </p>
                </div>
            </div>

            <div class="box-3">

                <div class="content">
                    <img src="{{ asset('img/19.jpeg')}}" alt="">
                    <h3>Capitán América: un nuevo mundo</h3>
                    <p>
                        Proximamente...
                    </p>
                </div>
            </div>

            <div class="box-3">

                <div class="content">
                    <img src="{{ asset('img/20.jpg')}}" alt="">
                    <h3>The Batman</h3>
                    <p>
                        Proximamente...
                    </p>
                </div>
            </div>

        </div>

    </section>
    <footer class="footer container">
        <h3>BrickePlus+</h3>
        <ul>
            <li><a href="#">Inicio</a></li>
            <li><a href="#">Peliculas</a></li>
        </ul>
    </footer>
    <script src="../js/scriptc.js"></script>
</body>
</html>