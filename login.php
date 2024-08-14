<?php 
include 'conexao.php';

if(!isset($_SESSION)) {
    session_start();
}

if(isset($_POST['email']) && isset($_POST['senha'])) {

    if(empty($_POST['email'])){
        echo "Preencha seu e-mail";
    } else if(empty($_POST['senha'])){
        echo "Preencha sua senha";
    } else{
        $email = $mysqli->real_escape_string($_POST['email']);
        $senha = $mysqli->real_escape_string($_POST['senha']);

        $sql_code = "SELECT * FROM Usuarios WHERE email = '$email' AND senha = '$senha'";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

        $quantidade = $sql_query->num_rows;

        if($quantidade == 1){
            $usuario = $sql_query->fetch_assoc();

            if(!isset($_SESSION)){
                session_start();
            }
            $_SESSION['id'] = $usuario['id'];
            $_SESSION['email'] = $usuario['email'];
            $_SESSION['nome'] = $usuario['nome'];
            $_SESSION['adm'] = $usuario['adm'];
            $_SESSION['foto'] = $usuario['foto'];
            
            header("Location: index.php");
            exit;
        } else{
            echo "Falha ao logar! E-mail ou senha incorretos";
        }
    }
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
				<!-- Botão de cadastro -->
			<p>
				<center>
					<button type="submit" class="btn-cadastrar" width="" id="cadastrar">Cadastrar-se</button>
				</center>
			</p>

			<!-- Modal para mostrar os dados do usuário cadastrado -->
			<div id="modalUsuarioCadastrado" class="modal" tabindex="-1">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Cadastro Concluído</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
							<p id="dados-usuario-cadastrado"></p>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-primary" id="btnEntrar">Entrar</button>
						</div>
					</div>
				</div>
			</div>
			</center>
			</p>

		<div id="dados-usuario-cadastrado">
		</div>

		
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