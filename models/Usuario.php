
<?php    
error_reporting(0);
require __DIR__."/../classes/conexao.php";

class Usuario {
    //ATRIBUTOS DA CLASSE
    public $cod_user;
    public $nome;
    public $email;
    public $senha;
    public $tipoUsuario;
    public $conexao;
    //COMPORTAMENTOS
    public function __construct(){
     
        $conexao_objeto = new Connection();
        //o atributo $this->conexao agora sabe como se
        // comunicar com o banco de dados
        $this->conexao = $conexao_objeto->getConnection();
    }
    public function exibe (){

        echo "usuario {$this->nome} foi criado com o tipo {$this->codTipuser} e cod_user {$this->cod_user} \n";
    }
    public function todos(){
        return $this->conexao->query("select * from usuario")->fetchAll(PDO::FETCH_CLASS, 'Usuario');
    }
    public function todosProfessores(){
        return $this->conexao->query("select * from prof,usuario where prof.cod_user = usuario.cod_user and usuario.cod_user = prof.cod_user")->fetchAll(PDO::FETCH_CLASS, 'Usuario');
    }
    public function Turmas(){
        return $this->conexao->query("select * from curso INNER JOIN turma on curso.cod_curso = turma.cod_curso ")->fetchAll(PDO::FETCH_CLASS, 'Usuario');
    }
    
    public function getTurma($cod_turma){
        return $this->conexao->query("select * from turma where cod_turma='$cod_turma'")->fetchAll(PDO::FETCH_CLASS, 'Usuario');
    }
    public function DiscTurma($cod_turma){

        return $this->conexao->query("select * from discente,turma,usuario where discente.cod_turma = {$cod_turma} and turma.cod_turma = {$cod_turma} and discente.cod_user = usuario.cod_user ")->fetchAll(PDO::FETCH_CLASS, 'Usuario');

    }
    public function getUserById(int $cod_user){
        $user = $this->conexao->query("select * from usuario where cod_user = {$cod_user}")->fetch(PDO::FETCH_ASSOC);
        return $user;
    }
    public function salvar($email,$nome,$tipoUsuario,$status,$cpf){
        $sql = "insert into usuario(email,nome,codTipuser,status,cpf) values('$email','$nome','$tipoUsuario','$status','$cpf')";
        $resultado = $this->conexao->exec($sql);    
        
        return $resultado;
    }

    public function update($email,$nome,$cod_user,$codTipuser){
        $sql = "update usuario set email='$email',nome='$nome',codTipuser = '$codTipuser',cod_user = '$cod_user' WHERE cod_user='$cod_user'";
        print($sql);
        $resultado = $this->conexao->exec($sql);
        return $resultado;
    }
    public function delete($cod_user){
        $sql = "delete from usuario where cod_user='$cod_user'";
        $this->conexao->exec($sql);
    }
    
    public function deleteProf($cod_user){
        $sql = "delete from prof where cod_user='$cod_user'";
        $this->conexao->exec($sql);
    }

    public function OcorrenciaDisc($matricula){
        return $this->conexao->query("select motivo,descricao,dth from ocorrencia where matricula = $matricula")->fetchAll(PDO::FETCH_CLASS, 'Usuario');
    }
    
    public function Status($cod_user,$status){


        //print($status);    
        $status['status'] = $status;
        

        if( $status['status'] == 0){
        $sql = "update usuario set status = 1 WHERE cod_user='$cod_user'";
        //echo($sql);
        $resultado = $this->conexao->exec($sql);
        return $resultado;

        }elseif(  $status['status'] == 1) {
        $sql0 = "update usuario set status = 0 WHERE cod_user='$cod_user'";
        //echo ($sql0);
        $resultado0 = $this->conexao->exec($sql0);
        return $resultado0;
        }
    }

    public function DesativaTodos(){


       //  $time['hora'] = $this->conexao->query("select CURTIME()")->fetch(PDO::FETCH_ASSOC);
       // // print_r($time['hora']['CURTIME()']);
       // //  echo "/";
       //   $explode = explode(":",$time['hora']['CURTIME()']);
       //  $hora = 60 * ($explode[0] * 60);
       //  $minutos = 60 * $explode[1];
       //  $soma = $hora + $minutos + $explode[2];
        
        
       //  if ((int)$soma >= 61200) {
            
            $sql ="update usuario,discente set status = 0,DiscStatus = 0 WHERE status = 1 and codTipuser > 1  or DiscStatus = 1";

            $resultado = $this->conexao->exec($sql);
            return $resultado;
        
    }
    public function todosVisitantes(){
        return $this->conexao->query("select * from externo")->fetchAll(PDO::FETCH_CLASS, 'Usuario');
    }

    public function DiscAtivos(){
        return $this->conexao->query("select * from discente,usuario where  discente.cod_user = usuario.cod_user")->fetchAll(PDO::FETCH_CLASS, 'Usuario');
    }


    public function login($email,$senha,$codTipuser){
        
        if ($codTipuser == 1){
            $resultado = $this->conexao->query("select email,senha,nupe.cod_user,nupe.codNupe,foto,cpf,nome,nome from nupe INNER JOIN usuario on nupe.cod_user = usuario.cod_user WHERE email = '$email' and senha = '$senha'")->fetch(PDO::FETCH_ASSOC);
 
            if (empty($resultado)) {
                return false;
            }else{
                session_start();
                        
                        $_SESSION['usuario'] = $email;
                        $_SESSION ['tipoUser'] = $codTipuser;
                        $_SESSION ['cod_user'] = $resultado['cod_user'];
                        $_SESSION ['codNupe'] = $resultado['codNupe'];
                        $_SESSION ['nome'] = $resultado['nome'];
                        $_SESSION ['foto'] = $resultado['foto'];
                        $_SESSION ['cpf'] = $resultado['cpf'];   


            return true;

            }

        }elseif ($codTipuser ==2) {
            
            $resultado2 = $this->conexao->query("select email,senha,portaria.cod_user,portaria.codportaria,nome,cpf,foto from portaria INNER JOIN usuario on portaria.cod_user = usuario.cod_user WHERE email = '$email' and senha = '$senha'")->fetch(PDO::FETCH_ASSOC);
            
            if (empty($resultado2)) {
                return false;
            }else{
                session_start();
                        
                        $_SESSION['usuario'] = $email;
                        $_SESSION ['tipoUser'] = $codTipuser;  
                        $_SESSION['cod_user'] = $resultado2['cod_user'];
                        $_SESSION['codportaria'] = $resultado2['codportaria'];
                        $_SESSION['nome'] = $resultado2['nome'];
                        $_SESSION ['foto'] = $resultado2['foto'];
                         $_SESSION ['cpf'] = $resultado2['cpf'];


            return true;
            }
        
        }elseif ($codTipuser == 3) {
            
            $resultado3 = $this->conexao->query("select * from prof INNER JOIN usuario on prof.cod_user = usuario.cod_user WHERE email = '$email' and senha = '$senha'")->fetch(PDO::FETCH_ASSOC);

            if (empty($resultado3)) {
                return false;
            }else{
                session_start();
                        
                        $_SESSION['usuario'] = $email;
                        $_SESSION ['tipoUser'] = $codTipuser;  
                        $_SESSION ['siape'] = $resultado3['siape'];  
                        $_SESSION ['cod_user'] = $resultado3['cod_user'];
                        $_SESSION ['formacao'] = $resultado3['formacao'];
                        $_SESSION ['nome'] = $resultado3['nome'];
                        $_SESSION ['foto'] = $resultado3['foto'];
                         $_SESSION ['cpf'] = $resultado3['cpf'];
  


            return true;
            }
        }elseif ($codTipuser == 4) {
            
            $resultado4 = $this->conexao->query("select email,senha,matricula,discente.cod_user,nome,foto,cpf from discente INNER JOIN usuario on discente.cod_user = usuario.cod_user WHERE email = '$email' and senha = '$senha'")->fetch(PDO::FETCH_ASSOC);
            
            if (empty($resultado4)) {
                return false;
            }else{
                session_start();
                        
                        $_SESSION['usuario'] = $email;
                        $_SESSION ['tipoUser'] = $codTipuser;
                        $_SESSION ['matricula'] = $resultado4['matricula'];  
                        $_SESSION ['cod_user'] = $resultado4['cod_user'];
                        $_SESSION ['nome'] = $resultado4['nome'];
                        $_SESSION ['foto'] = $resultado4['foto'];
                         $_SESSION ['cpf'] = $resultado4['cpf'];

                                                


            return true;
            }
        }
    }

   
}
 



