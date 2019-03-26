<?php

    include_once '../../global.php';

    class modeloAluno extends BD {

        public static $tabela = 'tb_alunos';

        public static function getAlunos() {

            return parent::selectAll(self::$tabela, "ORDER BY nome");
        }

        public static function findAluno($id) {

            return parent::selectFind(self::$tabela, "id = $id");
        }

        public static function addAluno($dados_aluno) {

            return parent::insert(self::$tabela, $dados_aluno);
        }

        public static function upAluno($id, $dados) {

            return parent::update(self::$tabela, $dados, "id = $id");
        }

        public static function delAluno($id) {

            return parent::delete(self::$tabela, "id = $id");
        }
    }
