// Dados do submenu
const submenuItems = [
    {
        text: 'Sobre a nossa escola',
        id: 'sobre',
        content: `
        <div style="background: linear-gradient(120deg, #f5f7fa 80%, #e3e0fc 100%); border-radius: 18px; box-shadow: 0 4px 24px rgba(62,85,139,0.13); padding: 32px 28px 28px 28px; border-left: 8px solid #C9201B; border-right: 8px solid #3E558B;">
            <h2 style="color: #C9201B; font-size: 1.9rem; margin-bottom: 18px; letter-spacing: 1px; text-shadow: 0 2px 8px #e3e0fc;">Sobre a nossa escola</h2>
            <p style="font-size: 1.22rem; color: #3E558B; font-weight: bold; margin-bottom: 18px;">Educação, inclusão e transformação social em Bauru e região.</p>
            <p style="font-size: 1.1rem; color: #222; line-height: 1.7; margin-bottom: 14px;">
                <span style="color: #C9201B; font-weight: bold;">A Escola Estadual Doutor Luiz Zuiani</span>, localizada no município de <span style="color: #3E558B; font-weight: bold;">Bauru/SP</span>, oferece à comunidade local e regional ensino público gratuito de qualidade, com turmas de <span style="color: #C9201B;">Ensino Fundamental</span> (anos finais), <span style="color: #3E558B;">Ensino Médio regular</span>, <span style="color: #C9201B;">Educação de Jovens e Adultos (EJA)</span> e cursos integrados por meio de parcerias com programas como o <span style="color: #3E558B;">Novotec</span>.
            </p>
            <p style="font-size: 1.1rem; color: #222; line-height: 1.7; margin-bottom: 14px;">
                Fundada com o propósito de promover a <span style="color: #C9201B; font-weight: bold;">formação cidadã e acadêmica</span> de seus alunos, a escola leva o nome do médico <span style="color: #3E558B; font-weight: bold;">Dr. Luiz Zuiani</span>, homenageado por sua contribuição à cidade e ao serviço público. Desde sua criação, a escola busca constantemente a <span style="color: #C9201B;">excelência educacional</span>, adotando práticas pedagógicas atualizadas, incentivando projetos interdisciplinares e investindo na formação continuada de seus professores.
            </p>
            <p style="font-size: 1.1rem; color: #222; line-height: 1.7;">
                Com uma trajetória marcada pelo compromisso com a <span style="color: #3E558B; font-weight: bold;">educação inclusiva</span>, já formou milhares de estudantes que hoje se destacam em diferentes áreas profissionais, bem como no ingresso em instituições de ensino superior públicas e privadas de prestígio. <span style="color: #C9201B; font-weight: bold;">A E.E. Dr. Luiz Zuiani se consolida como referência em ensino na região</span>, promovendo não apenas conhecimento, mas também valores éticos e sociais fundamentais para a transformação da sociedade.
            </p>
        </div>`
    },

    { 
        text: 'Direção', 
        id: 'direcao', 
        content: `
        <h2 style="text-align:center;">Direção</h2>
        <p style="text-align:center;">Equipe de direção e coordenação. Clique nas imagens para ampliar.</p>
        <div class="gallery" style="display:flex; flex-wrap:wrap; gap:16px; margin-top:12px;">
        
            <figure style="width:250px; text-align:center; margin:10; ">
                <img src="../favicon_io/mockup.png" alt="Maria Helena - Diretora" style="width:200px; height:200px; object-fit:cover; border-radius:8px; box-shadow:0 4px 12px rgba(0,0,0,0.12); cursor:pointer;" onclick="window.open(this.src,'_blank')" onerror="this.onerror=null;this.src='../favicon_io/android-chrome-192x192.png'">
                <figcaption style="font-weight:700; margin-top:6px;">Maria Helena Vieira Pintão<br><small>Diretora</small></figcaption>
            </figure>

            <figure style="width:250px; text-align:center; margin:10;">
                <img src="../favicon_io/mockup.png" alt="Jussara - Vice Diretora" style="width:200px; height:200px; object-fit:cover; border-radius:8px; box-shadow:0 4px 12px rgba(0,0,0,0.12); cursor:pointer;" onclick="window.open(this.src,'_blank')" onerror="this.onerror=null;this.src='../favicon_io/android-chrome-192x192.png'">
                <figcaption style="font-weight:700; margin-top:6px;">Jussara Di Lolli Rodrigues<br><small>Vice Diretora</small></figcaption>
            </figure>

            <figure style="width:250px; text-align:center; margin:10;">
                <img src="../favicon_io/mockup.png" alt="Gislene - Vice Diretora" style="width:200px; height:200px; object-fit:cover; border-radius:8px; box-shadow:0 4px 12px rgba(0,0,0,0.12); cursor:pointer;" onclick="window.open(this.src,'_blank')" onerror="this.onerror=null;this.src='../favicon_io/android-chrome-192x192.png'">
                <figcaption style="font-weight:700; margin-top:6px;">Gislene Sena de Moraes<br><small>Vice Diretora</small></figcaption>
            </figure>

            <figure style="width:250px; text-align:center; margin:10;">
                <img src="../favicon_io/mockup.png" alt="Thais - Coordenadora" style="width:200px; height:200px; object-fit:cover; border-radius:8px; box-shadow:0 4px 12px rgba(0,0,0,0.12); cursor:pointer;" onclick="window.open(this.src,'_blank')" onerror="this.onerror=null;this.src='../favicon_io/android-chrome-192x192.png'">
                <figcaption style="font-weight:700; margin-top:6px;">Thais Saes Giuliane Ribeiro<br><small>Coordenadora</small></figcaption>
            </figure>

            <figure style="width:250px; text-align:center; margin:10;">
                <img src="../favicon_io/mockup.png" alt="Liliane - Coordenadora" style="width:200px; height:200px; object-fit:cover; border-radius:8px; box-shadow:0 4px 12px rgba(0,0,0,0.12); cursor:pointer;" onclick="window.open(this.src,'_blank')" onerror="this.onerror=null;this.src='../favicon_io/android-chrome-192x192.png'">
                <figcaption style="font-weight:700; margin-top:6px;">Liliane Selmo Palhares<br><small>Coordenadora</small></figcaption>
            </figure>

            <figure style="width:250px; text-align:center; margin:10;">
                <img src="../favicon_io/mockup.png" alt="Laís - Educação Especial" style="width:200px; height:200px; object-fit:cover; border-radius:8px; box-shadow:0 4px 12px rgba(0,0,0,0.12); cursor:pointer;" onclick="window.open(this.src,'_blank')" onerror="this.onerror=null;this.src='../favicon_io/android-chrome-192x192.png'">
                <figcaption style="font-weight:700; margin-top:6px;">Laís Marcondes Guilherme Domingos<br><small>Ensino colaborativo - Educação Especial</small></figcaption>
            </figure>

            <figure style="width:250px; text-align:center; margin:10;">
                <img src="../favicon_io/mockup.png" alt="Camila - Biblioteca" style="width:200px; height:200px; object-fit:cover; border-radius:8px; box-shadow:0 4px 12px rgba(0,0,0,0.12); cursor:pointer;" onclick="window.open(this.src,'_blank')" onerror="this.onerror=null;this.src='../favicon_io/android-chrome-192x192.png'">
                <figcaption style="font-weight:700; margin-top:6px;">Camila Alexandra Godoy Aceituno<br><small>Professora / Cuidadora da Biblioteca</small></figcaption>
            </figure>

            <figure style="width:250px; text-align:center; margin:10;">
                <img src="../favicon_io/mockup.png" alt="Edmar - Coordenador" style="width:200px; height:200px; object-fit:cover; border-radius:8px; box-shadow:0 4px 12px rgba(0,0,0,0.12); cursor:pointer;" onclick="window.open(this.src,'_blank')" onerror="this.onerror=null;this.src='../favicon_io/android-chrome-192x192.png'">
                <figcaption style="font-weight:700; margin-top:6px;">Edmar Fogaça da Silva<br><small>POC (Professor Orientador de Convivência)</small></figcaption>
            </figure>
        </div>
        ` 
    },

    { 
        text: 'Corpo docente', 
        id: 'docente', 
        content: `
        <h2 style="text-align:center;">Corpo Docente</h2>
        <p style="text-align:center;">Equipe de professores. Clique nas imagens para ampliar.</p>
        <div class="gallery" style="display:flex; flex-wrap:wrap; gap:16px; margin-top:12px;">

            <figure style="width:250px; text-align:center; margin:0;">
                <img src="../favicon_io/mockup.png" alt="Sandro - Professor" style="width:200px; height:200px; object-fit:cover; border-radius:8px; box-shadow:0 4px 12px rgba(0,0,0,0.12); cursor:pointer;" onclick="window.open(this.src,'_blank')" onerror="this.onerror=null;this.src='../favicon_io/android-chrome-192x192.png'">
                <figcaption style="font-weight:700; margin-top:6px;">Sandro Inácio de Souza<br><small>Professor</small></figcaption>
            </figure>

            <figure style="width:250px; text-align:center; margin:0;">
                <img src="../favicon_io/mockup.png" alt="Aroldo - Professor" style="width:200px; height:200px; object-fit:cover; border-radius:8px; box-shadow:0 4px 12px rgba(0,0,0,0.12); cursor:pointer;" onclick="window.open(this.src,'_blank')" onerror="this.onerror=null;this.src='../favicon_io/android-chrome-192x192.png'">
                <figcaption style="font-weight:700; margin-top:6px;">Aroldo César Gonçalves<br><small>Professor</small></figcaption>
            </figure>

            <figure style="width:250px; text-align:center; margin:0;">
                <img src="../favicon_io/mockup.png" alt="Antônio - Professor" style="width:200px; height:200px; object-fit:cover; border-radius:8px; box-shadow:0 4px 12px rgba(0,0,0,0.12); cursor:pointer;" onclick="window.open(this.src,'_blank')" onerror="this.onerror=null;this.src='../favicon_io/android-chrome-192x192.png'">
                <figcaption style="font-weight:700; margin-top:6px;">Antônio Carlos do Prado<br><small>Professor</small></figcaption>
            </figure>

            <figure style="width:250px; text-align:center; margin:0;">
                <img src="../favicon_io/mockup.png" alt="Nilson - Professor" style="width:200px; height:200px; object-fit:cover; border-radius:8px; box-shadow:0 4px 12px rgba(0,0,0,0.12); cursor:pointer;" onclick="window.open(this.src,'_blank')" onerror="this.onerror=null;this.src='../favicon_io/android-chrome-192x192.png'">
                <figcaption style="font-weight:700; margin-top:6px;">Nilson Santiago de Oliveira<br><small>Professor</small></figcaption>
            </figure>

            <figure style="width:250px; text-align:center; margin:0;">
                <img src="../favicon_io/mockup.png" alt="Luzia - Professora" style="width:200px; height:200px; object-fit:cover; border-radius:8px; box-shadow:0 4px 12px rgba(0,0,0,0.12); cursor:pointer;" onclick="window.open(this.src,'_blank')" onerror="this.onerror=null;this.src='../favicon_io/android-chrome-192x192.png'">
                <figcaption style="font-weight:700; margin-top:6px;">Luzia Maria Oreste<br><small>Professora</small></figcaption>
            </figure>

            <figure style="width:250px; text-align:center; margin:0;">
                <img src="../favicon_io/mockup.png" alt="Marcela - Professora" style="width:200px; height:200px; object-fit:cover; border-radius:8px; box-shadow:0 4px 12px rgba(0,0,0,0.12); cursor:pointer;" onclick="window.open(this.src,'_blank')" onerror="this.onerror=null;this.src='../favicon_io/android-chrome-192x192.png'">
                <figcaption style="font-weight:700; margin-top:6px;">Marcela Lopes da Silva<br><small>Professora</small></figcaption>
            </figure>
        </div>
        ` 
    },

    { 
        text: 'Parcerias', 
        id: 'docente', 
        content: `
        <h2 style="text-align:center;">Parceria feita com a instituição ETEC (Escola Técnica Estadual Rodrigues de Abreu - Bauru)</h2>
        <p style="text-align:center;">Equipe de professores do curso de Desenvolvimento de Sistema. Clique nas imagens para ampliar.</p>
        <div class="gallery" style="display:flex; flex-wrap:wrap; gap:16px; margin-top:12px;">
        
            <figure style="width:250px; text-align:center; ">
                <img src="../favicon_io/mockup.png" alt="Jefferson - Professor" style="text-align:center; width:200px; height:200px; object-fit:cover; border-radius:8px; box-shadow:0 4px 12px rgba(0,0,0,0.12); cursor:pointer;" onclick="window.open(this.src,'_blank')" onerror="this.onerror=null;this.src='../favicon_io/android-chrome-192x192.png'">
                <figcaption style="text-align:center; font-weight:700; margin-top:6px;">Jefferson Roger Moreira<br><small>Professor e Coordenador</small></figcaption>
            </figure>

        <p style="text-align:center;">Equipe de professores do curso de Administração. Clique nas imagens para ampliar.</p>

            <figure style="width:250px; text-align:center; margin:0;">
                <img src="../favicon_io/mockup.png" alt="Aroldo - Professor" style="width:200px; height:200px; object-fit:cover; border-radius:8px; box-shadow:0 4px 12px rgba(0,0,0,0.12); cursor:pointer;" onclick="window.open(this.src,'_blank')" onerror="this.onerror=null;this.src='../favicon_io/android-chrome-192x192.png'">
                <figcaption style="font-weight:700; margin-top:6px;">Aroldo César Gonçalves<br><small>Professor</small></figcaption>
            </figure>

            <figure style="width:250px; text-align:center; margin:0;">
                <img src="../favicon_io/mockup.png" alt="Antônio - Professor" style="width:200px; height:200px; object-fit:cover; border-radius:8px; box-shadow:0 4px 12px rgba(0,0,0,0.12); cursor:pointer;" onclick="window.open(this.src,'_blank')" onerror="this.onerror=null;this.src='../favicon_io/android-chrome-192x192.png'">
                <figcaption style="font-weight:700; margin-top:6px;">Antônio Carlos do Prado<br><small>Professor</small></figcaption>
            </figure>

            <figure style="width:250px; text-align:center; margin:0;">
                <img src="../favicon_io/mockup.png" alt="Nilson - Professor" style="width:200px; height:200px; object-fit:cover; border-radius:8px; box-shadow:0 4px 12px rgba(0,0,0,0.12); cursor:pointer;" onclick="window.open(this.src,'_blank')" onerror="this.onerror=null;this.src='../favicon_io/android-chrome-192x192.png'">
                <figcaption style="font-weight:700; margin-top:6px;">Nilson Santiago de Oliveira<br><small>Professor</small></figcaption>
            </figure>

            <figure style="width:250px; text-align:center; margin:0;">
                <img src="../favicon_io/mockup.png" alt="Luzia - Professora" style="width:200px; height:200px; object-fit:cover; border-radius:8px; box-shadow:0 4px 12px rgba(0,0,0,0.12); cursor:pointer;" onclick="window.open(this.src,'_blank')" onerror="this.onerror=null;this.src='../favicon_io/android-chrome-192x192.png'">
                <figcaption style="font-weight:700; margin-top:6px;">Luzia Maria Oreste<br><small>Professora</small></figcaption>
            </figure>

            <figure style="width:250px; text-align:center; margin:0;">
                <img src="../favicon_io/mockup.png" alt="Marcela - Professora" style="width:200px; height:200px; object-fit:cover; border-radius:8px; box-shadow:0 4px 12px rgba(0,0,0,0.12); cursor:pointer;" onclick="window.open(this.src,'_blank')" onerror="this.onerror=null;this.src='../favicon_io/android-chrome-192x192.png'">
                <figcaption style="font-weight:700; margin-top:6px;">Marcela Lopes da Silva<br><small>Professora</small></figcaption>
            </figure>
        </div>
        ` 
    },

    { text: 'Localização', id: 'localizacao', content: `
      <h2 id="loc">Localização</h2>
      <p><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3690.731234745877!2d-49.05190812506675!3d-22.326002117372166!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94bf66552ad0ea93%3A0x520a61cc60fc4953!2sLUIZ%20ZUIANI%20DR%20EE%20EJA%20-%20F%20e%20M!5e0!3m2!1spt-BR!2sbr!4v1749469289680!5m2!1spt-BR!2sbr" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></p><br>
      <h3 style="text-align: center;" id="endereco">R. Aviador Gomes Ribeiro, 34-60 - P.Paulistano, Bauru - SP, 17030-530</h3>` }
];
// Função para criar o submenu
function createSubmenu() {
    const submenu = document.getElementById('submenu-instituicao');
    if (!submenu) return;

    // Limpa o conteúdo atual
    submenu.innerHTML = '';

    // Cria os itens do submenu
    submenuItems.forEach((item, idx) => {
        const li = document.createElement('li');
        const a = document.createElement('a');
        a.href = '#';
        a.textContent = item.text;
        a.dataset.id = item.id;
        a.onclick = function(e) {
            e.preventDefault();
            setActiveMenu(idx);
            loadConteudo(item.content);
        };
        li.appendChild(a);
        submenu.appendChild(li);
    });
}

// Função para definir o item ativo do menu
function setActiveMenu(activeIdx) {
    const links = document.querySelectorAll('#submenu-instituicao a');
    links.forEach((a, idx) => {
        if (idx === activeIdx) {
            a.classList.add('active');
        } else {
            a.classList.remove('active');
        }
    });
}

// Função para carregar o conteúdo na div #conteudo-dinamico
function loadConteudo(html) {
    const conteudo = document.getElementById('conteudo-dinamico');
    if (conteudo) conteudo.innerHTML = html;
}

// Função para alternar a visibilidade do submenu e a classe da seta
function toggleInstituicao() {
    const submenu = document.getElementById('submenu-instituicao');
    const titulo = document.getElementById('titulo-instituicao');
    if (!submenu || !titulo) return;

    const isOpen = submenu.style.display === 'block';

    submenu.style.display = isOpen ? 'none' : 'block';
    titulo.classList.toggle('open', !isOpen);
    titulo.setAttribute('aria-expanded', !isOpen ? 'true' : 'false');
}

// Carrega o submenu quando a página é carregada
document.addEventListener('DOMContentLoaded', function() {
    createSubmenu();
    // Carrega o primeiro item por padrão
    setActiveMenu(0);
    loadConteudo(submenuItems[0].content);

    // Garantir submenu oculto ao carregar a página
    const submenuEl = document.getElementById('submenu-instituicao');
    const tituloEl = document.getElementById('titulo-instituicao');
    if (submenuEl) submenuEl.style.display = 'none';
    if (tituloEl) {
        tituloEl.classList.remove('open');
        tituloEl.setAttribute('aria-expanded', 'false');
    }
});
