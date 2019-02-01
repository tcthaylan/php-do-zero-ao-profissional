<?php
class Contato
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function getContatos()
    {
        $array = array();
        $stmt = $this->conn->query('SELECT * FROM contatos');
        if ($stmt->rowCount() > 0) {
            $array = $stmt->fetchAll();
        }
        return $array;
    }

    public function addContato($nome, $email)
    {
        $stmt = $this->conn->prepare('SELECT * FROM contatos WHERE email = :email');
        $stmt->bindValue(':email', $email);
        $stmt->execute();
        if ($stmt->rowCount() == 0) {
            $stmt = $this->conn->prepare('INSERT INTO contatos VALUES (DEFAULT, :nome, :email)');
            $stmt->bindValue(':nome', $nome);
            $stmt->bindValue(':email', $email);
            $stmt->execute();
            return true;
        } else {
            return false;
        }
    }
}