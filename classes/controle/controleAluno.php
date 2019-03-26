<?php
    
    session_start();

    include_once '../../global.php';

    class controleAluno {

        public static function index() {
            echo "<script>window.location='../view/viewAluno.php'</script>";
        }

        public static function rota() {

            $dados = explode("/", $_POST['acao']);

            print_r($_POST);

            if(strcmp($dados[0], "confirmar") == 0) {
                self::confirmar($dados[1]);
            }
            else if(strcmp($dados[0], "finalizar") == 0) {
                self::finalizar($dados[1]);
            }
        }


        public static function confirmar($id) {

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
                            echo "<select name='$objAluno->id$objEvento->data' >";
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