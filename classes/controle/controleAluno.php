<?php
    
    session_start();

    include_once '../../global.php';

    class controleAluno {

        public static function index() {
            echo "<script>window.location='../view/viewAluno.php'</script>";
        }

        public static function rota() {

            $dados = explode("/", $_POST['acao']);

            if(strcmp($dados[0], "confirmar") == 0) {
                self::confirmar($dados[1]);
            }
            else if(strcmp($dados[0], "finalizar") == 0) {
                self::finalizar($dados[1]);
            }
        }


        public static function confirmar($id) {
            /*print_r($_POST);*/

            foreach ($_POST as $campo => $value) {

                $dados = explode("_", $campo);

                if(strcmp($dados[0], "cb") == 0) {
                   //echo "ID_ALUNO = ".$dados[1]." / ID_AULA = ".$dados[2]." / VALOR = ".$value."<br>";
                    
                     $dados_evento = array("fk_aluno" => $dados[1], "fk_evento" => $dados[2], "falta" => $value);
                }
            }
        }

        public static function loadData(){
            $evento = modeloEvento::getEventos();

            while ($objEvento = $evento->fetchObject()) {
                echo "<th>".$objEvento->data."</th>";
            }
        }

        public static function loadTabelaAlunos($caso) {
            $alunos = modeloAluno::getAlunos();

            while($objAluno = $alunos->fetchObject()) {
            	echo "<tr>";
                    if($caso == 0){
                        echo "<td>".$objAluno->id."</td>";
                    }
                    else{
                        echo "<th>";
                        echo    "<input type='checkbox'  name='ck_$objAluno->id'  id='ck_$id'>";
                        echo    "<label style='color:green;' id='lb_$objAluno->id'>NÃO</label>";
                        echo "</th>";
                    }
					echo "<td>".$objAluno->nome."</td>";
                    
                    $evento = modeloEvento::getEventos();

                    while ($objEvento = $evento->fetchObject()) {
                        echo "<td>";
                            echo "<select name='cb_".$objAluno->id."_".$objEvento->id."' >";
                                echo "<option value='0'>0</option>";
                                echo "<option value='1'>1</option>";
                                echo "<option value='2'>2</option>";
                            echo "</select>";
                        echo "</td>";
                    }
                        
                    if($caso == 0){
    					echo "<td>".$objAluno->frequencia."%</td>";
                    }
				echo "</tr>";
    		}
    	}
    }

?>