<?php

namespace App\Model;

use Nextc\Model\Conteiner;
use App\Controller\Support\Sms;
use App\Controller\Support\Help;
use App\Controller\Support\Pagina;
use Exception;
use DateTime;
use PDOException;

class Usuario extends Conteiner
{
    private $id;
    private $tipo_de_conta;
}
