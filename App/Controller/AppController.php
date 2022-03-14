<?php

namespace App\Controller;
use Nextc\Controller\Action;
use Nextc\Model\Conteiner;

class AppController extends Action
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = Conteiner::getModel("UserModel");
    }
    public function user(){
        $this->users=$this->userModel->user();
        $this->render("user", "layout");
    }
}
