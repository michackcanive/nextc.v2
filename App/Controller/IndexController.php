<?php

namespace App\Controller;

use Nextc\Controller\Action;
use Nextc\Model\Conteiner;
use App\Controller\Support\Session;
use App\Controller\Support\Help;
use App\Model\Usuario;
use Exception;


try {

    session_start();
} catch (Exception $e) {
}


class IndexController extends Action
{
    public $view;
    public $erroDupli;
    private $usuario;
    private $session;
    public $numero;

    public $versao;
    public $presentacao;
    public $referenciaerro;
    public $referenciavalor;


    public function __construct()
    {
        try {

            $this->conteiner = new Conteiner();
            $this->session = new Session();
            $this->usuario = Conteiner::getModel("Usuario", "");
            $this->Site = Conteiner::getModel("Site", "");
            $this->versao = $this->usuario->versao() ?? '';
            $this->pacotes = $this->usuario->consultar_pacotes();
            $this->presentacao = $this->usuario->titulo_apresentacao();
        } catch (\PDOException $e) {
        }
    }
    //Index
    public function index()
    {

        $this->render("index", "layout_site");
    }

    function generateRandomString($size = 4)
    {
        $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuwxyz0123456789";
        $randomString = '';
        for ($i = 0; $i < $size; $i = $i + 1) {
            $randomString .= $chars[mt_rand(0, 60)];
        }
        return $randomString;
    }
    function generatecodigo_confirma($size = 4)
    {

        return rand(1000, 9999);
    }


    public function csrf_input()
    {
        return $this->session->csrf();
    }
}
