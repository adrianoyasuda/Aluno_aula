<?php

    session_start();

    include_once '../../global.php';

    class controleEvento {

        public static function index() {
            echo "<script>window.location='../view/viewEvento.php'</script>";
        }

        public static function rota() {

        	$dados = explode("/", $_POST['acao']);

            if(strcmp($dados[0], "cadastrar") == 0) {
                self::cadastrar();
            }
            else if(strcmp($dados[0], "alterar") == 0) {
                self::alterar($dados[1]);
            }
            else if(strcmp($dados[0], "remover") == 0) {
                self::remover($dados[1]);
            }
            else if(strcmp($dados[0], "confirmar") == 0) {
                self::confirmar($dados[1]);
            }
            else if(strcmp($dados[0], "finalizar") == 0) {
                self::finalizar($dados[1]);
            }
        }

        public static function cadastrar() {
            echo "<script>window.location='../view/viewEventoCadastrar.php'</script>";
        }

        public static function alterar($id) {

            $evento = modeloEvento::findEvento($id);

            if(empty($evento)) {
                $_SESSION['MSGBOX_TITULO'] = "OPERAÇÃO INVÁLIDA!";
                $_SESSION['MSGBOX_MSG'] = "O ID informado para o Evento não existe!";
                $_SESSION['MSGBOX_LINK'] = "viewEvento.php";
                $_SESSION['MSGBOX_CLASSE'] = "alert alert-danger";

                echo "<script>window.location='../view/viewMessagebox.php'</script>";
            }
            else {

                $url = "../view/viewEventoAlterar.php?id=$evento->id";
                $url .= "&data=$evento->data";
                $url .= "&conteudo=$evento->conteudo";

                echo "<script>window.location='".$url."'</script>";
            }
        }

        public static function remover($id) {

            $evento = modeloEvento::findEvento($id);

            if(empty($evento)) {
                $_SESSION['MSGBOX_TITULO'] = "OPERAÇÃO INVÁLIDA!";
                $_SESSION['MSGBOX_MSG'] = "O ID informado para o Evento não existe!";
                $_SESSION['MSGBOX_LINK'] = "viewEvento.php";
                $_SESSION['MSGBOX_CLASSE'] = "alert alert-danger";

                echo "<script>window.location='../view/viewMessagebox.php'</script>";
            }
            else {

                $url = "../view/viewEventoRemover.php?id=$evento->id";
                $url .= "&conteudo=$evento->conteudo";
                echo "<script>window.location='".$url."'</script>";
            }
        }

        public static function confirmar($id) {

            if($_POST['data'] != "" && $_POST['conteudo'] != "") {

                $dados_evento = array("data" => mb_strtoupper($_POST['data'], 'UTF-8'),
                    "conteudo" => mb_strtoupper($_POST['conteudo'], 'UTF-8')
                );

                // Inserir
                if($id == 0) {
                    modeloEvento::addEvento($dados_evento);
                    $_SESSION['MSGBOX_MSG'] = "O Evento foi cadastrado no sistema!";
                }
                // Alterar
                else {
                    modeloEvento::upEvento($id, $dados_evento);
                    $_SESSION['MSGBOX_MSG'] = "Os dados do Evento foram alterados no sistema!";
                }

                $_SESSION['MSGBOX_TITULO'] = "OPERAÇÃO REALIZADA COM SUCESSO!";
                $_SESSION['MSGBOX_LINK'] = "viewEvento.php";
                $_SESSION['MSGBOX_CLASSE'] = "alert alert-success";

                echo "<script>window.location='../view/viewMessagebox.php'</script>";
            }
            else {
                $_SESSION['MSGBOX_TITULO'] = "OPERAÇÃO INVÁLIDA!";
                $_SESSION['MSGBOX_MSG'] = "Todos os campos devem ser preenchidos!";
                $_SESSION['MSGBOX_CLASSE'] = "alert alert-warning";

                if($id == 0) { $_SESSION['MSGBOX_LINK'] = "viewEventoCadastrar.php"; }
                else { $_SESSION['MSGBOX_LINK'] = "viewAlunoAlterar.php"; }
            }
        }

        public static function finalizar($id) {

            modeloEvento::delEvento($id);

            $_SESSION['MSGBOX_TITULO'] = "OPERAÇÃO REALIZADA COM SUCESSO!";
            $_SESSION['MSGBOX_MSG'] = "O Evento foi removido do sistema!";
            $_SESSION['MSGBOX_LINK'] = "viewEvento.php";
            $_SESSION['MSGBOX_CLASSE'] = "alert alert-success";

            echo "<script>window.location='../view/viewMessagebox.php'</script>";
        }

        public static function loadTabelaEventos() {

            $eventos = modeloEvento::getEventos();

            while($objEvento = $eventos->fetchObject()) {

                echo "<tr>";
                    echo "<td>".$objEvento->id."</td>";
                    echo "<td>".$objEvento->data."</td>";
                    echo "<td>".$objEvento->conteudo."</td>";

                    echo "<td>";
                        echo "<button type='submit' name='acao' value='alterar/".$objEvento->id."'>";
                            echo "<span class='glyphicon glyphicon-pencil'></span>";
                        echo "</button>";
                        echo "&nbsp";
                        echo "<button type='submit' name='acao' value='remover/".$objEvento->id."'>";
                            echo "<span class='glyphicon glyphicon-remove'></span>";
                        echo "</button>";
                        echo "&nbsp";
                    echo "</td>";
                echo "</tr>";
            }
    	}
    }
