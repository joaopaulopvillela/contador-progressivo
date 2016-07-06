<?php

class DbTable_Contador {

    /**
     * @var PDO
     */
    private $pdo;

    public function __construct() {
        $this->pdo = new PDO('mysql:host=localhost;dbname=contador', 'root', '');
    }

    /**
     * Inicia o tempo 
     * @param int $tempo_id
     * @return boolean
     */
    public function iniciar($tempo_id) {
        
        $tempo = rand(10, 20);
        
        $query = 'INSERT INTO contador.tempo (id, nome, data_inicio, data_fim, duracao ) VALUES ';
        $query .= "( NULL, 'Tempo {$tempo}', NOW(), DATE_ADD( NOW(), INTERVAL {$tempo} SECOND), {$tempo} )";
        
        return $this->pdo->query($query)->fetch();
        
    }

    /**
     * Busca os dados do tempo desejado
     * @param int $tempo_id
     * @return array
     */
    public function getTempo($tempo_id) {
        return $this->pdo->query("SELECT * FROM tempo WHERE id = ( SELECT MAX(id) FROM tempo )")->fetch();
//        return $this->pdo->query("SELECT * FROM tempo WHERE id = {$tempo_id}")->fetch();
    }

}
