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
            <h1>Comentário do usuário sobre local</h1><br><br>
	</div>
        <div class="col-12 my-auto">
        <br>	
	<p>Coment:</p><hr>
	<?php
            if(isset($_GET["id"])){
               include("../sql/coment.class.php");
					
                $objeto = new RetornarComentarios();
		$id_usuario = $_GET["id"];
		$id_negocio = $_GET["business_id"];
					
		$lista = $objeto->RetornarCometarioDoUsuarioSobreNegocio($id_usuario,$id_negocio);
					
		echo "<table><tr><th>ID </th><th>Review</th></tr>";
				
		foreach($lista as $dados){
                    echo "<tr><td>{$dados['id']}</td><td>{$dados['text']}</td></tr>";
                }
                     echo "</table>";
            }
	?>
            <hr>
            <br><br>
            <a class="btn btn-secondary" href="index.html">Página Inicial</a>		
        </div>
    </body>
</html>
