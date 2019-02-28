<?php 
class Modulos extends Model
{
    public function getModulos()
    {
        $sql = 'SELECT * FROM modulos';
        $sql = $this->db->query($sql);

        $array = array();
        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll(PDO::FETCH_ASSOC);
        }
        return $array;
    }
}