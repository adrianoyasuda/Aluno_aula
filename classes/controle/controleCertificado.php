<?php

    session_start();

    include_once '../../global.php';

    class controleCertificado {

        public static function index() {
            echo "<script>window.location='../view/viewCertificado.php'</script>";
        }

        public static function rota() {

            $dados = explode("/", $_POST['acao']);

            if(strcmp($dados[0], "gerar") == 0) {
                self::gerar();
            }
        }

        public static function gerar() {

                echo "<script>window.open('../../rotinas/gerarCertificados.php', '_blank')</script>";
        }
    }
