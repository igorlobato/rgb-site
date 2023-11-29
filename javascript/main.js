$(function() {
    console.log('Document ready');

    var $usuarios = $('#usuarios');
    var $email = $('#email');
    var $nome = $('#nome');
    var $senha = $('#senha');

    $.ajax({
        type: 'GET',
        url: 'http://localhost:3000/usuarios',
        success: function(usuarios) {
            $.each(usuarios, function(i, usuario) {
                $usuarios.append('<li>nome: ' + usuario.nome + ', email: ' + usuario.email + '</li>');
            });
        },
        error: function() {
            alert('erro ao carregar lista de usuários');
        }
    });

    $('#cadastrar').on('click', function(event) {
        console.log('Button clicked');
        event.preventDefault();

        var usuario = {
            nome: $nome.val(),
            email: $email.val(),
            senha: $senha.val(),
            adm: false,
            foto: "",
        };

        $.ajax({
            type: 'POST',
            url: 'http://localhost:3000/usuarios',
            data: usuario,
            success: function(newUsuario) {
                $usuarios.append('<li>nome: ' + usuario.nome + ', email: ' + usuario.email + ', senha: ' + usuario.senha +
                    ', adm: ' + usuario.adm + ', foto: ' + usuario.foto + '</li>');
            },
            error: function() {
                alert('erro ao cadastrar usuário');
            }
        });
    });
});
