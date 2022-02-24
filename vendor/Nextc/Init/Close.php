<?php
namespace Nextc\Init;

use Exception;
use Nextc\Init\LogCore;

class Close extends LogCore{
public static function control():string{
  try{

    $url=self::getUrl();
                  //Permição de abertura;
  }catch(Exception $e){
    $url="/index";
    return '/';
    }

    return $url??'/';
  }

}
?>
