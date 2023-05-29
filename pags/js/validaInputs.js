document.getElementById('nome').addEventListener('input', function () {
    var nomeInput = document.getElementById('nome');
    var nome = nomeInput.value;

    nome = nome.replace(/\d/g, '');
    nomeInput.value = nome;

    if (nome.length > 3) {
        nomeInput.classList.remove('is-invalid');
        nomeInput.classList.add('is-valid');
    } else {
        nomeInput.classList.remove('is-valid');
        nomeInput.classList.add('is-invalid');
    }
});

document.getElementById('email').addEventListener('keyup', function () {
    var email = document.getElementById('email').value;
    if (email.length > 5) {
        document.getElementById('email').classList.remove('is-invalid');
        document.getElementById('email').classList.add('is-valid');
    } else {
        document.getElementById('email').classList.remove('is-valid');
        document.getElementById('email').classList.add('is-invalid');
    }
});

document.getElementById('login').addEventListener('keyup', function () {
    var login = document.getElementById('login').value;
    if (login.length > 3) {
        document.getElementById('login').classList.remove('is-invalid');
        document.getElementById('login').classList.add('is-valid');
    } else {
        document.getElementById('login').classList.remove('is-valid');
        document.getElementById('login').classList.add('is-invalid');
    }
});

document.getElementById('senha').addEventListener('keyup', function () {
    var senha = document.getElementById('senha').value;
    if (senha.length > 4) {
        document.getElementById('senha').classList.remove('is-invalid');
        document.getElementById('senha').classList.add('is-valid');
    } else {
        document.getElementById('senha').classList.remove('is-valid');
        document.getElementById('senha').classList.add('is-invalid');
    }
});

document.getElementById('CPF').addEventListener('keyup', function () {
    var cpf = document.getElementById('CPF').value;
    cpf = cpf.replace(/\D/g, '');
    cpf = cpf.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, "$1.$2.$3-$4");
    document.getElementById('CPF').value = cpf;

    if (cpf.length === 14) {
        cpf = cpf.replace(/\D/g, '');
        var valido = validarCPF(cpf);
        if (valido) {
            document.getElementById('CPF').classList.remove('is-invalid');
            document.getElementById('CPF').classList.add('is-valid');
        } else {
            document.getElementById('CPF').classList.remove('is-valid');
            document.getElementById('CPF').classList.add('is-invalid');
        }
    }
});
function validarCPF(cpf) {
    cpf = cpf.replace(/\D/g, '');
    if (cpf.length !== 11) {
        return false;
    }

    if (/^(\d)\1+$/.test(cpf)) {
        return false;
    }
    var soma = 0;
    var resto;

    for (var i = 1; i <= 9; i++) {
        soma = soma + parseInt(cpf.charAt(i - 1)) * (11 - i);
    }

    resto = (soma * 10) % 11;

    if (resto === 10 || resto === 11) {
        resto = 0;
    }

    if (resto !== parseInt(cpf.charAt(9))) {
        return false;
    }

    soma = 0;

    for (var i = 1; i <= 10; i++) {
        soma = soma + parseInt(cpf.charAt(i - 1)) * (12 - i);
    }

    resto = (soma * 10) % 11;

    if (resto === 10 || resto === 11) {
        resto = 0;
    }

    if (resto !== parseInt(cpf.charAt(10))) {
        return false;
    }

    return true;
}


document.getElementById('dataNasc').addEventListener('change', function () {
    var dataNasc = document.getElementById('dataNasc').value;
    if (dataNasc.length > 3) {
        document.getElementById('dataNasc').classList.remove('is-invalid');
        document.getElementById('dataNasc').classList.add('is-valid');
    } else {
        document.getElementById('dataNasc').classList.remove('is-valid');
        document.getElementById('dataNasc').classList.add('is-invalid');
    }
});

document.getElementById('Sexo').addEventListener('change', function () {
    var sexo = document.getElementById('Sexo').value;
    if (sexo >= 1 & sexo <= 3) {
        document.getElementById('Sexo').classList.remove('is-invalid');
        document.getElementById('Sexo').classList.add('is-valid');
    } else {
        document.getElementById('Sexo').classList.remove('is-valid');
    }
});

document.getElementById('estadoCivil').addEventListener('change', function () {
    var estadoCivil = document.getElementById('estadoCivil').value;
    if (estadoCivil >= 1 & estadoCivil <= 4) {
        document.getElementById('estadoCivil').classList.remove('is-invalid');
        document.getElementById('estadoCivil').classList.add('is-valid');
    } else {
        document.getElementById('estadoCivil').classList.remove('is-valid');
    }
});

document.getElementById('Escolaridade').addEventListener('change', function () {
    var Escolaridade = document.getElementById('Escolaridade').value;
    if (Escolaridade >= 1 & Escolaridade <= 6) {
        document.getElementById('Escolaridade').classList.remove('is-invalid');
        document.getElementById('Escolaridade').classList.add('is-valid');
    } else {
        document.getElementById('Escolaridade').classList.remove('is-valid');
    }
});


const cursosContainer = document.getElementById('cursosContainer');
const cursoInput = document.getElementById('cursoInput');
const addCursoBtn = document.getElementById('addCursoBtn');

function adicionarCurso() {
    const novoCurso = document.createElement('div');
    novoCurso.classList.add('mb-2');
    novoCurso.innerHTML = `
    <div class="input-group">
    <input type="text" name="cursos[]" class="form-control is-valid" value="${cursoInput.value}">
    <button class="btn btn-outline-secondary remove-curso" type="button">Remover</button>
    </div>`;
    cursosContainer.appendChild(novoCurso);
}

addCursoBtn.addEventListener('click', function () {
    if (cursoInput.value == '') {
        cursoInput.classList.add('is-invalid');
    } else {
        adicionarCurso();
        cursoInput.classList.remove('is-invalid');
        cursoInput.value = '';
    }
});

cursoInput.addEventListener('keydown', function (event) {
    if (event.key === 'Enter') {
        if (cursoInput.value == '') {
            cursoInput.classList.add('is-invalid');
        } else {
            event.preventDefault();
            adicionarCurso();
            cursoInput.classList.remove('is-invalid');
            cursoInput.value = '';
        }
    }
});

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