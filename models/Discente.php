<?php

require __DIR__."/../classes/conexao.php";
class Discente {
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
        return $this->conexao->query("select * from discente")->fetchAll(PDO::FETCH_CLASS, 'Discente');
    }

    public function getDiscById(int $cod_user){
        $disc = $this->conexao->query("select * from discente where cod_user = {$cod_user}")->fetch(PDO::FETCH_ASSOC);
        return $disc;
    }

    public function update($emailResp,$matricula,$nomeResp,$senha,$cod_user,$caminho){

        if ($caminho == 'vazio') {
            $sql = "update discente set emailResp = '$emailResp',matricula = '$matricula',nomeResp = '$nomeResp', senha = '$senha' WHERE cod_user='$cod_user'";
        }else{
            $sql = "update discente set emailResp = '$emailResp',matricula = '$matricula',nomeResp = '$nomeResp', senha = '$senha',foto = '$caminho' WHERE cod_user='$cod_user'";
        }
        
        $resultado = $this->conexao->exec($sql);
        return $resultado;
    }

    public function delete($cod_user){
        $sql = "delete from discente where cod_user='$cod_user'";
        $this->conexao->exec($sql);
    }

    public function salvarCadDisc($curso,$emailResp,$nomeResp,$cod_user,$senha,$cod_turma,$caminho){
    
        $sql = "insert into discente(curso,emailResp,nomeResp,cod_user,senha,cod_turma,Discstatus,foto) values('$curso','$emailResp','$nomeResp','$cod_user','$senha','$cod_turma',0,'$caminho')";
        print_r($sql);
        $resultado = $this->conexao->exec($sql);
        return $resultado;

    }
}