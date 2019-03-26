<?php

	include_once '../../global.php';

    class modeloEvento extends BD {

		public static $tabela = 'tb_evento';

        public static function getEventos() {

            return parent::selectAll(self::$tabela, "ORDER BY data");
        }

        public static function findEvento($id) {

            return parent::selectFind(self::$tabela, "id = $id");
        }

        public static function addEvento($dados_evento) {

            return parent::insert(self::$tabela, $dados_evento);
        }

        public static function upEvento($id, $dados) {

            return parent::update(self::$tabela, $dados, "id = $id");
        }

        public static function delEvento($id) {

            return parent::delete(self::$tabela, "id = $id");
        }
    }
?>
