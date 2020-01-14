<?php

require __DIR__."/../classes/conexao.php";
class Professor {
    //ATRIBUTOS DA CLASSE
    public $cod_user;
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
        return $this->conexao->query("select * from prof")->fetchAll(PDO::FETCH_CLASS, 'Professor');
    }

    public function getProfById(int $cod_user){
        $prof = $this->conexao->query("select * from prof where cod_user = {$cod_user}")->fetch(PDO::FETCH_ASSOC);
        return $prof;
    }

    public function cadProfTurma($Siape,$codTurma){
        $sql = "insert into profturma(siape,cod_turma) values('$Siape','$codTurma')";
        echo($sql);

        $resultado = $this->conexao->exec($sql);
        return $resultado;
    }

   public function mudaProfTurma($Siape,$cod_turma){
        $sql = "update profturma set siape = '$Siape',cod_turma = '$codTurma' ";

        $resultado = $this->conexao->exec($sql);
        return $resultado;

   }

   public function excluirProfTurma($siape,$cod_turma){

    $sql = "delete from profturma where siape='$siape' and cod_turma = $cod_turma";
        $this->conexao->exec($sql);

   }

   public function ListaProfessorTurma(){
        return $this->conexao->query("select * from profturma,turma where profturma.cod_turma = turma.cod_turma")->fetchAll(PDO::FETCH_CLASS, 'Professor');
   }

    public function ListaProfTurma($siape){
        return $this->conexao->query("select * from profturma,turma,curso where profturma.cod_turma = turma.cod_turma and turma.cod_curso = curso.cod_curso and siape = {$siape} ")->fetchAll(PDO::FETCH_CLASS, 'Professor');

    }

    public function StatusDisc($matricula){

        $sql = "update ocorrencia set aprovacaoprof = 1 WHERE matricula='$matricula'";
        //echo($sql);
        $resultado = $this->conexao->exec($sql);
        return $resultado;

    }

    public function StatusDisc2($matricula){

        
        $sql = "update discente set DiscStatus = 1 WHERE matricula='$matricula'";
        //echo($sql);
        $resultado = $this->conexao->exec($sql);
        return $resultado;

    }

    public function update($Siape,$cod_user,$senha,$formacao,$foto){

        if ($foto == 'vazio') {
            $sql = "update prof set siape='$Siape',senha = '$senha',formacao = '$formacao' WHERE cod_user='$cod_user'";
            
        }else{
         $sql = "update prof set siape='$Siape',senha = '$senha',formacao = '$formacao',foto = '$foto' WHERE cod_user='$cod_user'";
         echo ($sql);
        }
        //echo($sql);
        $resultado = $this->conexao->exec($sql);
        return $resultado;
    }

public function salvarCadProf($Siape,$cod_user,$senha,$formacao,$caminho){
    
        $sql = "insert into prof(siape,cod_user,senha,formacao,foto) values('$Siape','$cod_user','$senha','$formacao','$caminho')";
        print($sql);
    
        $resultado = $this->conexao->exec($sql);
        return $resultado;

    }

public function deleteProf($cod_user){
        $sql = "delete from prof where cod_user='$cod_user'";
        $this->conexao->exec($sql);
    }
}
   