<?php

namespace App\Controller;
use Nextc\Controller\Action;

class AppController extends Action
{
    public function index(){
        $this->render("index", "layout_site");
    }
}
