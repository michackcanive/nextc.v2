<?php

namespace NEXTC\Model;
use App\Model\Database\Connection;

class Conteiner  {
private $connect;
protected $db;


 public function __construct()
 {
    try{
          $this->connect=new Connection();
          $this->db=$this->connect->getDb();
    }catch(\PDOException $e){

    }

 }

////////////////////getAll
          public static  function getModel($tipContrl,$nameTb=''){
            try{
            $class='App\\Model\\'. ucfirst($tipContrl);
               $class1=new $class;
                return  $class1;
            }catch(\Exception $e){

            }

          }
}
?>
