<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'conexao.php';
include 'estrutura.php';
if(!isset($_SESSION)) {
  session_start();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RGB</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel = "stylesheet" href = "css/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>
<body>
    <div class="main-content">
        <?php
            if(isset($_GET['id'])){
                $id_post = $_GET['id'];
                
                $consulta_post = $mysqli->prepare("SELECT * FROM Posts WHERE id = ?");
                $consulta_post->bind_param('i', $id_post);
                $consulta_post->execute();
                $resultado = $consulta_post->get_result();
                
                // Verifica se o post foi encontrado
                if ($resultado->num_rows > 0) {
                    // Extrai os detalhes do post
                    $post = $resultado->fetch_assoc();

                    $consulta_curtidas = $mysqli->prepare("SELECT COUNT(*) AS total_curtidas FROM Curtidas WHERE id_post = ?");
                    $consulta_curtidas->bind_param('i', $id_post);
                    $consulta_curtidas->execute();
                    $resultado_curtidas = $consulta_curtidas->get_result();
                    $curtidas = $resultado_curtidas->fetch_assoc();

                    // Consulta SQL para contar comentários
                    $consulta_comentarios_count = $mysqli->prepare("SELECT COUNT(*) AS total_comentarios FROM Comentarios WHERE id_post = ?");
                    $consulta_comentarios_count->bind_param('i', $id_post);
                    $consulta_comentarios_count->execute();
                    $resultado_comentarios_count = $consulta_comentarios_count->get_result();
                    $comentarios_count = $resultado_comentarios_count->fetch_assoc();

                    
                    // Exibindo os detalhes do post
                    echo '<div><a href="index.php">Voltar</a></div>';
                    echo '<div class="topico">' . htmlspecialchars($post['topico']) . '</div>';
                    echo '<div class="titulo">' . htmlspecialchars($post['titulo']) . '</div>';
                    if (!empty($post['imagem'])) {
                        echo '<br><img src="' . htmlspecialchars($post['imagem']) . '" alt="Imagem" class="foto"><br><br>';
                    }
                    echo '<div class="descricao">' . nl2br(htmlspecialchars($post['descricao'])) . '</div>';
                    echo '<br><span class ="posttexto">Data: </span>' . htmlspecialchars($post['data']);
                    echo '<br><span class ="posttexto">Hora: </span>' . htmlspecialchars($post['hora']);
                    echo '<br><span class ="posttexto">Postador: </span>' . htmlspecialchars($post['postador']);
                    echo '<br><span class="posttexto">Curtidas: </span>' . $curtidas['total_curtidas'];
                    echo '<br><button class="btn btn-primary btn-like" data-post-id="' . $post['id'] . '">Curtir</button>';
                    echo '<br><span class="posttexto">Comentários: </span>' . $comentarios_count['total_comentarios'];
                    echo '<br><hr>';

                    // Consulta SQL para selecionar os comentários do post
                    $consulta_comentarios = $mysqli->prepare("SELECT nome, comentario, data, hora FROM Comentarios WHERE id_post = ?");
                    $consulta_comentarios->bind_param('i', $id_post);
                    $consulta_comentarios->execute();
                    $resultado_comentarios = $consulta_comentarios->get_result();

                    if (isset($_SESSION['id'])) {
                        echo '<h3>Adicionar Comentário:</h3>';
                        echo '<form action="" method="post">';
                        echo '<div class="mb-3">';
                        echo '<label for="comentario" class="form-label">Comentário:</label>';
                        echo '<textarea class="form-control" name="comentario" id="comentario" rows="4" required></textarea>';
                        echo '</div>';
                        echo '<button type="submit" class="btn btn-primary">Comentar</button>';
                        echo '</form>';
                    } else {
                        echo '<p>Você precisa estar logado para adicionar um comentário.</p>';
                    }

                    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['comentario'])) {
                        date_default_timezone_set('America/Sao_Paulo');
                        $nome = $_SESSION['nome'];
                        $comentario = $_POST['comentario'];
                        $data = date('d-m-Y');
                        $hora = date('H:i:s');
                    
                        $inserir_comentario = $mysqli->prepare("INSERT INTO Comentarios (id_post, nome, comentario, data, hora) VALUES (?, ?, ?, ?, ?)");
                        $inserir_comentario->bind_param('issss', $id_post, $nome, $comentario, $data, $hora);
                    
                        if ($inserir_comentario->execute()) {
                            echo '<p>Comentário adicionado com sucesso!</p>';
                            echo '<script>
                                        window.location.href = "' . $_SERVER['REQUEST_URI'] . '";
                                    </script>';
                            exit();
                        } else {
                            echo '<p>Erro ao adicionar comentário.</p>';
                        }
                    }
                    

                    // Exibe os comentários
                    if ($resultado_comentarios->num_rows > 0) {
                        echo '<h3>Comentários:</h3><ul>';
                        while ($comentario = $resultado_comentarios->fetch_assoc()) {
                            echo '<div><strong>' . htmlspecialchars($comentario['nome']) . 
                            '</div></strong> <div>' . htmlspecialchars($comentario['comentario']) . '</div>' .
                            '<div>' . htmlspecialchars($comentario['data']) . ' <span class="posttexto">às</span> ' . htmlspecialchars($comentario['hora']) . '</div><hr>';
                        }
                        echo '</ul>';
                    } else {
                        echo '<p>Sem comentários.</p>';
                    }

                } else {
                    echo '<p>Post não encontrado.</p>';
                }
            } else {
                echo '<p>ID do post não fornecido na URL.</p>';
            }
        ?>
    </div>
    <script>
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
</script>
</body>
</html>