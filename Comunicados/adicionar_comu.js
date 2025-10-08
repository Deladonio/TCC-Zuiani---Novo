// Dados dos comunicados (simulando dados que viriam do backend)
let comunicados = [
    {
        id: 1,
        titulo: "Novo Site do Zuiani",
        conteudo: "O novo site para alunos, pais e docentes já está disponível! Acesse para acompanhar localidade, atividades e comunicados."
    },
    {
        id: 2,
        titulo: "Passeio ao Zoológico",
        conteudo: "As inscrições para o Zoológico estão abertas até 01/12/2025. Participe!"
    },
    {
        id: 3,
        titulo: "Campanha do Agasalho",
        conteudo: "Estamos arrecadando agasalhos para doação até o final de junho. Colabore e ajude quem precisa!"
    },
    {
        id: 4,
        titulo: "Recesso Escolar",
        conteudo: "Informamos que o recesso escolar ocorrerá de 15/12/2025 a 30/01/2026. Retorno das aulas em 02/02/2026."
    },
    {
        id: 5,
        titulo: "Atualização de Dados",
        conteudo: "Solicitamos que todos os responsáveis atualizem os dados cadastrais dos alunos até 02/02/2026."
    },
    {
        id: 6,
        titulo: "Reunião de Pais",
        conteudo: "Lembramos que a reunião de pais será realizada no dia 15/03/2026, às 10h, no auditório da escola."
    }
];

let proximoId = 7;
let comunicadoEditando = null;

// Elementos do DOM
const form = document.getElementById('comunicado-form');
const formTitle = document.getElementById('form-title');
const tituloInput = document.getElementById('titulo');
const conteudoInput = document.getElementById('conteudo');
const listaComunicados = document.getElementById('lista-comunicados');

// Inicializar a página
document.addEventListener('DOMContentLoaded', function() {
    carregarComunicados();
    
    // Event listener para o formulário
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        salvarComunicado();
    });
});

// Carregar e exibir comunicados
function carregarComunicados() {
    listaComunicados.innerHTML = '';
    
    comunicados.forEach(comunicado => {
        const comunicadoElement = criarElementoComunicado(comunicado);
        listaComunicados.appendChild(comunicadoElement);
    });
}

// Criar elemento HTML para um comunicado
function criarElementoComunicado(comunicado) {
    const div = document.createElement('div');
    div.className = 'comunicado-admin-item';
    div.dataset.id = comunicado.id;
    
    div.innerHTML = `
        <div class="comunicado-admin-header">
            <h3>${comunicado.titulo}</h3>
            <div class="comunicado-admin-acoes">
                <button class="btn-editar-admin" onclick="editarComunicado(${comunicado.id})">Editar</button>
                <button class="btn-remover-admin" onclick="removerComunicado(${comunicado.id})">Remover</button>
            </div>
        </div>
        <p>${comunicado.conteudo}</p>
    `;
    
    return div;
}

// Salvar comunicado (adicionar ou editar)
function salvarComunicado() {
    const titulo = tituloInput.value.trim();
    const conteudo = conteudoInput.value.trim();
    
    if (!titulo || !conteudo) {
        alert('Por favor, preencha todos os campos.');
        return;
    }
    
    if (comunicadoEditando) {
        // Editar comunicado existente
        const index = comunicados.findIndex(c => c.id === comunicadoEditando);
        if (index !== -1) {
            comunicados[index].titulo = titulo;
            comunicados[index].conteudo = conteudo;
        }
        comunicadoEditando = null;
        formTitle.textContent = 'Adicionar Novo Comunicado';
    } else {
        // Adicionar novo comunicado
        const novoComunicado = {
            id: proximoId++,
            titulo: titulo,
            conteudo: conteudo
        };
        comunicados.push(novoComunicado);
    }
    
    // Limpar formulário e recarregar lista
    limparFormulario();
    carregarComunicados();
    
    // Remover destaque de edição
    document.querySelectorAll('.comunicado-admin-item').forEach(item => {
        item.classList.remove('editando');
    });
    
    alert('Comunicado salvo com sucesso!');
}

// Editar comunicado
function editarComunicado(id) {
    const comunicado = comunicados.find(c => c.id === id);
    if (!comunicado) return;
    
    // Preencher formulário
    tituloInput.value = comunicado.titulo;
    conteudoInput.value = comunicado.conteudo;
    
    // Atualizar estado
    comunicadoEditando = id;
    formTitle.textContent = 'Editar Comunicado';
    
    // Destacar item sendo editado
    document.querySelectorAll('.comunicado-admin-item').forEach(item => {
        item.classList.remove('editando');
    });
    
    const itemEditando = document.querySelector(`[data-id="${id}"]`);
    if (itemEditando) {
        itemEditando.classList.add('editando');
    }
    
    // Scroll para o formulário
    document.querySelector('.form-container').scrollIntoView({ 
        behavior: 'smooth' 
    });
}

// Remover comunicado
function removerComunicado(id) {
    const comunicado = comunicados.find(c => c.id === id);
    if (!comunicado) return;
    
    if (confirm(`Tem certeza que deseja remover o comunicado "${comunicado.titulo}"?`)) {
        comunicados = comunicados.filter(c => c.id !== id);
        carregarComunicados();
        
        // Se estava editando este comunicado, cancelar edição
        if (comunicadoEditando === id) {
            cancelarEdicao();
        }
        
        alert('Comunicado removido com sucesso!');
    }
}

// Cancelar edição
function cancelarEdicao() {
    comunicadoEditando = null;
    formTitle.textContent = 'Adicionar Novo Comunicado';
    limparFormulario();
    
    // Remover destaque de edição
    document.querySelectorAll('.comunicado-admin-item').forEach(item => {
        item.classList.remove('editando');
    });
}

// Limpar formulário
function limparFormulario() {
    tituloInput.value = '';
    conteudoInput.value = '';
}

// Função para exportar dados (para integração com backend)
function exportarDados() {
    return JSON.stringify(comunicados, null, 2);
}

// Função para importar dados (para integração com backend)
function importarDados(dadosJson) {
    try {
        comunicados = JSON.parse(dadosJson);
        carregarComunicados();
        return true;
    } catch (error) {
        console.error('Erro ao importar dados:', error);
        return false;
    }
}

// Expor funções globalmente para uso em outros scripts
window.adminComunicados = {
    exportarDados,
    importarDados,
    getComunicados: () => comunicados,
    setComunicados: (novosComunicados) => {
        comunicados = novosComunicados;
        carregarComunicados();
    }
};
