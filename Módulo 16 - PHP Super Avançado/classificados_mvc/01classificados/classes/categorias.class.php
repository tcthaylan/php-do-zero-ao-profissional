<?php
class Categorias
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function getCategorias()
    {
        $array = array();
        $stmt = $this->conn->query("SELECT * FROM categorias");
        if ($stmt->rowCount() >0) {
            $array = $stmt->fetchAll();
        }
        return $array;
    }
}