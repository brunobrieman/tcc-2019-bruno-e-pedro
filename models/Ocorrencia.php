<?php
require __DIR__."/../classes/conexao.php";

class Ocorrencia {
    //ATRIBUTOS DA CLASSE
    public $Desc;
    public $Just;
    public $codTipocorrencia;
    public $codigo;
    public $dth;
    public $codNupe;
    public $matricula;
    public $user;
    public $codOcorrencia;
    //COMPORTAMENTOS
    public function __construct(){
     
        $conexao_objeto = new Connection();
        //o atributo $this->conexao agora sabe como se
        // comunicar com o banco de dados
        $this->conexao = $conexao_objeto->getConnection();
    }

    

    public function salvar($Desc,$Just,$codTipocorrencia,$dth,$matricula,$siape,$aprovacaoprof){
        $sql = "insert into ocorrencia(descricao,motivo,codTipocorrencia,dth,matricula,siape,aprovacaoprof) values('$Desc','$Just','$codTipocorrencia','$dth','$matricula','$siape','$aprovacaoprof')";
        
        $resultado = $this->conexao->exec($sql);
        return $resultado;
    }
    public function update($Desc,$Just,$codTipocorrencia,$dth,$matricula,$codOcorrencia){
        $sql = "update ocorrencia set descricao='$Desc',motivo='$Just',codTipocorrencia='$codTipocorrencia',dth='$dth',matricula='$matricula' WHERE codOcorrencia='$codOcorrencia'";
        echo $sql;
        $resultado = $this->conexao->exec($sql);
        return $resultado;

    }
    public function getOcorrenciaById(int $codOcorrencia){
        $user = $this->conexao->query("select * from ocorrencia where codOcorrencia = {$codOcorrencia}")->fetch(PDO::FETCH_ASSOC);
        return $user;

    }
    public function getTurmaById(int $cod_turma){
        $turma = $this->conexao->query("select * from turma where cod_turma = {$cod_turma}")->fetch(PDO::FETCH_ASSOC);
        return $turma;
    }
    public function salvarTurma($desc_turma,$ano,$cod_curso){
        $sql = "insert into turma(desc_turma,ano,cod_curso) values('$desc_turma','$ano','$cod_curso')";
        $resultado = $this->conexao->exec($sql);
        return $resultado;
    }

    public function updateTurma($desc_turma,$cod_turma,$ano,$cod_curso){
        $sql = "update turma set desc_turma='$desc_turma',ano='$ano',cod_curso='$cod_curso' WHERE cod_turma='$cod_turma'";
        echo $sql;
        $resultado = $this->conexao->exec($sql);
        return $resultado;

    }
    public function deleteTurma($cod_turma){
        $sql = "delete from turma where cod_turma='$cod_turma'";
        
        $this->conexao->exec($sql);
    }


    public function ProfDiscOcorre($siape){
        return $this->conexao->query("select codOcorrencia,motivo, descricao, discente.matricula,discente.DiscStatus, dth,discente.cod_turma,turma.desc_turma,prof.siape,nome,emailResp,nomeResp,curso,discente.foto,ocorrencia.aprovacaoprof from ocorrencia,discente,prof,turma,usuario where prof.siape = ocorrencia.siape and discente.cod_user = usuario.cod_user and ocorrencia.matricula = discente.matricula and prof.siape = {$siape} and discente.cod_turma = turma.cod_turma and codTipocorrencia = 1")->fetchAll(PDO::FETCH_CLASS, 'Ocorrencia');

    }
    public function lista(){
        return $this->conexao->query("select * from ocorrencia,discente,usuario where ocorrencia.matricula = discente.matricula and discente.cod_user= usuario.cod_user")->fetchAll(PDO::FETCH_CLASS, 'Ocorrencia');
    }
    public function deleteOcorrencia($codOcorrencia){
        $sql = "delete from ocorrencia where codOcorrencia='$codOcorrencia'";
        
        $this->conexao->exec($sql);
    }
}