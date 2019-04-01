<?php

    include_once '../../global.php';

    if( !empty($_POST['form_submit']) ) {
        controleEvento::rota();
    }
?>

<!DOCTYPE html>
<html lang="en">
  <head>

    <link rel="icon" href="img/favicon.ico">
    <title>SisLanF</title>

    <!-- Bootstrap URL - CSS -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link href="../../recursos/css/theme.css" rel="stylesheet">
    <!-- Ajax Script -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.js" integrity="sha256-fNXJFIlca05BIO2Y5zh1xrShK3ME+/lYZ0j+ChxX2DA=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

  </head>

  <body role="document">
    <!-- Fixed navbar -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand">[ SisLanF ] Sistema de Lançamento de Faltas</a>
        </div>
  <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container theme-showcase" role="main">

        <form class="form" method="post" action="viewEvento.php">
            <input TYPE="hidden" NAME="form_submit" VALUE="OK">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-body">
                        <h3> Deseja remover a Aula ? <br><br><b><?php echo $_GET['conteudo']; ?></b></h3>
                    </div>
                    <div class="modal-footer">

                        <button type="submit" name="acao" value="finalizar/<?php echo $_GET['id']; ?>" class="btn btn-success">Sim</button>
                        <a href="viewEvento.php" type="button" class="btn btn-danger">Não</a>
                    </div>
                </div>
            </div>
        </form>

        <div class="page-header">
    		<b>&copy;2017&nbsp;&nbsp;&raquo;&nbsp;&nbsp; Adriano Yasuda</b>
    	</div>
    </div>
</body>
</html>
