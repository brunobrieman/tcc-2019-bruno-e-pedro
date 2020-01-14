<?php

require __DIR__."/../classes/conexao.php";
class Portaria {
    //ATRIBUTOS DA CLASSE
    public $codigo;
    public $senha;
    public $Siape;
    public $conexao;
    //COMPORTAMENTOS
    public function __construct(){
     
        $conexao_objeto = new Connection();
        //o atributo $this->conexao agora sabe como se
        // comunicar com o banco de dados
        $this->conexao = $conexao_objeto->getConnection();
    }

    public function todos(){
        return $this->conexao->query("select * from portaria")->fetchAll(PDO::FETCH_CLASS, 'Portaria');
    }

    public function getPortById(int $cod_user){
        $port = $this->conexao->query("select * from portaria where cod_user = {$cod_user}")->fetch(PDO::FETCH_ASSOC);
        return $port;
    }
    public function getVisitaById(int $cpf){
        $visita = $this->conexao->query("select * from externo where cpf = {$cpf}")->fetch(PDO::FETCH_ASSOC);
        return $visita;
    }

    public function update($codigo,$cod_user,$senha,$foto){

        if ($foto == 'vazio') {

            $sql = "update portaria set codPortaria='$codigo',senha = '$senha' WHERE cod_user='$cod_user'";  
        }else{
        $sql = "update portaria set codPortaria='$codigo',senha = '$senha',foto = '$foto' WHERE cod_user='$cod_user'";
        }
        //echo($sql);
        $resultado = $this->conexao->exec($sql);
        return $resultado;
    }

    public function delete($cod_user){
        $sql = "delete from prof where cod_user='$cod_user'";
        $this->conexao->exec($sql);
    }
    public function deleteVisita($cpf){

           $sql = "delete from externo where cpf='$cpf'";
        $this->conexao->exec($sql);
        
    }

    public function EditarVisitante($nome,$cpf,$motivo,$email){
        $sql = "update externo set Nome = '$nome',email='$email',motivo='$motivo' where cpf= '$cpf'";
        echo ($sql);
        $resultado = $this->conexao->exec($sql);
        return $resultado;
    }

    public function salvarCadPort($codigo,$cod_user,$senha,$foto){
    
        $sql = "insert into portaria(codPortaria,cod_user,senha,foto) values('$codigo','$cod_user','$senha','$foto')";
        print_r($sql);
    
        $resultado = $this->conexao->exec($sql);
        return $resultado;

    }
    
    public function salvarCadVisitante ($nome,$email,$cpf,$motivo){
    
        $sql = "insert into externo(Nome,email,cpf,motivo) values('$nome','$email','$cpf','$motivo')";
        print($sql);    
        $resultado = $this->conexao->exec($sql);
        return $resultado;

    }
}