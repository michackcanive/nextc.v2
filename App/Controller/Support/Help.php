<?php
namespace App\Controller\Support;
use Nextc\Model\Conteiner;

class Help{
  private $telefone;
  private $senha;

  public function __get($atributos)
      {return $this->$atributos;}
    public function __set($atributos, $value)
      {$this->$atributos=$value;}

    public function password_verifica($palavra,$passhash){
      return $verifica=password_verify($palavra,$passhash);
    }
    public function password_transforma($palavra){
    return $passhash=password_hash($palavra,PASSWORD_BCRYPT);
  }
    /**
     *Tratando a transformação da Hash
     */
    public function tratando_transformacao_da_hash($dados){

      if(strlen($dados['senha'])==32){
          return 1;
      }
      return 0;
    }

    public function autenticar_hash_ou_md5(){
      $usuario=Conteiner::getModel("Usuario","");
      $usuario->__set('telefone', trim(strip_tags($this->__get('telefone'))));
      $dados=$usuario->getUsunumerosenha();

      if(isset($dados)){

        $tipo_de_senha=$this->tratando_transformacao_da_hash($dados);
        if($tipo_de_senha){
          $usuario->__set('senha', md5(trim(strip_tags($this->__get('senha')))));

        return 1;
        }else{

          $result=array(
            'senha'=>$this->__get('senha'),
            'hash_senha'=>$dados['senha'],
          );
        return $result;
        }

      }
    }

}
