<?php
namespace App\Controller\Support;
use Exception;
use Nextc\Model\Conteiner;

use stdClass;

class Session{

  private $operacao_sms;

  public function __construct()
  {

  }

public function __get($atributos)
{
          return $this->$atributos;
}
public function __set($atributos, $value)
{
          $this->$atributos=$value;
}
  public function csrf(){
    return $_SESSION['csrf_thoken']=base64_encode(random_bytes(20));
  }
  public function csrf_verifica($thoken):bool{
    $sessio=isset($_SESSION['csrf_thoken'])?$_SESSION['csrf_thoken']:'';

    if($thoken!=$sessio){
    return false;
}
    return true;
}


}
