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

            $backup;
            $cont = 0;
            $somfalt = 0;
            $quantAulas = 0;

            foreach ($_POST as $campo => $value) {

                $dados = explode("_", $campo);


                if(strcmp($dados[0], "cb") == 0) {
                   //echo "ID_ALUNO = ".$dados[1]." / ID_AULA = ".$dados[2]." / VALOR = ".$value."<br>";
                    
                    $dados_evento = array("fk_aluno" => $dados[1], "fk_evento" => $dados[2], "falta" => $value);

                    //modeloFrequencia::addFrequencia($dados_evento);

                    $frequencia = modeloFrequencia::findFrequencia($dados[1], $dados[2]);

                    if (empty($frequencia)) {
                        modeloFrequencia::addFrequencia($dados_evento);
                    }
                    else{
                        modeloFrequencia::upFrequencia($frequencia->id, $dados_evento);
                    }

                    $flag = 1;

                    if(empty($backup)){
                        $backup  = $dados[1];
                        $somfalt = $value;
                        $cont++;
                        $flag = 0;

                    }
                    elseif ($backup == $dados[1]) {
                        $backup = $dados[1];
                        $somfalt = $somfalt+$value;
                        $cont++;
                        $quantAulas = $cont;
                        $flag = 0;
                    }

                    elseif($flag == 1){
                        echo $somfalt;
                        $backup = $dados[1];
                        $somfalt = 0;
                        $cont = 1;
                        $qtdbackup = $quantAulas;
                        echo "--";
                        
                    }
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

                                $valor = modeloFrequencia::findFrequencia($objAluno->id, $objEvento->id);

                                if($valor->falta == 0){
                                    echo "<option value='0' selected >0</option>";
                                    echo "<option value='1'>1</option>";
                                    echo "<option value='2'>2</option>";
                                }
                                elseif ($valor->falta == 1) {
                                    echo "<option value='0'>0</option>";
                                    echo "<option value='1' selected >1</option>";
                                    echo "<option value='2'>2</option>";
                                }
                                elseif ($valor->falta == 2) {
                                    echo "<option value='0'>0</option>";
                                    echo "<option value='1'>1</option>";
                                    echo "<option value='2' selected >2</option>";
                                }
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