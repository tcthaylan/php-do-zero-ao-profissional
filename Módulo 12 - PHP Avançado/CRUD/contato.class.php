<?php
class Contato
{
    private $conn;

    public function __construct()
    {
        try {
            $dsn    = "mysql:dbname=crudoo;host=localhost;charset=utf8";
            $dbuser = "root";
            $dbpass = "";
            
            $this->conn = new PDO($dsn, $dbuser, $dbpass);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Erro: ".$e->getMessage();
            exit;
        }
    }

    // Adiciona usuário no sistema
    public function adicionar($email, $nome = '')
    {   
        // Verificando se o email existe no sistema
        if ($this->existeEmail($email) == false) {
            $stmt = $this->conn->prepare("INSERT INTO contatos (nome, email) VALUES (:nome, :email)");
            $stmt->bindValue(":nome", $nome);
            $stmt->bindValue(":email", $email);
            $stmt->execute();   
        } else {
            return false;
        }
    }

    public function getInfo($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM contatos WHERE id = :id");
        $stmt->bindValue(":id", $id);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $info = $stmt->fetch();
            return $info;
        } else {
            return array();
        }
    }

    // Retorna o nome do usuário
    public function getNome($email)
    {
        $stmt = $this->conn->prepare("SELECT nome FROM contatos WHERE email = :email");
        $stmt->bindValue(":email", $email);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $info = $stmt->fetch();
            return $info["nome"];
        } else {
            return '';
        }
    }

    // Retorna todos os usuários do sistema
    public function getAll()
    {
        $stmt = $this->conn->query("SELECT * FROM contatos");
        if ($stmt->rowCount() > 0) {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return array();
        }
    }

    // Edita o usuário
    public function editar($id, $nome, $email)
    {   
        if ($this->existeEmail($email) == false) {
            $stmt = $this->conn->prepare("UPDATE contatos SET nome = :nome, email = :email WHERE id = :id");
            $stmt->bindValue(":id", $id);
            $stmt->bindValue(":nome", $nome);
            $stmt->bindValue(":email", $email);
            $stmt->execute();
            return true;
        } else {
            return false;
        }
    }

    // Exclui usuário
    public function excluir($id)
    {
        $stmt = $this->conn->prepare("DELETE FROM contatos WHERE id = :id");
        $stmt->bindValue(":id", $id);
        $stmt->execute();
    }

    // Verifica se o email existe no sistema
    private function existeEmail($email)
    {
        $stmt = $this->conn->prepare("SELECT * FROM contatos WHERE email = :email");
        $stmt->bindValue(":email", $email);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
}