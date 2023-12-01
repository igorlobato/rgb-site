$(function() {

    var $usuarios = $('#usuarios');
    var $postagens = $('#postagens');

    // $.ajax({
    //     type: 'GET',
    //     url: 'http://localhost:3000/usuarios',
    //     success: function(usuarios) {
    //         $.each(usuarios, function(i, usuario) {
    //             $usuarios.append('<li>nome: ' + usuario.nome + ', email: ' + usuario.email + '</li>');
    //         });
    //     },
    //     error: function() {
    //         alert('erro ao carregar lista de usuários');
    //     }
    // });

    $('#cadastrar').on('click', function(event) {
        console.log('Button clicked');
        event.preventDefault();

        let usuario = {
            nome: $('#nome').val(),
            email: $('#email').val(),
            senha: $('#senha').val(),
            adm: false,
            foto: "",
        };

        $.ajax({
            type: 'POST',
            url: 'http://localhost:3000/usuarios',
            contentType: "application/json; charset=utf-8",
            dataType : "json",
            data: JSON.stringify(usuario),
            success: function(newUsuario) {
                let userData = '<p>nome: ' + usuario.nome + ', email: ' + usuario.email + ', senha: ' + usuario.senha +
                    ', adm: ' + usuario.adm + ', foto: ' + usuario.foto + '</p>';
                $('#dados-usuario-cadastrado').html(userData);
            },
            error: function() {
                alert('erro ao cadastrar usuário');
            }
        });
    });

    $.ajax({
        type: 'GET',
        url: 'http://localhost:3000/posts',
        success: function(postagens) {
            $.each(postagens, function(i, postagem) {
                $postagens.append('<li>Titulo: <a href="?pagina=posts&id=' + postagem.id + '">' + postagem.titulo + '</a>' +
                '<br> Tópico: ' + postagem.topico +
                '<br> Descricao: ' + postagem.descricao +
                '<br><br> <img src="' + postagem.imagem + '" alt="Imagem" class="foto"> <br>' + 
                '<br> data: ' + postagem.data + 
                '<br> hora: ' + postagem.hora + 
                '<br> postador: ' + postagem.postador +
                '<br>' + '</li>');
            });
        },
        error: function() {
            alert('erro ao carregar postagens');
        }
    });
});
