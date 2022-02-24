<?php
namespace App\Model\Database;
use Nextc\Model\Databasenext\Connect;

class Connection{
    private $connect;
    public function getDb(){
        $this->connect=new Connect();
        //$host,$user,$db,$passw
        $this->connect->initDb("","","","");
        return $this->connect->getDb();
    }
}
?>
