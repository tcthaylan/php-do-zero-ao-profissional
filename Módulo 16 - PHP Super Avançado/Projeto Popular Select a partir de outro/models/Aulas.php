<?php
class Aulas extends Model
{
    public function getAulasByModulo($id_modulo)
    {
        $sql = 'SELECT * FROM aulas WHERE id_modulo = :id_modulo';
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':id_modulo', $id_modulo);
        $sql->execute();

        $array = array();
        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll(PDO::FETCH_ASSOC);
        }
        return $array;
    }
}