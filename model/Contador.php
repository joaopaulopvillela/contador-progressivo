<?php

include_once 'dbtable/Contador.php';

class Model_Contador {

    /**
     * @var DbTable_Contador
     */
    protected $dbTable;

    public function __construct() {
        $this->dbTable = new DbTable_Contador();
    }

    public function iniciar($tempo_id) {
        return $this->dbTable->iniciar($tempo_id);
    }

    public function getTempo($tempo_id) {
        $tempo = $this->dbTable->getTempo($tempo_id);


        $dataAtual = new DateTime();
        $dataInicio = new DateTime($tempo['data_inicio']);
        $dataFim = new DateTime($tempo['data_fim']);

        var_dump(date_diff($dataFim, $dataAtual, true)->format("%R%d"));

        if ($dataFim->diff($dataAtual)->format("%r%s") > 0) {
            throw new Exception('Tempo esgotado!');
        }

        return $dataInicio->diff($dataAtual)->format("%S");
    }

}
