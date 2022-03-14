<?php

namespace App\Controller\Comercial;

use Nextc\Controller\Action;
use Nextc\Model\Conteiner;

session_start();
class UserList extends Action
{
    private $UserModel;

    public function __construct()
    {
        $this->UserModel = Conteiner::getModel("UserModel");
    }

    public function relatorios_clientes(){
        if($this->is_post()){
            return;
        }
        $this->userList=$this->UserModel->userList();
        $this->render("userList", "layout");
    }

}
