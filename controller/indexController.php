<?php

include_once '../model/Contador.php';

/**
 * Classe para controlar todas as ações da tela principal
 * @author Joao Paulo P Villela <joaopaulopvillela@gmail.com>
 * @version 02/07/2016
 */
class IndexController {

    /**
     * Inicia o contador
     */
    public function iniciar() {

        $tempo_id = filter_input(INPUT_POST, 'tempo_id');

        $model = new Model_Contador();

        echo json_encode(array('data' => array(
                'result' => $model->iniciar($tempo_id)
            ))
        );
    }

    /**
     * Busca o tempo restante 
     */
    public function buscar() {
        $error = null;
        $tempoRestante = NULL;
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
