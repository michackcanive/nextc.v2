<?php
namespace App\Views\Erro;


   abstract class IndexErro  {

    /**
     * not page
     *
     * @return void
     */
         public static  function notRoute(){
             
               require_once ('404.html');
         }
         public static function notController(){


         }
          public static  function notlayout(){

            echo "<br><h3>Erro no layout verifique !</h3><br> ";
         }

      }
?>
