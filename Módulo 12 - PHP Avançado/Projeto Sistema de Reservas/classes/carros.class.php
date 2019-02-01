<?php
class Carros
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function getCarros()
    {
        $array = array();

        $stmt = $this->conn->query("SELECT * FROM carros");
        if ($stmt->rowCount() > 0) {
            $array = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        return $array;
    }

}