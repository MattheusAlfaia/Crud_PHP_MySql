// exitesntes
var removeButtons = document.getElementsByClassName('remove-curso');

// Adicione um ouvinte de evento a cada botão
Array.from(removeButtons).forEach(function(button) {
  button.addEventListener('click', function() {
    // Encontre o contêiner pai do curso para remover o curso completo
    var cursoContainer = button.parentNode;
    cursoContainer.parentNode.removeChild(cursoContainer);
  });
});

// Captura elementos do DOM
const cursosContainer = document.getElementById('cursosContainer');
const cursoInput = document.getElementById('cursoInput');
const addCursoBtn = document.getElementById('addCursoBtn');

// Função para adicionar um novo campo de curso
function adicionarCurso() {
    const novoCurso = document.createElement('div');
    novoCurso.classList.add('mb-2');
    novoCurso.innerHTML = `
    <div class="input-group">
    <input type="text" name="cursos[]" class="form-control" value="${cursoInput.value}">
    <button class="btn btn-outline-secondary remove-curso" type="button">Remover</button>
    </div>`;
    cursosContainer.appendChild(novoCurso);
}

// Evento de clique no botão Adicionar
addCursoBtn.addEventListener('click', function () {
    if (cursoInput.value == '') {
        // deixar o input vermelho
        cursoInput.classList.add('is-invalid');
    } else {
        adicionarCurso();
        cursoInput.classList.remove('is-invalid');
        cursoInput.value = '';
    }
});

// Evento de pressionar a tecla Enter no campo de input
cursoInput.addEventListener('keydown', function (event) {
    if (event.key === 'Enter') {
        if (cursoInput.value == '') {
            // deixar o input vermelho
            cursoInput.classList.add('is-invalid');
        } else {
            event.preventDefault(); // Impede o comportamento padrão (submissão do formulário)
            adicionarCurso();
            cursoInput.classList.remove('is-invalid');
            cursoInput.value = ''; // Limpa o valor do campo de input
        }
    }
});

// Evento de clique nos botões Remover (delegação de eventos)
cursosContainer.addEventListener('click', function (event) {
    if (event.target.classList.contains('remove-curso')) {
        const cursoRemovido = event.target.parentNode.parentNode;
        cursosContainer.removeChild(cursoRemovido);
    }
});

document.getElementById('salario').addEventListener('input', function () {
    var salarioInput = document.getElementById('salario');
    var salario = salarioInput.value;
    salario = salario.replace(/\D/g, '');

    var formatter = new Intl.NumberFormat('pt-BR', {
        style: 'currency',
        currency: 'BRL',
    });
    var salarioFormatado = formatter.format(salario / 100);

    salarioInput.value = salarioFormatado;
    salarioInput.classList.add('is-valid');
});