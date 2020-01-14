<?php

require __DIR__."/../models/Professor.php";
require __DIR__."/../view/head.php";  

    function profCadastrado(){

        print('<center><h3 style="margin-top: 20%;"> Cadastrado com sucesso</h3>
            <a href="../view/login.php">
        <button class="btn-primary btn">Entrar</button>
        </a>
        </center>');
        header("Refresh: 5; url = ../view/index.php");

    }  

    function cadastrarProf(){
    	require __DIR__."/../view/cadNupe.php";
    }

	function salvarCadProf(){
	    $Siape = $_POST['Siape'];
	    $senha = $_POST['senha'];
	    $cod_user = $_POST['cod_user'];
        $formacao = $_POST['formacao'];
        $foto = $_FILES['foto'];
        $quebra = explode(".", $foto['name']);
        $nome = time().'.'.$quebra[1];

        move_uploaded_file($foto['tmp_name'], '../fotos/'.$nome);
        $caminho = '../fotos/'.$nome;



	    $userProf = new Professor();
	    $userProf->salvarCadProf($Siape,$cod_user,$senha,$formacao,$caminho);
	    profCadastrado();
	}

    function cadProfTurma(){
        $codTurma = $_POST['codTurma'];
        $Siape = $_POST['siape'];
        $cad = new Professor();
        $cad->cadProfTurma($Siape,$codTurma);
        listaProfessorTurma();
    }


    function excluirProfTurma(){
       $userProf = new Professor();
        $userProf->excluirProfTurma($_GET['siape'],$_GET['cod_turma']);
         listaProfessorTurma(); 
    }

    function listaProfessorTurma(){
        $Turma = new Professor();
        $listaTurmas = $Turma->ListaProfessorTurma();
        require __DIR__."/../view/listaProfessorTurma.php";
    }

    function listaProfTurma(){
        $Turma = new Professor();
        $listaTurmas = $Turma->ListaProfTurma($_GET['siape']);
        require __DIR__."/../view/ListaTurmasProf.php";
    }

    function statusDisc (){
        
        $turma = $_GET['cod_turma'];
        print_r($turma);    
        $user = new Professor();  
        $dados_user = $user->StatusDisc2($_GET['matricula'],$_GET['DiscStatus']);
        
        header("Location:usuario.php?acao=ListaDiscTurma&cod_turma=".$turma);
    }


    function statusDiscOcorrencia (){
        $siape = $_GET['siape'];            
        $user = new Professor();  
        $dados_user = $user->StatusDisc($_GET['matricula'],$_GET['aprovacaoprof']);
        
        header("Location:ocorrencia.php?acao=listanotify&siape=".$siape);
    }        

	function editarProf(){
        $user = new Professor();  
        $dados_user = $user->getProfById($_GET['cod_user']);
        require __DIR__."/../view/ProfEditar.php";

    }
    function atualizar(){
        $cod_user = $_POST['cod_user'];
        $senha = $_POST['senha'];
        $Siape = $_POST['Siape'];
        $formacao = $_POST['formacao'];
        $userProf = new Professor();
        if(($_FILES['foto']['size'] != 0)){
            

            $foto = $_FILES['foto'];
            $quebra = explode(".", $foto['name']);
            $nome = time().'.'.$quebra[1];

            move_uploaded_file($foto['tmp_name'], '../fotos/'.$nome);
            $caminho = '../fotos/'.$nome;
            $userProf->update($Siape,$cod_user,$senha,$formacao,$caminho);

        }else{
            $userProf->update($Siape,$cod_user,$senha,$formacao,'vazio');
        }
        
        header("Location:usuario.php?acao=logout");
    }
    function excluirProf(){
       $userProf = new Professor();
        $userProf->deleteProf($_GET['cod_user']);
         header("location:usuario.php?acao=logout");    
    }
    

		 if (isset($_GET['acao']) and function_exists($_GET['acao']) ){
		    call_user_func($_GET['acao']);
		}