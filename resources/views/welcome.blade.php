<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Principal</title>
    @vite('resources/css/welcome.css')
</head>
<body>
   <header class="header">

        <div class="menu container" id="menu-negro">

            <img src="{{ asset('img/logo1.png') }}" class="logo" alt="Logo" width="180" height="auto">

            <input type="checkbox" id="menu" />
            <label for="menu"> 
                <img src="{{ asset('img/menu.png') }}" class="menu-icono" alt="menu">
            </label>
                <nav class="navbar">
                    <ul>
                    <li><a href="sesion.php">Iniciar sesión</a></li>
                    </ul>
                </nav>
        </div>

    </header>

<div class="plan-container">
    <h1>ELIGE EL MEJOR PLAN PARA TI</h1>
    <p class="discount">AHORRA HASTA 33%</p>

    <!-- Pestañas de Mensual/Anual -->
    <div class="plan-tabs">
        <button class="tab active" data-plan="monthly">MENSUAL</button>
        <button class="tab" data-plan="annual">ANUAL EN CUOTAS</button>
    </div>

    <!-- Planes (Mensual por defecto) -->
    <div class="plans monthly-plans">
        <!-- Plan Básico (Mensual) -->
        <div class="plan-card">
            <h3>Básico con Anuncios</h3>
            <ul>
                <li>✓ 2 dispositivos a la vez</li>
                <li>Resolución Full HD</li>
            </ul>
            <div class="price">$149.00 <span>mes</span></div>
            <button class="choose-btn">ELIGE ESTE PLAN</button>
        </div>

        <!-- Plan Estándar (Mensual) -->
        <div class="plan-card">
            <h3>Estándar</h3>
            <ul>
                <li>✓ 2 dispositivos a la vez</li>
                <li>Resolución Full HD</li>
                <li>30 descargas para disfrutar offline</li>
            </ul>
            <div class="price">$199.00 <span>mes</span></div>
            <button class="choose-btn">ELIGE ESTE PLAN</button>
        </div>

        <!-- Plan Platino (Mensual) -->
        <div class="plan-card">
            <h3>Platino</h3>
            <ul>
                <li>✓ 4 dispositivos a la vez</li>
                <li>Resolución 4K Ultra HD*</li>
                <li>Audio Dolby Atmos*</li>
                <li>100 descargas para disfrutar offline</li>
            </ul>
            <div class="price">$249.00 <span>mes</span></div>
            <button class="choose-btn">ELIGE ESTE PLAN</button>
        </div>
    </div>

    <!-- Planes (Anual - oculto por defecto) -->
    <div class="plans annual-plans" style="display: none;">
        <!-- Plan Básico (Anual) -->
        <div class="plan-card">
            <h3>Básico con Anuncios</h3>
            <ul>
                <li>✓ 2 dispositivos a la vez</li>
                <li>Resolución Full HD</li>
            </ul>
            <div class="price">$99.00 <span>mes</span></div>
            <button class="choose-btn">ELIGE ESTE PLAN</button>
        </div>

        <!-- Plan Estándar (Anual) -->
        <div class="plan-card">
            <h3>Estándar</h3>
            <ul>
                <li>✓ 2 dispositivos a la vez</li>
                <li>Resolución Full HD</li>
                <li>30 descargas para disfrutar offline</li>
            </ul>
            <div class="price">$149.00 <span>mes</span></div>
            <button class="choose-btn">ELIGE ESTE PLAN</button>
        </div>

        <!-- Plan Platino (Anual) -->
        <div class="plan-card">
            <h3>Platino</h3>
            <ul>
                <li>✓ 4 dispositivos a la vez</li>
                <li>Resolución 4K Ultra HD*</li>
                <li>Audio Dolby Atmos*</li>
                <li>100 descargas para disfrutar offline</li>
            </ul>
            <div class="price">$199.00 <span>mes</span></div>
            <button class="choose-btn">ELIGE ESTE PLAN</button>
        </div>
    </div>
</div>
    
        <div class="genres-carousel container">
    <h2>Explora por Géneros</h2>
    <hr>
    
    <div class="carousel-container">
        <button class="carousel-btn prev-btn">&lt;</button>
        
        <div class="carousel-track">
            <!-- Género 1: Acción -->
            <div class="genre-card">
                <div class="genre-content">
                <img src="{{ asset('img/1.jpg') }}" alt="">
                <h3>Acción</h3>
                    <p>Explosiones, persecuciones y adrenalina pura.</p>
                </div>
            </div>
            
            <div class="genre-card">
                <div class="genre-content">
                    <img src="{{ asset('img/5.jpg') }}" alt="Comedia">
                    <h3>Comedia</h3>
                    <p>Risas garantizadas con nuestros títulos más divertidos.</p>
                </div>
            </div>
            
            <!-- Género 3: Drama -->
            <div class="genre-card">
                <div class="genre-content">
                    <img src="{{ asset('img/17.jpg') }}" alt="">
                    <h3>Drama</h3>
                    <p>Historias profundas que tocan el corazón.</p>
                </div>
            </div>
            
            <!-- Género 4: Ciencia Ficción -->
            <div class="genre-card">
                <div class="genre-content">
                <img src="{{ asset('img/18.jpg') }}" alt="">
                    <h3>Ciencia Ficción</h3>
                    <p>Futuros distópicos, viajes espaciales y tecnología avanzada.</p>
                </div>
            </div>
            
            <!-- Género 6: Romance -->
            <div class="genre-card">
                <div class="genre-content">
                    <img src="{{ asset('img/6.jpg') }}" alt="Romance">
                    <h3>Romance</h3>
                    <p>Historias de amor que conquistarán tu corazón.</p>
                </div>
            </div>
            
            <!-- Género 7: Animación -->
            <div class="genre-card">
                <div class="genre-content">
                    <img src="{{ asset('img/11.jpg') }}" alt="">
                    <h3>Animación</h3>
                    <p>Para todas las edades, lleno de magia y fantasía.</p>
                </div>
            </div>
        </div>
        
        <button class="carousel-btn next-btn">&gt;</button>
    </div>
</div>

<div class="faq-section container">
    <h2>Preguntas Frecuentes</h2>
    <hr>
    
    <div class="faq-container">
        <!-- Pregunta 1 -->
        <div class="faq-item">
            <button class="faq-question">
                <span>1. ¿Qué es BrickePlus?</span>
                <i class="fas fa-chevron-down"></i>
            </button>
            <div class="faq-answer">
                <p>BrickePlus es una plataforma de streaming líder que ofrece una amplia variedad de películas, series, documentales y contenido original en alta calidad. Nuestro catálogo se actualiza constantemente para brindarte la mejor experiencia de entretenimiento.</p>
            </div>
        </div>
        
        <!-- Pregunta 2 -->
        <div class="faq-item">
            <button class="faq-question">
                <span>2. ¿Qué planes ofrecen?</span>
                <i class="fas fa-chevron-down"></i>
            </button>
            <div class="faq-answer">
                <ul class="plans-list">
                    <li><strong>Plan Básico con Anuncios:</strong> $149.00 mensual / $1,188.00 anual</li>
                    <li><strong>Plan Estándar:</strong> $199.00 mensual / $1,788.00 anual</li>
                    <li><strong>Plan Platino:</strong> $249.00 mensual / $2,388.00 anual</li>
                </ul>
                <p>Todos los planes incluyen acceso completo al catálogo, con diferencias en calidad de video, cantidad de dispositivos simultáneos y disponibilidad de contenido exclusivo.</p>
            </div>
        </div>
        
        <!-- Pregunta 3 -->
        <div class="faq-item">
            <button class="faq-question">
                <span>3. ¿En qué dispositivos funciona?</span>
                <i class="fas fa-chevron-down"></i>
            </button>
            <div class="faq-answer">
                <div class="devices-grid">
                    <div class="device-item">
                        <i class="fas fa-mobile-alt"></i>
                        <span>Celulares</span>
                    </div>
                    <div class="device-item">
                        <i class="fas fa-laptop"></i>
                        <span>Computadoras/Laptops</span>
                    </div>
                    <div class="device-item">
                        <i class="fas fa-tv"></i>
                        <span>Televisiones</span>
                    </div>
                    <div class="device-item">
                        <i class="fas fa-tablet-alt"></i>
                        <span>Tablets</span>
                    </div>
                    <div class="device-item">
                        <i class="fas fa-gamepad"></i>
                        <span>Consolas de juegos</span>
                    </div>
                </div>
                <p>BrickePlus es compatible con la mayoría de dispositivos modernos a través de nuestra aplicación o navegador web.</p>
            </div>
        </div>
        
        <!-- Pregunta 4 (opcional) -->
        <div class="faq-item">
            <button class="faq-question">
                <span>4. ¿Cómo cancelo mi suscripción?</span>
                <i class="fas fa-chevron-down"></i>
            </button>
            <div class="faq-answer">
                <p>Puedes cancelar tu suscripción en cualquier momento desde la sección "Mi cuenta" en nuestra plataforma. La cancelación será efectiva al final de tu período de facturación actual.</p>
            </div>
        </div>
    </div>
</div>

    <footer class="footer container">
        <h3>BrickePlus+</h3>
        <ul>
            <li><a href="#">Inicio</a></li>
            
            <li><a href="#">Contacto</a></li>
        </ul>
    </footer>
    <script>
      function setupLoadMore(btnId, boxContainerSelector) {
    const loadMoreBtn = document.querySelector(`#${btnId}`);
    let currentItem = 4;

    if (!loadMoreBtn) return;

    loadMoreBtn.addEventListener("click", () => {
        const boxes = document.querySelectorAll(`${boxContainerSelector} > div`);
        for (let i = currentItem; i < currentItem + 4 && i < boxes.length; i++) {
            boxes[i].style.display = 'inline-block';
        }
        currentItem += 4;1
        if (currentItem >= boxes.length) {
            loadMoreBtn.style.display = 'none';
        }
    });
}

// Aplica la función a cada botón y contenedor
setupLoadMore('load-more-1', '.box-container-1');
setupLoadMore('load-more-2', '.box-container-2');
setupLoadMore('load-more-3', '.box-container-3');

document.addEventListener('DOMContentLoaded', function() {
    const tabs = document.querySelectorAll('.tab');
    const monthlyPlans = document.querySelector('.monthly-plans');
    const annualPlans = document.querySelector('.annual-plans');

    tabs.forEach(tab => {
        tab.addEventListener('click', function() {
            // Remueve 'active' de todas las pesta�0�9as
            tabs.forEach(t => t.classList.remove('active'));
            // Agrega 'active' a la pesta�0�9a clickeada
            this.classList.add('active');

            // Muestra los planes correspondientes
            if (this.dataset.plan === 'monthly') {
                monthlyPlans.style.display = 'flex';
                annualPlans.style.display = 'none';
            } else {
                monthlyPlans.style.display = 'none';
                annualPlans.style.display = 'flex';
            }
        });
    });
});


    document.addEventListener('DOMContentLoaded', function() {
        const track = document.querySelector('.carousel-track');
        const nextBtn = document.querySelector('.next-btn');
        const prevBtn = document.querySelector('.prev-btn');
        const cards = document.querySelectorAll('.genre-card');
        const cardWidth = cards[0].offsetWidth + 15; // Ancho de la tarjeta + gap
        
        nextBtn.addEventListener('click', () => {
            track.scrollBy({ left: cardWidth * 3, behavior: 'smooth' });
        });
        
        prevBtn.addEventListener('click', () => {
            track.scrollBy({ left: -cardWidth * 3, behavior: 'smooth' });
        });
    });
    
    
    document.querySelectorAll('.faq-question').forEach(question => {
    question.addEventListener('click', () => {
        const item = question.parentNode;
        item.classList.toggle('active');
        
        // Cerrar otros items abiertos
        document.querySelectorAll('.faq-item').forEach(otherItem => {
            if (otherItem !== item && otherItem.classList.contains('active')) {
                otherItem.classList.remove('active');
            }
        });
    });
});
    </script>
</body>
</html>