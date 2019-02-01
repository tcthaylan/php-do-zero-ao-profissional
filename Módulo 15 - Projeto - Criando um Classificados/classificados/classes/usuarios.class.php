<?php
class Usuarios
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;        
    }

    public function getUsuario($id_usuario)
    {
        $array = array();
        $stmt = $this->conn->prepare("SELECT * FROM usuarios WHERE id_usuario = :id_usuario");
        $stmt->bindValue(":id_usuario", $id_usuario);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $array = $stmt->fetch();
        }
        return $array;
    }

    public function getTotalUsuarios()
    {
        
        $stmt = $this->conn->query("SELECT COUNT(*) AS c FROM usuarios");
        $row = $stmt->fetch();
        return $row['c'];
    }

    public function cadastrar($nome, $email, $senha, $telefone)
    {   
        $stmt = $this->conn->prepare("SELECT * FROM usuarios WHERE email = :email");
        $stmt->bindvalue(":email", $email);
        $stmt->execute();
        if ($stmt->rowCount() == 0) {
            $stmt = $this->conn->prepare("INSERT INTO usuarios (nome, email, senha, telefone) VALUES (:nome, :email, :senha, :telefone)");
            $stmt->bindValue(":nome", $nome);
            $stmt->bindValue(":email", $email);
            $stmt->bindValue(":senha", md5($senha));
            $stmt->bindValue(":telefone", $telefone);
            $stmt->execute();

            return true;
        } else {
            return false;
        }
    }

    public function login($email, $senha)
    {
        $stmt = $this->conn->prepare("SELECT * FROM usuarios WHERE email = :email AND senha = :senha");
        $stmt->bindValue(":email", $email);
        $stmt->bindValue(":senha", md5($senha));
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $info = $stmt->fetch();
            $_SESSION["id"] = $info["id_usuario"];
            return true;
        } else {
            return false;
        }
    }
}