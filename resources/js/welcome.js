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