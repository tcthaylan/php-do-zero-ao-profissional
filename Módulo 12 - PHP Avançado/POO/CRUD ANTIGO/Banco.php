<?php
class Banco
{   
    private $conn;
    private $numRows;
    private $array;

    public function __construct($dbname, $host, $dbuser, $dbpass)
    {
        try {
            $this->conn = new PDO("mysql:dbname=".$dbname.";host=".$host, $dbuser, $dbpass);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Erro: ".$e->getMessage();
            exit;
        }
    }

    public function query($rawQuery)
    {
         $stmt = $this->conn->query($rawQuery);
         $this->numRows = $stmt->rowCount();
         $this->array = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getResult()
    {
        return $this->array;
    }

    public function getNumRows()
    {
        return $this->numRows;
    }

    public function insert($table, $params)
    {   
        if (!empty($table) && (is_array($params) && count($params) > 0)) {
            $sql = "INSERT INTO ".$table." SET data_criado = NOW(), ";
            $dados = array();
            foreach ($params as $key => $value) {
                $dados[] = $key." = '".addslashes($value)."'";
            }
            echo $sql .= implode(", ", $dados);
            $this->conn->query($sql);
        }
    }

    public function update($table, $data, $where = array(), $where_cond = "AND")
    {
        if (!empty($table) && (is_array($data) && count($data) > 0) && is_array($where)) {
            $sql = "UPDATE ".$table." SET ";
            $dados = array();
            foreach ($data as $key => $value) {
                $dados[] = $key." = '".addslashes($value)."'";
            }
            $sql .= implode(", ", $dados);

            if (count($where) > 0) {
                $dados = array();
                foreach ($where as $key => $value) {
                    $dados[] = $key." = '".addslashes($value)."'";
                }
                $sql .= " WHERE ".implode(" ".$where_cond." ", $dados);
            }

            $this->conn->query($sql);
        }
    }

    public function delete($table, $where = array(), $where_cond = "AND")
    {
        if (!empty($table) && is_array($where)) {
            $sql = "DELETE FROM ".$table. " WHERE ";
            if (count($where) > 0) {
                $dados = array();
                foreach ($where as $key => $value) {
                    $dados[] = $key." = '".addslashes($value)."'";
                }
                $sql .= implode(" ".$where_cond." ", $dados);
            }
            
            $this->conn->query($sql);
        }
    }
}