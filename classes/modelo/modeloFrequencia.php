<?php

	include_once '../../global.php';

    class modeloFrequencia extends BD {

		public static $tabela = 'tb_aluno_frequencia';

        public static function getFrequencias() {

            return parent::selectAll(self::$tabela, "ORDER BY fk_aluno");
        }

        public static function findFrequencia($fk_aluno, $fk_evento) {

            return parent::selectFind(self::$tabela, "fk_aluno = $fk_aluno AND fk_evento = $fk_evento");
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
