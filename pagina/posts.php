<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post Detalhado</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <div class="main-content">
        <h2>Detalhes do Post</h2>
        <br>
        <div id="post"></div>
        <h3>Comentários</h3>
        <ul id="comentarios"></ul>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $(function() {
            var $post = $('#post');
            var $comentarios = $('#comentarios');
            var urlParams = new URLSearchParams(window.location.search);
            var postId = urlParams.get('id');

            if (postId) {
                $.ajax({
                    type: 'GET',
                    url: 'http://localhost:3000/posts/' + postId,
                    success: function(postagem) {
                        $post.append('<h4>' + postagem.titulo + '</h4>' +
                                     '<p>' + postagem.descricao + '</p>' +
                                     '<img src="' + postagem.imagem + '" alt="Imagem" class="foto">' +
                                     '<p>Data: ' + postagem.data + '</p>' +
                                     '<p>Hora: ' + postagem.hora + '</p>' +
                                     '<p>Postador: ' + postagem.postador + '</p>');
                    },
                    error: function() {
                        alert('Erro ao carregar o post');
                    }
                });

                $.ajax({
                    type: 'GET',
                    url: 'http://localhost:3000/comentarios/?id_post=' + postId,
                    success: function(comentarios) {
                        if (comentarios && comentarios.length > 0) {
                            $.each(comentarios, function(i, comentario) {
                                $comentarios.append('<li>' + comentario.nome + ': ' + comentario.comentario + '</li>');
                            });
                        } else {
                            $comentarios.append('<li>Sem comentários</li>');
                        }
                    },
                    error: function() {
                        alert('Erro ao carregar comentários');
                    }
                });
            } else {
                $post.append('<p>ID do post não encontrado. Volte para a página inicial e tente novamente.</p>');
            }
        });
    </script>
</body>
</html>