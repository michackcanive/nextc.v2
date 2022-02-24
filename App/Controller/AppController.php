<?php
/**
 *  nextc mini sitema
 */
namespace App\Controller;

use Nextc\Controller\Action;

session_start();
class AppController extends Action
{
    private $connect_tw;
    private $connect_us;
    private $connect_acesso;

    public function inicio()
    {
        $this->validadorDesession();

        $this->render("inicio", "layout");
    }
}
