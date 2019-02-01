<?php
class Usuario
{
    private $id;
    private $email;
    private $senha;
    private $nome;

    private $conn;

    public function __construct($i = null)
    {   
        try {
            $this->conn = new PDO("mysql:dbname=usuarios;host=localhost", "root", "");
        } catch (PDOException $e) {
            echo "Erro: ".$e->getMessage();
        }
        if (!empty($i)) {
            $stmt = $this->conn->prepare("SELECT * FROM usuarios WHERE id = ?");
            $stmt->execute(array($i));
            if ($stmt->rowCount() > 0) {
                $data = $stmt->fetch(PDO::FETCH_ASSOC);
                $this->id       = $data["id"];
                $this->email    = $data["email"];
                $this->senha    = $data["senha"];
                $this->nome     = $data["nome"];
            }
        } 
    }

    public function getId()
    {
        return $this->id;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($value)
    {
        $this->email = $value;
    }

    public function setSenha($value)
    {
        $this->senha = md5($value);
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($value)
    {
        $this->nome = $value;
    }

    public function salvar()
    {
        if (!empty($this->id)) {
            // Update
            $stmt = $this->conn->prepare("UPDATE usuarios SET email = ?, senha = ?, nome = ? WHERE id = ?");
            $stmt->execute(array(
                $this->email,
                $this->senha,
                $this->nome,
                $this->id
            ));
        } else {
            // Insert
            $stmt = $this->conn->prepare("INSERT INTO usuarios VALUES (DEFAULT, ?, ?, ?)");
            $stmt->execute(array(
                $this->email,
                $this->senha,
                $this->nome
            ));
        }
    }

    public function deletar()
    {
        $stmt = $this->conn->prepare("DELETE FROM usuarios WHERE id = ?");
        $stmt->execute(array($this->id));
    }
}