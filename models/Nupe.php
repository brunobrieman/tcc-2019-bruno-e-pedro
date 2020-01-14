<?php

require __DIR__."/../classes/conexao.php";
class Nupe {
    //ATRIBUTOS DA CLASSE
    public $cod_user;
    public $nome;
    public $email;
    public $senha;
    public $codNupe;
    public $tipoUsuario;
    public $conexao;
    //COMPORTAMENTOS
    public function __construct(){
     
        $conexao_objeto = new Connection();
        //o atributo $this->conexao agora sabe como se
        // comunicar com o banco de dados
        $this->conexao = $conexao_objeto->getConnection();
    }

    public function todos(){
        return $this->conexao->query("select * from nupe")->fetchAll(PDO::FETCH_CLASS, 'Nupe');
    }

    public function getNupeById(int $cod_user){
        $nupe = $this->conexao->query("select * from nupe where cod_user = {$cod_user}")->fetch(PDO::FETCH_ASSOC);
        return $nupe;
    }

    public function update($codNupe,$cod_user,$senha,$foto){


        if($foto =='vazio'){

        $sql = "update nupe set codNupe='$codNupe',senha = '$senha' WHERE cod_user='$cod_user'";
        
        }else{

        $sql = "update nupe set codNupe='$codNupe',senha = '$senha', foto = '$foto' WHERE cod_user='$cod_user'";

        }

        $resultado = $this->conexao->exec($sql);
        return $resultado;
    }

    public function delete($cod_user){
        $sql = "delete from nupe where cod_user='$cod_user'";
        $this->conexao->exec($sql);
    }

    public function salvarCadNupe($codNupe,$cod_user,$senha,$caminho){
    
        $sql = "insert into nupe(codNupe,cod_user,senha,foto) values('$codNupe','$cod_user','$senha','$caminho')";
    
        $resultado = $this->conexao->exec($sql);
        return $resultado;

    }
}