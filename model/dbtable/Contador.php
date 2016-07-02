<?php

class DbTable_Contador {

    /**
     * @var PDO
     */
    private $pdo;

    public function __construct() {
        $this->pdo = new PDO('mysql:host=localhost;dbname=contador', 'root', 'root');
    }

    /**
     * Inicia o tempo 
     * @param int $tempo_id
     * @return boolean
     */
    public function iniciar($tempo_id) {
        
        $query = 'UPDATE tempo SET ';
        $query .= 'data_inicio = NOW(), data_fim = DATE_ADD( NOW(), INTERVAL duracao SECOND) ';
        $query .= "WHERE id = {$tempo_id}";
        
        return $this->pdo->query($query)->fetch();
        
    }

    /**
     * Busca os dados do tempo desejado
     * @param int $tempo_id
     * @return array
     */
    public function getTempo($tempo_id) {
        return $this->pdo->query("SELECT * FROM tempo WHERE id = {$tempo_id}")->fetch();
    }

}
