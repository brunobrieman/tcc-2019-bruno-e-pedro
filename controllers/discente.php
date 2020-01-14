<?php

require __DIR__."/../models/Discente.php";
   require __DIR__."/../view/head.php";  


    function discCadastrado(){

         print('<center><h3 style="margin-top: 20%;"> Discente cadastrado com sucesso</h3>
            <a href="../view/login.php">
        <button class="btn-primary btn">Entrar</button>
        </a>
        </center>');
        
        header("Refresh: 5; url = ../index.php");

    }  

    function cadastrarDisc(){
    	require __DIR__."/../view/Cadastrodisc.php";
    }

	function salvarCadDisc(){
	    //$matricula = $_POST['codMat'];
        $cod_turma = $_POST['turma'];
	    $senha = $_POST['senha'];
	    $cod_user = $_POST['cod_user'];
        $curso = $_POST['curso'];
        $emailResp = $_POST['resp'];
        $nomeResp = $_POST['respnome'];
        $foto = $_FILES['foto'];
        $quebra = explode(".", $foto['name']);
        $nome = time().'.'.$quebra[1];

        move_uploaded_file($foto['tmp_name'], '../fotos/'.$nome);
        $caminho = '../fotos/'.$nome;
        
        $userDisc = new Discente();
	    $userDisc->salvarCadDisc($curso,$emailResp,$nomeResp,$cod_user,$senha,$cod_turma,$caminho);
        discCadastrado();
	    
	}

	function editarDisc(){
        $user = new Discente();  
        $dados_user = $user->getDiscById($_GET['cod_user']);
        require __DIR__."/../view/DiscEditar.php";

    }
    function atualizar(){
        
        
        $senha = $_POST['senha'];
        $cod_user = $_POST['cod_user'];
        $emailResp = $_POST['resp'];
        $matricula = $_POST['matricula'];
        $nomeResp = $_POST['respnome'];
        $user = new Discente();
        if(($_FILES['foto']['size'] != 0)){
            

        $foto = $_FILES['foto'];
        $quebra = explode(".", $foto['name']);
        $nome = time().'.'.$quebra[1];

        move_uploaded_file($foto['tmp_name'], '../fotos/'.$nome);
        $caminho = '../fotos/'.$nome;

        $user->update($emailResp,$matricula,$nomeResp,$senha,$cod_user,$caminho);
        }else{
            $user->update($emailResp,$matricula,$nomeResp,$senha,$cod_user,'vazio');
        }
         
        header("Location:usuario.php?acao=logout");

    }
    function excluir(){
        $user = new Discente();
        $user->delete($_GET['cod_user']);
        require __DIR__."/../view/index.php";
    }
    

		 if (isset($_GET['acao']) and function_exists($_GET['acao']) ){
		    call_user_func($_GET['acao']);
		}else {
		    index();
		}