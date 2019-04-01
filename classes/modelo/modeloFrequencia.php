<?php

	include_once '../../global.php';

    class modeloFrequencia extends BD {

		public static $tabela = 'tb_aluno_frequencia';

        public static function getFrequencias() {

            return parent::selectAll(self::$tabela, "ORDER BY id");
        }

        public static function findFrequencia($id) {

            return parent::selectFind(self::$tabela, "id = $id");
        }

        public static function addFrequencia($dados_evento) {

            return parent::insert(self::$tabela, $dados_evento);
        }

        public static function upFrequencia($id, $dados) {

            return parent::update(self::$tabela, $dados, "id = $id");
        }

        public static function delFrequencia($id) {

            return parent::delete(self::$tabela, "id = $id");
        }

        
    }
?>
