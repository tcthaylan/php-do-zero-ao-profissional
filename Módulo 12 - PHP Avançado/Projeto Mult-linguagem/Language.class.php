<?php
class Language 
{
    private $l;
    private $ini;
    private $bd;

    public function __construct()
    {
        $this->l = "pt-br";

        if (!empty($_SESSION["lang"]) && file_exists("lang".DIRECTORY_SEPARATOR.$_SESSION["lang"].".ini")) {
            $this->l = $_SESSION["lang"];
        }

        $this->ini = parse_ini_file("lang".DIRECTORY_SEPARATOR.$_SESSION["lang"].".ini");

        global $conn;
        $stmt = $conn->prepare("SELECT * FROM lang WHERE lang = ?");
        $stmt->execute(array($this->l));
        if ($stmt->rowCount() > 0) {
            foreach ($stmt->fetchAll() as $item) {
                $this->bd[$item['nome']] = $item["valor"];
            }
        }
    }

    public function getLinguagem()
    {
        return $this->l;
    }

    public function get($word, $return = false)
    {
        $text = $word;

        if (isset($this->ini[$word])) {
            $text = $this->ini[$word];
        } elseif (isset($this->bd[$word])) {
            $text = $this->bd[$word];
        }

        if ($return) {
            return $text;
        } else {
            echo $text;
        }
    }

    public function getIni()
    {
        return $this->ini;
    }

    public function getBd()
    {
        return $this->bd;
    }
}