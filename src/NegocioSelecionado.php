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
            <h1>Locais que Usuário Selecionado Visitou</h1><br><br>
	</div>
	<div class="col-12 my-auto">
            <br>
            <p>Lista de Lugares</p><hr>
	   <?php
              if(isset($_GET["id"])){
                    include("../sql/coment.class.php");
					
                    $objeto = new RetornarComentarios();
                    $id_usuario = $_GET["id"];
					
                    $lista = $objeto->RetornarNegocioQueUsuarioComentou($id_usuario);
					
                    if($lista != null){
			 echo "<br><table><tr><th>ID Business</th><th>Business</th></tr>";
					   
                    foreach($lista as $dados){//href - listar comentários do negocio
                         echo "<tr><td><a href='ComentNegocioSelecionado.php?id={$_GET["id"]}&business_id={$dados['id']}'>{$dados['id']}</a></td><td>{$dados['name']}</td></tr>"; 
                    }
                        echo "</table>";
		}
            }
				   
	?>
	<hr>
	</div>        
    </body>
</html>


