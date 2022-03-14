<?php

namespace Nextc\Controller;

use App\Views\Erro\IndexErro;
use App\Router\Route;

abstract class Action extends IndexErro
{
    protected $view;
    public static $views;
    public $urlcaminho;

    public function __construct()
    {

        $this->view = new \stdClass();
    }


    public function validadorDesession()
    {
        if (!isset($_SESSION['id']) != '' && !isset($_SESSION['name']) != '') {

            header('Location:/?process=erro');
        }
        if (empty($this->pegar_cor) && $_SESSION['id'] == '') {
            $this->sair();
        }
    }
    public function sair()
    {
        $this->destroiSission();
    }
    public function destroiSission()
    {
        session_start();
        session_destroy();
        header('Location:/');
    }
    public function  is_post():bool{
        if(empty($_POST)){
            echo'Ups';
            return true;
        }
        return false;
    }

    protected function render($views1, $layout)
    {

        self::$views = $views1;
        $this->urlcaminho = Route::url_principal();

        if (file_exists("../App/Views/layout/" . $layout . ".phtml")) {
            require_once "../App/Views/layout/" . $layout . ".phtml";
            return;
        }if(file_exists("../App/Views/layout/" . $layout . ".php")){
            require_once "../App/Views/layout/" . $layout . ".php";
            return;
        } else {
            $this->notlayout();
            return;
        };
    }

    protected function content()
    {
        $classActual = get_class($this);
        try {
            $classActual2 = $classActual;

            $classActual = str_replace("App\\Controller\\", "", $classActual);
            $classActual = strtolower(str_replace("Controller", "", $classActual));

            if (self::$views != "") {

                if (self::$views == "/")
                    self::$views = "index";

                if (isset($_SESSION['tipo_de_acesso']) ? $_SESSION['tipo_de_acesso'] : 0) {

                    switch (isset($_SESSION['tipo_de_acesso']) ? $_SESSION['tipo_de_acesso'] : '') {
                        case 'admin':
                            if (file_exists("../App/Views/" . $classActual . "/" . $_SESSION['tipo_de_acesso'] . "/" . self::$views . ".phtml")) {

                                require_once "../App/Views/" . $classActual . "/" . $_SESSION['tipo_de_acesso'] . "/" . self::$views . ".phtml";
                            } else {
                                $this->notRoute();
                            }
                            break;
                        case 'cliente':
                            if (file_exists("../App/Views/App/" . $_SESSION['tipo_de_acesso']. "/" . self::$views . ".phtml")) {
                                require_once "../App/Views/App/" . $_SESSION['tipo_de_acesso']. "/" . self::$views . ".phtml";
                                return;

                            }if(file_exists("../App/Views/App/" . $_SESSION['tipo_de_acesso']. "/" . self::$views . ".php")){
                                require_once "../App/Views/App/" . $_SESSION['tipo_de_acesso']. "/" . self::$views . ".php";
                                return;

                            }else {

                                $this->notRoute();
                                return;
                            }
                            break;
                        case 'comercial':
                            if (file_exists("../App/Views/App/" . $_SESSION['tipo_de_acesso'] . "/" . self::$views . ".phtml")) {
                                require_once "../App/Views/App/" . $_SESSION['tipo_de_acesso'] . "/" . self::$views . ".phtml";
                            } else {

                               $this->notRoute();
                            }
                            break;
                    }
                } else {
                    if (file_exists("../App/Views/" . $classActual . "/" . self::$views . ".phtml")) {
                        require_once "../App/Views/" . $classActual . "/" . self::$views . ".phtml";
                    } else {
                       // $this->notRoute();
                    }
                }
            }
        } catch (\Exception $e) {
            $this->notRoute();
        }
    }
}
