<?php
session_start();
    require __DIR__."/../models/Usuario.php";
    require __DIR__."/../view/head.php";   
    function nupe(){
        $users = new Usuario();
        $listaUsuarios = $users->todos();

        require __DIR__."/../view/Nupe.php";
    }
    function portaria(){
        $user = new Usuario();
        $listaVisitantes = $user->todosVisitantes();
        

        require __DIR__."/../view/portaria.php";
    } 
    function desativaTodos(){
        $user = new Usuario();
        $usuario = $user->DesativaTodos();

        logado();
    }                     
    function prof (){
        $user = new Usuario();
        $listaProf = $user->todosProfessores();
        
        require __DIR__."/../view/listaProf.php";
    }
    function prof2 (){
        $user = new Usuario();
        $listaProf = $user->todosProfessores();
        
        require __DIR__."/../view/listaprofguarita.php";
    }


    function disc(){

         $user = new Usuario();
         $listaocorrencia = $user->OcorrenciaDisc($_GET['matricula']);
        
        require __DIR__."/../view/discente.php";

    }
    function home(){
        header('Location:../index.php');

    }
    function cadastrar(){
        require __DIR__."/../view/cadUser.php";
    }
    function ListaDisc(){
        $user = new Usuario();
        $listaDisc = $user->DiscAtivos();
        require __DIR__."/../view/ListaDisc.php";
    }
    function excluirProf(){
       $userProf = new Usuario();
        $userProf->deleteProf($_GET['cod_user']);
         nupe();
    
    }

    
    function ListaDiscTurma(){
        $user = new Usuario();
        $listaDisc = $user->DiscTurma($_GET['cod_turma']);
        require __DIR__."/../view/ListaDiscTurma.php";
    }
    function ListaTurmas(){
        $Turma = new Usuario();
        $listaTurmas = $Turma->Turmas();
        

        require __DIR__."/../view/ListaTurmas.php";   
    }
    function salvar(){
      //  $cod_user = $_POST['cod_user'];
        
        $nome  = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
        $email = $_POST['email'];
        $codTipuser = $_POST['codTipuser'];
        $cpf = $_POST['cpf'];
        $user = new Usuario();

      
        $user->salvar($email,$nome,$codTipuser,0,$cpf);

        logado();
    }
    function pegarTurma(){
        $Turma = new Usuario();  
        $dados_turma = $Turma->getTurma($_GET['cod_turma']);
        print_r($dados_turma);
        require_once("/../view/ListaDiscTurma.php");
    }
    function professor(){
        require __DIR__."/../view/professor.php";
    }
    
    
    function editar(){
        $user = new Usuario();  
        $dados_user = $user->getUserById($_GET['cod_user']);
        require __DIR__."/../view/usuario_editar.php";

    }
    function status (){

        $user = new Usuario();  
        $dados_user = $user->Status($_GET['cod_user'],$_GET['status']);
        //print ($dados_user);
        logado();
    }
    function status2 (){

        $user = new Usuario();  
        $dados_user = $user->Status($_GET['cod_user'],$_GET['status']);
        //print ($dados_user);
        ListaDisc();
    }
    function statusSaida (){

        $user = new Usuario();  
        $dados_user = $user->Status($_GET['cod_user'],$_GET['status']);
        //print ($dados_user);
        header("Location:?acao=ListaDisc");
    }
    
    function atualizar(){
        $cod_user = $_POST['cod_user'];
        $nome  = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
        $email = $_POST['email'];
        $codTipuser = $_POST['codTipuser'];
        $user = new Usuario();
        $user->update($email,$nome,$cod_user,$codTipuser,0);
        logado();
    }
    function excluir(){
        $user = new Usuario();
        $user->delete($_GET['cod_user']);
        logado();
    }


    function logado(){

        if (isset($_SESSION['usuario'])) {
        
        if ($_SESSION['tipoUser'] == 1) {
                           
            nupe();
        }elseif ($_SESSION['tipoUser'] == 2) {
            $_SESSION['tipoUser'] == 'Portaria';
                            portaria();
                        }elseif ($_SESSION['tipoUser'] == 3) {
                            professor();
                        }elseif ($_SESSION['tipoUser'] == 4) {
                            header('Location:?acao=disc&matricula='.$_SESSION['matricula']);
                        }
        }               
    }
    function login(){
     
            if(isset($_POST['submit'])){
                $codTipuser = $_POST ['codTipuser'];
                $email = $_POST['email'];
                $senha = $_POST['senha'];
                if (empty($email)  || empty($senha)) {
                   
                    echo '<div class="alert alert-danger">Campos vazios </div>';
                }else{
                    $user = new Usuario();

                    if($user->login($email,$senha,$codTipuser)){
                     
                       
                       if ($codTipuser == 1) {
                            nupe();
                        }elseif ($codTipuser == 2) {
                            portaria();
                        }elseif ($codTipuser == 3) {
                            professor();
                        }elseif ($codTipuser == 4) {
                            header('Location:?acao=disc&matricula='.$_SESSION['matricula']);
                        }
                                                
                    }else{
                        
                        
                        header('Location:../view/login.php');
                    }
                }
            } 
    }
    function logout(){
        unset($_SESSION['usuario']);
        home();
    }


    if (isset($_GET['acao']) and function_exists($_GET['acao']) ){
        call_user_func($_GET['acao']);
    }else {
        nupe();
    }

