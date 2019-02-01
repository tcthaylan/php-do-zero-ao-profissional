<?php
class Usuarios
{
    private $conn;
    private $id;
    private $email;
    private $senha;
    private $ip;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function getId()
    {
        return $this->id;
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
        } else {
            return false;
        }
    }

    public function setIp($id)
    {
        $this->ip = $_SERVER["REMOTE_ADDR"];
        $stmt = $this->conn->prepare("UPDATE usuarios SET ip = :ip WHERE id = :id");
        $stmt->bindValue(":ip", $this->ip);
        $stmt->bindValue(":id", $id); 
        $stmt->execute();
    }

    public function verificarIp($id, $ip)
    {
        $stmt = $this->conn->prepare("SELECT * FROM usuarios WHERE id = :id AND ip = :ip");
        $stmt->bindValue(":id", $id);
        $stmt->bindValue(":ip", $ip);
        $stmt->execute();

        if ($stmt->rowCount() == 0) {
            return true;
        } else {
            return false;
        }
    }
}