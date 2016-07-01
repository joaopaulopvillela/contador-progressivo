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

    public function getValue() {
        return $this->dbTable->x();
    }

}
