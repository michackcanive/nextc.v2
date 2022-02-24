<?php
namespace App\Router;
use Nextc\Init\LogCore;

class Route extends LogCore{
    private static $routeEnvia;
    private static $controllerAction;

    /**
     * Iniciar a analise das routas
     */
     public static function setRoute($routeEnvia,$controllerAction){
    self::$routeEnvia=$routeEnvia;
    self::$controllerAction=$controllerAction;
    self::initRoute();
}

 public  static function initRoute(){
        //Home
        try{
  $route1=explode("/",self::$routeEnvia);
          $control=explode("-",self::$controllerAction);
               //echo $route1[];
                foreach($route1 as $key){
                    $route[$key]=array(
                        'route'=>'/'.$key,
                        'controller'=>$control[0],
                        'action'=>$control[1]
                    );
            }
    self::run($route);

        }catch(\Exception $e){

        }

    }

    public  static function url_principal(){

        try{
          $r=self::getUrl();
        $url="";
        $t= explode('/',$r);
        $cont=count($t);
        for($i=2;$i<$cont;$i++){
        $url=$url."../";
        }
        //Home
           return $url;
        }catch(\Exception $e){

        }



    }
}


?>
