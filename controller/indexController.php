<?php

include_once '../model/Contador.php';

class IndexController {

    public function buscar() {

        $post = filter_input_array(INPUT_POST);

        $model = new Model_Contador();


        echo json_encode(
                array('data' =>
                    array(
                        'value' => $model->getValue(),
                        'zip' => $post['zipcode']
                    )
                )
        );
    }

}

$action = filter_input(INPUT_GET, 'action');

$index = new IndexController();

$index->$action();
