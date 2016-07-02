<?php

include_once 'dbtable/Contador.php';

/**
 * Classe responsavel em fazer todas as regras para o contador
 * @author Joao Paulo P Villela <joaopaulopvillela@gmail.com>
 * @version 02/07/2016
 */
class Model_Contador {

    /**
     * @var DbTable_Contador
     */
    protected $dbTable;

    public function __construct() {
        $this->dbTable = new DbTable_Contador();
    }

    /**
     * Inicia o contador de tempo
     * @param int $tempo_id
     * @return boolean se teve sucesso ou erro no start 
     */
    public function iniciar($tempo_id) {
        return $this->dbTable->iniciar($tempo_id);
    }

    /**
     * Busca quanto tempo já se passou desde do inicio do contado
     * @param int $tempo_id Codigo do Tempo
     * @return int  Tempo já gasto
     * @throws Exception    Caso o tempo já tenha ultrapassado
     */
    public function getTempo($tempo_id) {
        $tempo = $this->dbTable->getTempo($tempo_id);

        $dataAtual = new DateTime();
        $dataInicio = new DateTime($tempo['data_inicio']);
        $dataFim = new DateTime($tempo['data_fim']);

        if ($dataFim->getTimestamp() - $dataAtual->getTimestamp() < 0) {
            throw new Exception('Tempo esgotado!');
        }

        return $dataAtual->getTimestamp() - $dataInicio->getTimestamp();
    }

}
