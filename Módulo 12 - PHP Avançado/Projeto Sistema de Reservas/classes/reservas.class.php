<?php
class Reservas
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function getReservas($data_inicio, $data_fim)
    {   
        $array = array();

        $stmt = $this->conn->prepare("SELECT * FROM reservas WHERE data_inicio <= :data_fim AND data_fim >= :data_inicio");
        $stmt->bindValue(":data_inicio", $data_inicio);
        $stmt->bindValue(":data_fim", $data_fim);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $array = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        return $array;
    }

    public function estaDisponivel($id_carro, $data_inicio, $data_fim)
    {   
        // Retorno maior que 0 está reservado, caso contrario está disponível!
        $stmt = $this->conn->prepare("SELECT * FROM reservas WHERE id_carro = :id_carro AND (data_inicio <= :data_fim AND data_fim >= :data_inicio)");
        //SELECT * FROM reservas WHERE id_carro = :id_carro AND ( NOT (data_inicio > :data_fim OR data_fim < :data_inicio))
        $stmt->bindValue(":id_carro", $id_carro);
        $stmt->bindValue(":data_inicio", $data_inicio);
        $stmt->bindValue(":data_fim", $data_fim);
        $stmt->execute();

        if ($stmt->rowCount() == 0) {
            return true;
        } else {
            return false;
        }
    }

    public function reservar($id_carro, $data_inicio, $data_fim, $nome_pessoa)
    {
        $stmt = $this->conn->prepare("INSERT INTO reservas (id_carro, data_inicio, data_fim, nome) VALUES (:id_carro, :data_inicio, :data_fim, :nome_pessoa)");
        $stmt->bindValue(":id_carro", $id_carro);
        $stmt->bindValue(":data_inicio", $data_inicio);
        $stmt->bindValue(":data_fim", $data_fim);
        $stmt->bindValue(":nome_pessoa", $nome_pessoa);
        $stmt->execute();
    }
}