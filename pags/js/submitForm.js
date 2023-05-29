document.getElementById('Formulario').addEventListener('submit', function (event) {
    var nome = document.getElementById('nome').value;
    var email = document.getElementById('email').value;
    var login = document.getElementById('login').value;
    var cpf = document.getElementById('CPF').value;
    var salario = document.getElementById('salario').value;

    // Verifica se os campos estão vazios ou não preenchidos corretamente
    if (nome.trim() === '' || salario.trim() === '' || email.trim() === '' || login.trim() === '' || cpf.trim() === '') {
        alert('Por favor, preencha todos os campos do formulário.');
        event.preventDefault(); // Cancela o envio do formulário
    } else {
        //autoriza o envio do formulário
    }
});
