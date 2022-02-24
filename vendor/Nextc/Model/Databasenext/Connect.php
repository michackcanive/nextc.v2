<?php
namespace NEXTC\Model\Databasenext;
use \PDO;
use \PDOException;

class Connect{

    private $instance;

    private $HOST="127.0.0.1";
    private $USER="root";
    private $BDNAME=" nextc";
    private $PASSWD="";


    private $OPTIONS=[
        PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8",
        PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_OBJ,
        PDO::ATTR_CASE=>PDO::CASE_NATURAL
    ];

public function initDb($host,$user,$db,$passw){
        if($host!=""||$user!=""||$db){
            $this->HOST=$host;
            $this->USER=$user;
            $this->BDNAME=$db;
            $this->PASSWD=$passw;
        }
    }

    public function getDb(){
        if (empty($this->instance)){
            try{
                $this->instance=new \PDO("mysql:host=".$this->HOST.";dbname=".$this->BDNAME, $this->USER,
                $this->PASSWD,
                $this->OPTIONS
                );
            }catch (PDOException $exception){
                die("<h3>OOPS ERRO AO CONECTAR COM O SERVIDOR</h3>");
            }
        }
        return $this->instance;
    }
}
