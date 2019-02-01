<?php
class Usuarios
{   
    private $conn;
    private $id;
    private $email;
    private $senha;
    private $permissoes;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function login($email, $senha) 
    {
        $stmt = $this->conn->prepare("SELECT * FROM usuarios WHERE email = :email AND senha = :senha");
        $stmt->bindValue(":email", $email);
        $stmt->bindValue(":senha", $senha);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $info = $stmt->fetch();
            $_SESSION["id"] = $info["id"];
            return true;
        } 

        return false;
    }

    public function setUser($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM usuarios WHERE id = :id");
        $stmt->bindValue(":id", $id);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $info = $stmt->fetch();

            $this->id           = $info["id"];
            $this->email        = $info["email"];
            $this->senha        = $info["senha"];
            $this->permissoes   = explode(",", $info["permissoes"]);
        } 
    }

    public function temPermissao($p)
    {
        if (in_array($p, $this->permissoes)) {
            return true;
        } else {
            return false;
        }
    }
}