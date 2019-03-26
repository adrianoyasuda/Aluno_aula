<?php

    session_start();

    // AutoLoader
    include_once 'global.php';

    // Verifica se o modo DEBUG está ativado
    if ( config::DEBUG == false ) {
    	// Esconde todos os erros
    	error_reporting(0);
    	ini_set("display_errors", 0);

    } else {
    	// Mostra todos os erros
    	error_reporting(E_ALL);
    	ini_set("display_errors", 1);
    }

    // Controller Principal - Carrega Página Principal
    controleMain::index();
