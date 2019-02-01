<?php 
class Documentos
{
    private $conn;
    private $id;
    private $titulo;
    
    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function getDocumentos()
    {
        $array = array();

        $stmt = $this->conn->query("SELECT * FROM documentos");
        if ($stmt->rowCount() > 0) {
            $array = $stmt->fetchAll();
            return $array;
        }
    }

    public function addDocumentos($titulo)
    {
        $stmt = $this->conn->prepare("INSERT INTO documentos (titulo) VALUES (:titulo)");
        $stmt->bindValue(":titulo", $titulo);
        $stmt->execute();
    }
}