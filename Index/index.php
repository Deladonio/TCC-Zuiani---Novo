<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zuiani-Bauru</title>
    <link rel="stylesheet" href="../global.css">
    <link rel="stylesheet" href="style_index.css">
    <link rel="shortcut icon" href="../favicon_io/favicon.ico" type="image/x-icon">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
</head>

<body>

    <!-- Modal Lightbox para ampliação de imagens -->
    <div id="lightbox" class="lightbox">
        <span class="lightbox-close">&times;</span>
        <img class="lightbox-content" id="lightbox-img" src="" alt="Imagem ampliada">
    </div>

    <header>
        <?php session_start(); ?>
        <div class="barra-vermelha">
            <div>
                <a href="../Index/index.php">Início</a>
                <a href="../Instituição/instituicao.php">Instituição</a>
                <a href="../Atividades/atividades.php">Atividades</a>
                <a href="../Comunicados/comunicados.php">Comunicados</a>
                <?php if (!isset($_SESSION['conectado']) || $_SESSION['conectado'] !== true): ?>
                    <a href="../Cadastro/cadastro.php">Cadastro</a>
                <?php endif; ?>
                <?php if (isset($_SESSION['conectado']) && $_SESSION['conectado'] === true): ?>
                    <a href="../Cadastro/logout.php" class="btn-logout">Sair</a>
                <?php endif; ?>
            </div>

            <div>
                <input type="text" placeholder="Buscar...">
                <button>Buscar</button>
            </div>
    
        </div>
    </header>


    <main>
        <section class="main-destaque" style="text-align:center; padding: 32px 0; background: #f8f8f8; border-radius: 12px; margin-bottom: 32px;">
            <img src="../favicon_io/android-chrome-192x192.png" alt="Logo Zuiani" style="width: 90px; margin-bottom: 12px;">
            <h1 style="margin-bottom: 8px;">Bem-vindo ao E.E. Dr. Luiz Zuiani!</h1> <br>
            <p style="font-size: 1.1em; max-width: 600px; margin: 0 auto 18px auto;">Instituição dedicada à educação, transformando vidas por meio da inclusão e desenvolvimento social.</p>
            <div style="margin: 18px 0 0 0; display: flex; justify-content: center; gap: 16px; flex-wrap: wrap;">
                <a href="https://sed.educacao.sp.gov.br/" target="_blank" class="botao-saiba-mais" style="background: #1976d2; color: #fff; padding: 10px 22px; border-radius: 6px; text-decoration: none;">Acessar SED</a>
                <a href="https://saladofuturo.educacao.sp.gov.br/" target="_blank" class="botao-saiba-mais" style="background: #43a047; color: #fff; padding: 10px 22px; border-radius: 6px; text-decoration: none;">Sala do Futuro</a>
            </div>
        </section>

        <section class="main-info">
            <div class="carousel">
                <button class="carousel-btn left" aria-label="Anterior">
                    <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M15.41 16.58L10.83 12l4.58-4.59L14 6l-6 6 6 6z"/></svg>
                </button>
                <div class="carousel-viewport">
                    <div class="carousel-track">
                        <div class="carousel-card">
                            <div class="card">
                                <img src="../Imagens da escola/simulado saresp.jpg" alt="Horário" class="image-ampliada" style="width: 100%; height: 150px; object-fit: cover; border-radius: 6px; margin-bottom: 12px; cursor: pointer;">
                                <h3 style="color: #1976d2;">Simulado SARESP</h3>
                                <p>Alunos do terceiro ano realizando o simulado para a prova do SARESP.</p>
                            </div>
                        </div>
                        <div class="carousel-card">
                            <div class="card">
                                <img src="../Imagens da escola/premiação honra ao mérito.jpg" alt="Evento" class="image-ampliada" style="width: 100%; height: 150px; object-fit: cover; border-radius: 6px; margin-bottom: 12px; cursor: pointer;">
                                <h3 style="color: #e53935;">Premiação honra ao mérito</h3>
                                <p>Nosso aluno do 3º DS recebendo o certificado de honra ao mérito junto com a diretora Maria Helena, vice-diretora Jussara Rodrigues e coordenadora Thaís Ribeiro.</p>
                            </div>
                        </div>
                        <div class="carousel-card">
                            <div class="card">
                                <img src="../Imagens da escola/premiação da obmep.jpg" alt="Contato" class="image-ampliada" style="width: 100%; height: 150px; object-fit: cover; border-radius: 6px; margin-bottom: 12px; cursor: pointer;">
                                <h3 style="color: #6d4c41;">Premiação OBMEP</h3>
                                <p>Professora Marcela de matemática e a coordenadora Thaís premiando nossos alunos.</p>
                            </div>
                        </div>
                        <div class="carousel-card">
                            <div class="card">
                                <img src="../Imagens da escola/aulão saeb.jpg" alt="Missão" class="image-ampliada" style="width: 100%; height: 150px; object-fit: cover; border-radius: 6px; margin-bottom: 12px; cursor: pointer;">
                                <h3 style="color: #00897b;">Aulão para o SAEB</h3>
                                <p>Alunos do terceiro ano tendo uma aula dedicada a prova do SAEB.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="carousel-btn right" aria-label="Próximo">
                    <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M8.59 16.58L13.17 12 8.59 7.41 10 6l6 6-6 6z"/></svg>
                </button>
            </div>
            <div class="carousel-dots" aria-hidden="false"></div>
        </section>

        <br>

        <a href="../Comunicados/comunicados.php" class="botao-saiba-mais" style="display: block; width: fit-content; margin: 32px auto 0 auto; background: #1976d2; color: #fff; padding: 12px 28px; border-radius: 6px; text-decoration: none;">Acesse todos os comunicados</a>
        <br><br><br>

        <div vw class="enabled">
            <div vw-access-button class="active"></div>
            <div vw-plugin-wrapper>
            <div class="vw-plugin-top-wrapper"></div>
        </div>
        <script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>
        <script>
            new window.VLibras.Widget('https://vlibras.gov.br/app');
        </script>
        <script>
            // Infinite carousel with clones for seamless looping
            (function(){
                const carousel = document.querySelector('.carousel');
                if (!carousel) return;

                const track = carousel.querySelector('.carousel-track');
                const prevBtn = carousel.querySelector('.carousel-btn.left');
                const nextBtn = carousel.querySelector('.carousel-btn.right');
                const dotsContainer = carousel.querySelector('.carousel-dots');

                let originalHTML = track.innerHTML;
                let originalCount = 0;
                let cardsPerView = 1;
                let index = 0; // current index in track children
                let autoTimer = null;
                let resizeTimer = null;

                function calcCardsPerView(){
                    const w = window.innerWidth;
                    if (w >= 900) return 3;
                    if (w >= 600) return 2;
                    return 1;
                }

                function build(){
                    // restore original
                    track.innerHTML = originalHTML;
                    const items = Array.from(track.children);
                    originalCount = items.length;
                    // create clones
                    const k = cardsPerView;
                    const firstClones = [];
                    const lastClones = [];
                    for (let i=0;i<k;i++){
                        const f = items[i % originalCount].cloneNode(true);
                        firstClones.push(f);
                        const l = items[(originalCount - k + i) < 0 ? 0 : (originalCount - k + i)].cloneNode(true);
                        lastClones.push(l);
                    }
                    // prepend lastClones
                    for (let i=lastClones.length-1;i>=0;i--) track.insertBefore(lastClones[i], track.firstChild);
                    // append firstClones
                    for (let i=0;i<firstClones.length;i++) track.appendChild(firstClones[i]);

                    // set flex basis for responsive sizes
                    const all = Array.from(track.children);
                    all.forEach(c => c.style.flex = `0 0 ${100 / cardsPerView}%`);

                    // set start index to first real item
                    index = cardsPerView;
                    track.style.transition = 'none';
                    const shiftPercent = index * (100 / cardsPerView);
                    track.style.transform = `translateX(-${shiftPercent}%)`;
                    // force reflow
                    track.offsetHeight;
                    track.style.transition = 'transform 0.5s ease';

                    renderDots();
                    updateActiveDot();
                }

                function moveTo(i){
                    index = i;
                    const shiftPercent = index * (100 / cardsPerView);
                    track.style.transform = `translateX(-${shiftPercent}%)`;
                }

                function next(){ moveTo(index + 1); }
                function prev(){ moveTo(index - 1); }

                track.addEventListener('transitionend', ()=>{
                    // when passing clones, jump to corresponding original without animation
                    if (index < cardsPerView){
                        // jumped to left clones -> move to equivalent original
                        index = index + originalCount;
                        track.style.transition = 'none';
                        const shiftPercent = index * (100 / cardsPerView);
                        track.style.transform = `translateX(-${shiftPercent}%)`;
                        track.offsetHeight;
                        track.style.transition = 'transform 0.5s ease';
                    } else if (index >= originalCount + cardsPerView){
                        // jumped to right clones
                        index = index - originalCount;
                        track.style.transition = 'none';
                        const shiftPercent = index * (100 / cardsPerView);
                        track.style.transform = `translateX(-${shiftPercent}%)`;
                        track.offsetHeight;
                        track.style.transition = 'transform 0.5s ease';
                    }
                    updateActiveDot();
                });

                function renderDots(){
                    const pages = Math.max(1, Math.ceil(originalCount / cardsPerView));
                    dotsContainer.innerHTML = '';
                    for (let p=0;p<pages;p++){
                        const d = document.createElement('span');
                        d.className = 'carousel-dot';
                        d.dataset.page = p;
                        d.addEventListener('click', ()=>{
                            moveTo(cardsPerView + p * cardsPerView);
                            restartAuto();
                        });
                        dotsContainer.appendChild(d);
                    }
                    updateActiveDot();
                }

                function updateActiveDot(){
                    const dots = Array.from(dotsContainer.children);
                    const page = Math.floor((index - cardsPerView) / cardsPerView) % Math.max(1, Math.ceil(originalCount / cardsPerView));
                    const active = (page + Math.max(0, Math.ceil(originalCount / cardsPerView))) % Math.max(1, Math.ceil(originalCount / cardsPerView));
                    dots.forEach((d,i)=> d.classList.toggle('active', i===active));
                }

                function startAuto(){ stopAuto(); autoTimer = setInterval(()=> next(), 5000); }
                function stopAuto(){ if (autoTimer) clearInterval(autoTimer); }
                function restartAuto(){ stopAuto(); startAuto(); }

                prevBtn.addEventListener('click', ()=>{ prev(); restartAuto(); });
                nextBtn.addEventListener('click', ()=>{ next(); restartAuto(); });
                carousel.addEventListener('mouseenter', stopAuto);
                carousel.addEventListener('mouseleave', startAuto);

                // Pointer / touch swipe support (drag to navigate)
                let isDown = false;
                let startX = 0;
                let startTranslate = 0;
                let cardWidth = 0;

                function getCardWidth(){
                    const vp = carousel.querySelector('.carousel-viewport');
                    return vp ? vp.clientWidth / cardsPerView : 0;
                }

                function onPointerDown(e){
                    isDown = true;
                    startX = (e.touches ? e.touches[0].clientX : e.clientX);
                    cardWidth = getCardWidth();
                    // compute current translate in px
                    startTranslate = -index * cardWidth;
                    track.style.transition = 'none';
                    stopAuto();
                }

                function onPointerMove(e){
                    if (!isDown) return;
                    const x = (e.touches ? e.touches[0].clientX : e.clientX);
                    const delta = x - startX;
                    const translate = startTranslate + delta;
                    track.style.transform = `translateX(${translate}px)`;
                }

                function onPointerUp(e){
                    if (!isDown) return;
                    isDown = false;
                    const endX = (e.changedTouches ? e.changedTouches[0].clientX : e.clientX);
                    const delta = endX - startX;
                    track.style.transition = 'transform 0.5s ease';
                    // if moved enough, navigate
                    if (Math.abs(delta) > Math.max(10, cardWidth * 0.25)){
                        if (delta < 0) { next(); }
                        else { prev(); }
                    } else {
                        // snap back
                        const shiftPercent = index * (100 / cardsPerView);
                        track.style.transform = `translateX(-${shiftPercent}%)`;
                    }
                    restartAuto();
                }

                // pointer events
                carousel.addEventListener('pointerdown', onPointerDown);
                window.addEventListener('pointermove', onPointerMove);
                window.addEventListener('pointerup', onPointerUp);
                window.addEventListener('pointercancel', onPointerUp);
                // touch fallback
                carousel.addEventListener('touchstart', onPointerDown, {passive:true});
                window.addEventListener('touchmove', onPointerMove, {passive:true});
                window.addEventListener('touchend', onPointerUp);

                function onResize(){
                    clearTimeout(resizeTimer);
                    resizeTimer = setTimeout(()=>{
                        const newK = calcCardsPerView();
                        if (newK !== cardsPerView){
                            cardsPerView = newK;
                            build();
                        } else {
                            // still update flex basis and positions
                            const all = Array.from(track.children);
                            all.forEach(c => c.style.flex = `0 0 ${100 / cardsPerView}%`);
                            const shiftPercent = index * (100 / cardsPerView);
                            track.style.transform = `translateX(-${shiftPercent}%)`;
                        }
                    }, 120);
                }

                // init
                cardsPerView = calcCardsPerView();
                build();
                startAuto();
                window.addEventListener('resize', onResize);
            })();
        </script>
        <script src="../global_search.js"></script>

        <!-- Script para controlar o Lightbox de imagens -->
        <script>
            (function() {
                const lightbox = document.getElementById('lightbox');
                const lightboxImg = document.getElementById('lightbox-img');
                const lightboxClose = document.querySelector('.lightbox-close');
                const ampliableImages = document.querySelectorAll('.image-ampliada');

                // Abrir lightbox ao clicar na imagem
                ampliableImages.forEach(img => {
                    img.addEventListener('click', function() {
                        lightboxImg.src = this.src;
                        lightbox.classList.add('active');
                    });
                });

                // Fechar lightbox ao clicar no X
                lightboxClose.addEventListener('click', closeLightbox);

                // Fechar lightbox ao clicar fora da imagem
                lightbox.addEventListener('click', function(e) {
                    if (e.target === lightbox) {
                        closeLightbox();
                    }
                });

                // Fechar lightbox ao pressionar ESC
                document.addEventListener('keydown', function(e) {
                    if (e.key === 'Escape') {
                        closeLightbox();
                    }
                });

                function closeLightbox() {
                    lightbox.classList.remove('active');
                    lightboxImg.src = '';
                }
            })();
        </script>
    </main>

    <footer>
        <div class="footer-content">
            <div class="footer-text">
                <h3>Escola Dr. Luiz Zuiani</h3>
                <p>R. Aviador Gomes Ribeiro, 34-60 - P. Paulistano, Bauru - SP, 17030-530</p>
                <p>Telefone: (14) 3203-2553</p>
            </div>

            <div class="social-midia">
                <!-- Facebook -->
                <a href="https://web.facebook.com/EscolaZuiani/about" target="_blank" class="social-icone facebook" title="Facebook">
                    <svg viewBox="0 0 24 24">
                        <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                    </svg>
                </a>

                <!-- Instagram -->
                <a href="https://www.instagram.com/escola_zuiani_bauru/" target="_blank" class="social-icone instagram" title="Instagram">
                    <svg viewBox="0 0 24 24">
                        <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                    </svg>
                </a>

                <!-- E-mail -->
                <a href="https://mail.google.com/mail/?view=cm&fs=1&to=e025276a@educacao.sp.gov.br" target="_blank" class="social-icone email" title="E-mail">
                    <svg viewBox="0 0 24 24">
                        <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.89 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
                    </svg>
                </a>
            </div>

            <div class="copyright">
                <p>&copy; 2025 Dr. Luiz Zuiani. Todos os direitos reservados.</p>
            </div>
        </div>
    </footer>

    
</body>

</html>