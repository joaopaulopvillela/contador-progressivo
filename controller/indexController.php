<?php

include_once '../model/Contador.php';

class IndexController {

    public function iniciar() {
        $tempo_id = filter_input(INPUT_POST, 'tempo_id');

        $model = new Model_Contador();

        echo json_encode(array('data' => array(
//                'result' => $model->iniciar($tempo_id)
            ))
        );
    }

    public function buscar() {
        $tempoRestante = $error = null;
        try {

            $tempo_id = filter_input(INPUT_POST, 'tempo_id');


            $model = new Model_Contador();
            
            $tempoRestante = $model->getTempo($tempo_id);
        } catch (Exception $ex) {
            $error = $ex->getMessage();
        }
        echo json_encode(
                array('data' =>
                    array(
                        'error' => $error,
                        'value' => $tempoRestante,
                    )
                )
        );
    }

}

$action = filter_input(INPUT_GET, 'action');

$index = new IndexController();

$index->$action();
