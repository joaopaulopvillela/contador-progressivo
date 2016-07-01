<?php

class DbTable_Contador {

    /**
     * @var PDO
     */
    private $pdo;

    public function __construct() {
        $this->pdo = new PDO('mysql:host=localhost;dbname=contador', 'root', '');
    }

    public function iniciar($tempo_id) {
        
        $query = 'UPDATE tempo SET ';
        $query .= 'data_inicio = NOW(), data_fim = DATE_ADD( NOW(), INTERVAL duracao SECOND) ';
        $query .= "WHERE id = {$tempo_id}";
        
        return $this->pdo->query($query)->fetch();
        
    }

    public function getTempo($tempo_id) {
        return $this->pdo->query("SELECT * FROM tempo WHERE id = {$tempo_id}")->fetch();
    }

}
