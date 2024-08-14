<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'conexao.php';

if(!isset($_SESSION)) {
  session_start();
}
?>

<link rel="shortcut icon" type="imagex/png" href="imagens/logo.png">
<nav class="navbar navbar-expand-lg bg-dark" style="z-index: 2;">
			<div class="container-fluid">
			  <a id="rgb" href="index.php" style=color:orange>
				<span style="color:red">R</span>
				<span style="color:green">G</span>
				<span style="color:blue">B</span>
				
			</a>
			
			  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
			  	data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" 
				aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			  </button>
			  
			  <div class="collapse navbar-collapse" id="navbarSupportedContent">
				
				<ul class="navbar-nav me-auto mb-2 mb-lg-0" style="margin-left: 20px">

				<?php
					if ( (isset($_SESSION['nome'])) && ($_SESSION['nome'] != '') ) {
						if (isset($_SESSION['id'])) {
							$idUser = $_SESSION['id'];
							$seleciona = mysqli_query($mysqli, "SELECT foto FROM Usuarios WHERE id = '$idUser'");
							$linha = mysqli_fetch_assoc($seleciona);
					
							$fotoPerfil = $linha['foto'];
					
							if (is_null($fotoPerfil)) {
								$fotoPerfil = 'imagens/fotosdeperfil/foto_perfil0.jpg'; 
							}
					
							echo '<a href="?pagina=editarperfil"><img src="' . $fotoPerfil . '" alt="Foto de Perfil" style="width: 25px; height: 25px; border-radius: 50%; margin-right: 10px;"></a>';
						}


						echo '<li class="nome-user">' . $_SESSION['nome'];
						if (isset($_SESSION['adm']) && $_SESSION['adm'] != 0) {
						echo ' <span style="color: #ADFF2F">adm</span>';
					}
						echo '</li>';
						echo '<li> <a href="logout.php" style="padding: 10px 10px; text-decoration: none; color:red;">Sair</a>';
					} else { 
						echo '
						<li class="nav-item">
						<a class="nav-link active" aria-current="page" href="login.php"
						 style="color:White; padding: 10px 10px;">Entrar/Cadastrar-se</a>
						  </li>
						';
					}
				?>
					
				</ul>
				<form action="?pagina=pesquisa" method="POST" enctype="multipart/form-data" class="d-flex" role="search">
				  <input id="searchInput" name="busca" class="form-control me-2" type="text" placeholder="Digite algo..." aria-label="Search">
				  <button value="Buscar" class="btn btn-outline-success" type="submit">Pesquisar</button>
				  <input type="hidden" name="buscar" value="find"/>
				</form>
			  </div>
			</div>
		  </nav>


      <div class="sidebar">	
    <a href="index.php" class="d-flex align-items-center pb-3 mb-3 link-dark text-decoration-none border-bottom" style="margin-top: 65px;">
      <svg class="bi pe-none me-2" width="30" height="24"><use xlink:href="#bootstrap"/></svg>
      <span class="fs-5 fw-semibold">Conteúdos</span>
    </a>
    <ul class="list-unstyled ps-0">
      <li class="mb-1">
        <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="false">
          Processadores
        </button>
        <div class="collapse" id="home-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded topic">Intel</a></li>
            <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded topic">Amd</a></li>
            <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded topic">Outros</a></li>
          </ul>
        </div>
      </li>
      <li class="mb-1">
        <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#dashboard-collapse" aria-expanded="false">
          Placas de Vídeo
        </button>
        <div class="collapse" id="dashboard-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded topic">Geforce</a></li>
            <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded topic">Radeon</a></li>
            <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded topic">Outros</a></li>
          </ul>
        </div>
      </li>
      <li class="mb-1">
        <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#orders-collapse" aria-expanded="false">
          Geral
        </button>
        <div class="collapse" id="orders-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded topic">Hardware</a></li>
            <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded topic">Software</a></li>
          </ul>
        </div>
      </li>
      <li class="border-top my-3"></li>
    <?php 
    if( (isset($_SESSION['nome'])) && ($_SESSION['nome'] != '') ) {
      echo'
      <li class="mb-1">
        <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#account-collapse" aria-expanded="false">
          Conta
        </button>
        <div class="collapse" id="account-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a href="?pagina=editarperfil" class="link-dark d-inline-flex text-decoration-none rounded">Perfil</a></li>
            <li><a href="post.php" class="link-dark d-inline-flex text-decoration-none rounded">Novo Post</a></li>
            <li><a href="logout.php" class="link-dark d-inline-flex text-decoration-none rounded">Sair</a></li>
          </ul>
        </div>
      </li>';
    }
    ?>
    </ul>
  </div>

  <script src ="javascript/main.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
