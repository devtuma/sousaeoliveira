document.addEventListener('DOMContentLoaded', function() {
    // Animação de entrada
    const elements = document.querySelectorAll('.animate');
    elements.forEach(element => {
        element.classList.add('visible');
    });

    // Animação de rolagem suave
    const links = document.querySelectorAll('a');
    links.forEach(link => {
        link.addEventListener('click', function(event) {
            const href = link.getAttribute('href');

            if (href.startsWith('#')) {
                event.preventDefault();
                const target = document.querySelector(href);
                target.scrollIntoView({ behavior: 'smooth' });

                // Remove o fragmento da URL
                window.history.pushState(null, null, window.location.pathname);
            } else {
                event.preventDefault();
                window.history.pushState({}, '', '/');
                window.location.href = href;
            }
        });
    });

    // Scroll Animation
    const scrollElements = document.querySelectorAll('.animate-on-scroll');
    const windowHeight = window.innerHeight;

    window.addEventListener('scroll', function() {
        scrollElements.forEach(element => {
            const position = element.getBoundingClientRect().top;
            if (position < windowHeight - 100) {
                element.classList.add('visible');
            }
        });
    });

    // Image Slider
    let slideIndex = 0;
    showSlides(slideIndex);

    function plusSlides(n) {
        showSlides(slideIndex += n);
    }

    function showSlides(n) {
        let slides = document.querySelectorAll('.slide');
        if (n >= slides.length) { slideIndex = 0 }
        if (n < 0) { slideIndex = slides.length - 1 }
        slides.forEach((slide, index) => {
            slide.style.display = (index === slideIndex) ? 'block' : 'none';
        });
    }

    // Adiciona navegação no slider
    document.querySelector('.prev').addEventListener('click', function() {
        plusSlides(-1);
    });

    document.querySelector('.next').addEventListener('click', function() {
        plusSlides(1);
    });
});

// Exibir o pop-up quando a página carregar
document.addEventListener('DOMContentLoaded', function() {
    var popup = document.getElementById('privacy-policy-popup');
    var closeBtn = document.querySelector('.privacy-popup-content .close');
    var acceptBtn = document.getElementById('accept-privacy');

    // Mostrar o pop-up
    popup.style.display = 'flex';

    // Fechar o pop-up ao clicar no "X"
    closeBtn.onclick = function() {
        popup.style.display = 'none';
    }

    // Fechar o pop-up ao clicar no botão de aceitar
    acceptBtn.onclick = function() {
        popup.style.display = 'none';
    }

    // Fechar o pop-up se o usuário clicar fora do conteúdo
    window.onclick = function(event) {
        if (event.target == popup) {
            popup.style.display = 'none';
        }
    }
});

