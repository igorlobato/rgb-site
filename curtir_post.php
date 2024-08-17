<?php
session_start();
include 'conexao.php';

$response = array('success' => false, 'message' => '');

if (!isset($_SESSION['id'])) {
    $response['message'] = 'Você precisa estar logado para curtir este post.';
} else {
    if (isset($_POST['id_post'])) {
        $id_post = intval($_POST['id_post']); // Garantir que o ID seja um inteiro
        $id_usuario = $_SESSION['id'];

        // Verifica se o usuário já curtiu o post
        $verificaCurtida = $mysqli->prepare("SELECT * FROM Curtidas WHERE id_post = ? AND id_usuario = ?");
        $verificaCurtida->bind_param('ii', $id_post, $id_usuario);
        $verificaCurtida->execute();
        $resultado = $verificaCurtida->get_result();

        if ($resultado->num_rows > 0) {
            $response['message'] = 'Você já curtiu este post.';
        } else {
            // Insere a curtida no banco de dados
            $curtirPost = $mysqli->prepare("INSERT INTO Curtidas (id_post, id_usuario) VALUES (?, ?)");
            $curtirPost->bind_param('ii', $id_post, $id_usuario);

            if ($curtirPost->execute()) {
                $response['success'] = true;
            } else {
                $response['message'] = 'Erro ao curtir o post.';
            }
        }
    } else {
        $response['message'] = 'ID do post não fornecido.';
    }
}

echo json_encode($response);
?>
