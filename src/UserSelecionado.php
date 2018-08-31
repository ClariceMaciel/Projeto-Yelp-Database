<html>
    <head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">

		<title>LPW2 - YELP</title>

		<!-- Bootstrap core CSS -->
		<link href="css/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

		<!-- Custom fonts for this template -->
		<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900,900i" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Merriweather:300,300i,400,400i,700,700i,900,900i" rel="stylesheet">
		<link href="css/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">

		<!-- Custom styles for this template -->
		<link href="css/coming-soon.min.css" rel="stylesheet">

   </head>
    <body>
        <div class="topo">
            <h1>Amigos do Usuário Selecionado</h1><br><br>
	</div>
	<div class="col-12 my-auto">
	<br>
	<p>Lista de Amigos</p><hr>	
	<?php
            if(isset($_GET["id"])){
                include("../sql/user.class.php");
			
		$objeto = new RetornarUsuarios();
		$id_usuario = $_GET["id"];
					
		$lista = $objeto->ListarFriendsUser($id_usuario);
					
		if($lista!=null){
                    echo "<table><tr><th>ID User</th><th>Nome do Amigo</th></tr>";
						
                    foreach($lista as $dados){
			echo "<tr><td>{$dados['id']}</td><td>{$dados['name']}</td></tr>";
                    }
                    echo "</table>";
                }
		else{
                    echo "Este usuário não possui friends :(";
                }
            }  
         ?>
            <hr>
            <br><br>
            <a class="btn btn-secondary" href="index.html">Página Inicial</a>
	</div>	        
    </body>
</html>
