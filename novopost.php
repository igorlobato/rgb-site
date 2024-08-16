<?php include 'estrutura.php';?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RGB</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel = "stylesheet" href = "css/style.css">
</head>
<body>
    <div class="main-content"> 
        <h3 style="margin: 30px 30px">Criar Novo Post</h3>
      <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Definindo as variáveis a partir do POST
            $titulo = $_POST['titulo'];
            $descricao = $_POST['descricao'];
            $postador = $_SESSION['nome'];
            $topico = $_POST['topic'];
            
            date_default_timezone_set('America/Sao_Paulo');
            $data = date("d/m/Y");
            $hora = date("H:i:s");

            $uploaddir = 'imagens/uploads/';
            $uploadfile = $uploaddir . basename($_FILES['imagem']['name']);
            $imagename = $uploaddir . basename($_FILES['imagem']['name']);

            if (move_uploaded_file($_FILES['imagem']['tmp_name'], $uploadfile)) {
                echo "Imagem enviada com sucesso";
            } else {
                echo "Erro ao enviar a imagem";
            }

            // Executando a query após a definição das variáveis
            $sql = "INSERT INTO Posts (titulo, descricao, imagem, data, hora, postador, topico)
                    VALUES ('$titulo', '$descricao', '$imagename', '$data', '$hora', '$postador', '$topico')";

            if ($mysqli->query($sql)) {
                echo "Post feito com sucesso.<br><a href='index.php'>Voltar</a>";
            } else {
                echo "Erro ao postar.<br><a href='index.php'>Voltar</a>";
            }
        }
        ?>
    <form action="novopost.php" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="topic" id="topic">
        <ul class="navbar-nav">
            <li class="nav-item dropdown">
            <a id="topic-link" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="margin:3% 7%">
                Selecione um tópico
            </a>
        <ul class="dropdown-menu dropdown-menu-white">
            <li><a class="dropdown-item" href="#" value="Intel">Intel</a></li>
            <li><a class="dropdown-item" href="#" value="Amd">Amd</a></li>
            <li><a class="dropdown-item" href="#" value="Geforce">Geforce</a></li>
            <li><a class="dropdown-item" href="#" value="Radeon">Radeon</a></li>
            <li><a class="dropdown-item" href="#" value="Hardware">Hardware</a></li>
            <li><a class="dropdown-item" href="#" value="Software">Software</a></li>
            <li><a class="dropdown-item" href="#" value="Outros">Outros</a></li>
            <ul class="dropdown-menu dropdown-menu-white" onchange="document.getElementById('topic').value = this.value">
        </ul>
        </li>
    </ul>
    
    <input type="text"  name="titulo" placeholder="Adicione um título interessante" style="width: 50%;">
    <br>
    <br>
    <textarea type="text" id="descricao" name="descricao" placeholder="Adicione o seu texto..." style="width: 80%; padding: 30px; overflow-y: hidden;"></textarea>
    <br>
    <br>
    <p>
    <input name ="imagem" type="file" style="margin-left: 110px;">
    <center>
        <button type="submit" class="postar" style="background-color: rgb(1, 147, 245); color: white; width: 20%; border-radius: 5px; min-width: 120px; margin-bottom: 140px;">Postar</button>
    </center>
    </form>
</div>
</body>
<script>
	const dropdown = document.querySelector('.dropdown-menu');
	const topicLink = document.getElementById('topic-link');
	const topicInput = document.getElementById('topic');

	dropdown.addEventListener('click', (event) => {
		if (event.target.getAttribute('value')) {
		const selectedTopic = event.target.getAttribute('value');
		topicInput.value = selectedTopic;
		topicLink.textContent = selectedTopic;
		}
	});
</script>

<script>
  const textarea = document.getElementById('descricao');

  textarea.addEventListener('input', () => {
    textarea.style.height = 'auto'; 
    textarea.style.height = textarea.scrollHeight + 'px'; 
  });
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" 
		integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
		
		<script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

      <script src="sidebars.js"></script>
	  <script src="/docs/5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

      <script src="sidebars.js"></script>

</html>