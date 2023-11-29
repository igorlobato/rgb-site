<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RGB</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel = "stylesheet" href = "css/style.css">
    <?php include 'estrutura.php';?>

</head>
<body>
    <div class="main-content">
        <h1 style="padding: 10px 30px">Cadastrar-se</h1>
        <br>
		<a style="padding: 50px;color:rgb(109, 109, 109); padding-right: 0%; padding-left: 8%;" >Ao continuar você conconda com a <a href ="#" >política de privacidade</a></a>

		<br>
		<br>
		<br>
			<ul id ="usuarios"></ul>
			<p>
			<center>
				<input type="text" id ="email" placeholder="E-mail" class="lblnormal">
			</center>
			</p>
			<p>
			<center>
				<input type="text" id="nome" name="usuario" placeholder="Usuário" class="lblnormal">
			</center>
			</p>
			<center>
				<input type="password" id="senha" name="senhac" placeholder="Senha" class="lblnormal">
			</center>
			</p>
			<br>
			<br>
			<p>
			<center>
				<button type="submit" class="btn-cadastrar" width="" id="cadastrar">Cadastrar-se</button>
			</center>
			</p>
		</form>

		<?php if (isset($mensagem)) : ?>
        <div class="alert">
            <p><?php echo $mensagem; ?></p>
            <button onclick="fecharMensagem()">Fechar</button>
        </div>
		<?php endif; ?>
		<script>
			function fecharMensagem() {
				document.querySelector('.alert').style.display = 'none';
			}
		</script>

		
		<h1 style="padding: 10px 30px">Entrar</h1>
		
		<form action ="" method="POST">
			<p>
			<center>
				<input type="text" name="email" placeholder="E-mail" class="lblnormal">
			</center>
			</p>
			<center>
				<input type="password" name="senha" placeholder="Senha" class="lblnormal">
			</center>
			</p>
			<br>
			<br>
			<p>
			<center>
				<button type="submit" class="btn-cadastrar" id="entra">Entrar</button>
			</center>
			</p>
		</form>
		
		<br>
		<br>
		<a id="esqc">Esqueceu a <a href ="esqueci.php">senha?</a></a>
		<br>
		<br>
    </div>
    

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
	<script src ="javascript/main.js"></script>
</body>
</html>