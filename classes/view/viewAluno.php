<?php

    include_once '../../global.php';

    if( !empty($_POST['form_submit']) ) {
        controleAluno::rota();
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
              <li class="active">
                      <a href="viewMain.php"> Home </a>
              </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container theme-showcase" role="main">

        <div class="page-header">
            <h2 class="form-signin-heading">
                <div id="m_texto"> Alunos Cadastrados </div>
            </h2>
        </div>

        <form class="form" method="post" action="viewAluno.php">
            <input TYPE="hidden" NAME="form_submit" VALUE="OK">

            <button type="submit" name="acao" value="confirmar/0" class="btn btn-primary btn-block">
                <b>Confirmar Lançamento</b>
            </button>
            <br>
            <table class='table table-striped'>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NOME</th>
                        <?php
                          controleAluno::loadData();
                        ?>
                        <th>FREQ.</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        controleAluno::loadTabelaAlunos(0);
                    ?>
                </tbody>
            </table>
        </form>

	<div class="page-header">
		<b>&copy;2019&nbsp;&nbsp;&raquo;&nbsp;&nbsp; Adriano Yasuda</b>
	</div>
    </div> <!-- /container -->
  </body>
</html>
