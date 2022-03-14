<?php

namespace App\Model;

use Nextc\Model\Conteiner;

class UserModel extends Conteiner
{

    public function __get($atributos)
    {
        return $this->$atributos;
    }
    public function __set($atributos, $value)
    {
        $this->$atributos = $value;
    }

    public function user(){
        $query = "SELECT nextc_name , free_name FROM nextc_user WHERE nextc_name=:nextc_name";
        $stm = $this->db->prepare($query);
        $stm->bindValue(':nextc_name', $this->__get('nextc_name'));
        $stm->execute();
        return $stm->fetch(\PDO::FETCH_ASSOC);
    }


}
