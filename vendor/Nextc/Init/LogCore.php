<?php
namespace Nextc\Init;
use App\Views\Erro\IndexErro;
use Exception;

abstract class LogCore extends IndexErro {

    public static function run(array $route){
        try{

        $logRoute=false;
        $logController=false;
        $controller="";
        $action="";
        $urloriginal=self::getUrl();
        $urlsecudario=explode("/",$urloriginal);

        //Perguntando se Contem o Route
           foreach ($route as  $key) {
            if($key['route']=='/'.$urlsecudario[count($urlsecudario)-1]){
                $logRoute=true;
                $action=$key['action'];
                $controller=$key['controller'];
                if(file_exists("../App/Controller/".$controller.".php"))
                    $logController=true;
                 $controller=$key['controller'];
            }
            if($logController&&$logRoute)
               break;
           }
           //Controlando a existencia route
          if($logRoute&&$logController){
                $class='App\\Controller\\'.$controller;
                $render=new $class;
                $render->$action();

          }else{
              if(!$logController){
                self::notController();
              }
              if(!$logRoute)
              self::notRoute();
          };


        }catch(\Exception $e){

        }

       }
    //Url de inicio
       public static function getUrl(){
           try{

        return parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);
           }catch(Exception $e){
                return "/index";
           }

       }
}

?>
