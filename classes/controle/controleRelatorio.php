<?php

    session_start();

    include_once '../../global.php';

    class controleRelatorio {

        public static function index() {
            echo "<script>window.location='../view/viewRelatorio.php'</script>";
        }
    }