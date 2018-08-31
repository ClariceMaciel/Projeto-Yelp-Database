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
            <h1 class="mb-5">Buscar Usuário</h1>
            <form  action="" method="GET">
                Inserir Nome: <input name="nome" required>
                <input class="btn btn-secondary" type="submit" value="Buscar"><br><br>
            </form>
	</div>
	<div class="col-12 my-auto">	
        <?php   
        //listar User
        //selecionar user 
        //listar negocio
        
            if(isset($_GET["nome"])){
                include("../sql/coment.class.php");
				
		echo"<p>Usuários Encontrados</p><hr>";
                
                $objeto = new RetornarComentarios();
                $buscar_nome = $_GET["nome"];
                
                $lista = $objeto ->ListarUser($buscar_nome);
                
                if($lista != null){
                    echo "<br><table><tr><th>ID User</th><th>Nome Usuário</th></tr>";
                   
                   foreach($lista as $dados){
                      echo "<tr><td><a href='NegocioSelecionado.php?id={$dados['id']}'>{$dados['id']}</a></td><td>{$dados['name']}</td></tr>"; 
                   }
                   echo "</table><hr>";
                }
            }
            
        ?>  
	</div>		
    </body>
</html>


