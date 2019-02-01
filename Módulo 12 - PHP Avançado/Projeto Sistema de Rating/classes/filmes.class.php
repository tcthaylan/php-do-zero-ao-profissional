<?php
class Filmes
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function getFilmes()
    {
        $array = array();
        $stmt = $this->conn->query("SELECT * FROM filmes");
        if ($stmt->rowCount() > 0) {
            $array = $stmt->fetchAll();
        }
        return $array;
    }

    public function votar($id_filme, $nota)
    {
        $stmt = $this->conn->prepare("INSERT INTO votos (id_filme, nota) VALUES (:id_filme, :nota)");
        $stmt->bindValue(":id_filme", $id_filme);
        $stmt->bindValue(":nota", $nota);
        $stmt->execute();
    }

    public function calcularMedia($id_filme)
    {   
        $stmt = $this->conn->prepare("UPDATE filmes SET media = (SELECT AVG(nota) FROM votos WHERE votos.id_filme = filmes.id) WHERE id = :id_filme");
        $stmt->bindValue(":id_filme", $id_filme);
        $stmt->execute();
    }
}