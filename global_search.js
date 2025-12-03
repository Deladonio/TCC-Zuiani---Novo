// global_search.js
// Captura o campo de busca no cabeçalho e redireciona para /TCC-Zuiani---Novo/search.php?q=...
(function(){
    function init() {
        // procura um input e botão dentro da barra vermelha do cabeçalho
        var container = document.querySelector('.barra-vermelha');
        if (!container) return;
        var input = container.querySelector('input[type="text"]');
        var button = container.querySelector('button');
        if (!input || !button) return;

        function go() {
            var q = input.value.trim();
            // se vazio, não faz nada (pode alterar para listar tudo)
            if (q === '') return;
            // redireciona para a página de busca (caminho absoluto para este projeto)
            var base = '/TCC-Zuiani---Novo/search.php';
            window.location.href = base + '?q=' + encodeURIComponent(q);
        }

        button.addEventListener('click', function(e){ e.preventDefault(); go(); });
        input.addEventListener('keydown', function(e){ if (e.key === 'Enter') { e.preventDefault(); go(); } });
    }

    if (document.readyState === 'loading') document.addEventListener('DOMContentLoaded', init); else init();
})();
