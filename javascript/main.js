$(function() {

    var $usuarios = $('#usuarios');
    var $postagens = $('#postagens');
    var $post = $('#post');
    var urlParams = new URLSearchParams(window.location.search);
    var postId = urlParams.get('id');

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
                $('#modalUsuarioCadastrado').modal('show');
            },
            error: function() {
                alert('erro ao cadastrar usuário');
            }
        });
    });

    $('#btnEntrar').on('click', function() {
        location.reload(); 
    });

    if (postId) {
        $.ajax({
            type: 'GET',
            url: 'http://localhost:3000/posts/' + postId,
            success: function(postagem) {
                $post.append('<li>Titulo: ' + postagem.titulo +
                    '<br>Tópico: ' + postagem.topico +
                    '<br>Descricao: ' + postagem.descricao +
                    '<br><br><img src="' + postagem.imagem + '" alt="Imagem" class="foto"><br>' +
                    '<br>Data: ' + postagem.data +
                    '<br>Hora: ' + postagem.hora +
                    '<br>Postador: ' + postagem.postador +
                    '<br></li>');
            },
            error: function() {
                alert('Erro ao carregar o post');
            }
        });
    } else {
        $.ajax({
            type: 'GET',
            url: 'http://localhost:3000/posts',
            success: function(postagens) {
                $.each(postagens, function(i, postagem) {
                    $.ajax({
                        type: 'GET',
                        url: 'http://localhost:3000/curtidas/',
                        success: function(curtidas) {
                            var likesCount = curtidas.filter(function(curtida) {
                                return curtida.id_post === postagem.id;
                            }).length;
        
                            $.ajax({
                                type: 'GET',
                                url: 'http://localhost:3000/comentarios/?id_post=' + postagem.id,
                                success: function(comentarios) {
                                    if (comentarios && comentarios.length > 0) {
                                        var comentariosPost = comentarios.filter(function(comentario) {
                                            return comentario.id_post === postagem.id;
                                        });

                                        var comentariosCount = comentarios.filter(function(comentario) {
                                            return comentario.id_post === postagem.id;
                                        }).length;
        
                                        var comentariosHTML = '<ul>';
                                        $.each(comentariosPost, function(j, comentario) {
                                            comentariosHTML += '<li>' + comentario.nome + ': ' + comentario.comentario + '</li>';
                                        });
                                        comentariosHTML += '</ul>';
                                    } else {
                                        comentariosHTML = 'Sem comentários';
                                    }

                                    var imagemHTML = '';
                                    if (postagem.imagem && postagem.imagem.trim() !== '') {
                                        imagemHTML = '<br><br> <img src="' + postagem.imagem + '" alt="Imagem" class="foto"> <br>';
                                    }
        
                                    $postagens.append(
                                        '<br><div class="topico">' + postagem.topico +
                                        '</div><div class="titulo"><a href="posts.php?id=' + postagem.id + '">' + postagem.titulo + '</a>' +
                                        '</div><br>' + imagemHTML + '<br>' +
                                        '</div><div class="descricao">' + postagem.descricao +
                                        '</div><br><span class="posttexto">Data: </span>' + postagem.data +
                                        '<br><span class ="posttexto">Hora: </span>' + postagem.hora +
                                        '<br><span class="posttexto">Postador: </span>' + postagem.postador +
                                        '<br><span class="posttexto">Curtidas: </span>' + likesCount +
                                        '<br><button class="btn btn-primary btn-like" data-post-id="' + postagem.id + '">Curtir</button>' +
                                        '<br><span class="posttexto">Comentários: </span>' + comentariosCount +
                                        '</div><hr>');
                                },
                                error: function() {
                                    alert('Erro ao carregar comentários');
                                }
                            });
                        },
                        error: function() {
                            alert('Erro ao carregar contagem de curtidas');
                        }
                    });
                });
            },
            error: function() {
                alert('Erro ao carregar postagens');
            }
        });
    }
});

$(document).on('click', '.btn-like', function() {
    var postId = $(this).data('post-id');

    $.ajax({
        type: 'POST',
        url: 'curtir_post.php',
        data: { id_post: postId },
        dataType: 'json', // Especifica o tipo de dado esperado do servidor
        success: function(response) {
            console.log(response); // Loga a resposta no console para verificar o que está retornando
            if (response.success) {
                alert('Você curtiu este post!');
                location.reload(); // Recarrega a página para atualizar a contagem de curtidas
            } else {
                alert(response.message || 'Erro desconhecido ao curtir o post.');
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.error('Erro no AJAX:', textStatus, errorThrown); // Loga o erro no console
            alert('Erro ao tentar curtir o post.');
        }
    });
});


function adicionarComentario(idPost) {
    var novoComentario = $('#novoComentario' + idPost).val();
    var dataAtual = new Date();
    var dataFormatada = dataAtual.toLocaleDateString();
    var horaFormatada = dataAtual.toLocaleTimeString();

    $.ajax({
        type: 'POST',
        url: 'http://localhost:3000/comentarios',
        contentType: 'application/json; charset=utf-8',
        dataType: 'json',
        data: JSON.stringify({
            id_post: idPost,
            nome: 'Nome do Usuário', 
            comentario: novoComentario,
            data: 'dataFormatada', 
            hora: 'horaFormatada'  
        }),
        error: function () {
            alert('Erro ao adicionar comentário');
        }
    });
}

/* Versão completa do post
$postagens.append('<div>Titulo: <a href="?pagina=posts&id=' + postagem.id + '">' + postagem.titulo + '</a>' +
                                        '<br> Tópico: ' + postagem.topico +
                                        '<br> Descricao: ' + postagem.descricao +
                                        '<br><br> <img src="' + postagem.imagem + '" alt="Imagem" class="foto"> <br>' +
                                        '<br> data: ' + postagem.data +
                                        '<br> hora: ' + postagem.hora +
                                        '<br> postador: ' + postagem.postador +
                                        '<br> Curtidas: ' + likesCount +
                                        '<br> Comentários: ' + comentariosHTML +
                                        '<br>' + 
                                        '<form id="formComentario' + postagem.id + '">' +
                                        '<input type="text" id="novoComentario' + postagem.id + '" placeholder="Adicione um comentário">' +
                                        '<button type="button" onclick="adicionarComentario(' + postagem.id + ')">Comentar</button>' +
                                        '</div><br>');
                                        */