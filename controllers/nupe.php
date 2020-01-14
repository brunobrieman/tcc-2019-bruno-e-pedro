<?php

require __DIR__."/../models/Nupe.php";
   require __DIR__."/../view/head.php";  

 

    function nupeCadastrado(){

        print('<center><h3 style="margin-top: 20%;"> Cadastrado com sucesso</h3>
            <a href="../view/login.php">
        <button class="btn-primary btn" name="encerrarSession">Entrar</button>
        </a></center>');
        header("Refresh: 5; url = ../view/index.php");

    }  

    function cadastrarNupe(){
    	require __DIR__."/../view/cadNupe.php";
    }

	function salvarCadNupe(){
	    $codNupe = $_POST['codNupe'];
	    $senha = $_POST['senha'];
	    $cod_user = $_POST['cod_user'];

        $foto = $_FILES['foto'];
        $quebra = explode(".", $foto['name']);
        $nome = time().'.'.$quebra[1];

        move_uploaded_file($foto['tmp_name'], '../fotos/'.$nome);
        $caminho = '../fotos/'.$nome;

	    $userNup = new Nupe();
	    $userNup->salvarCadNupe($codNupe,$cod_user,$senha,$caminho);
	    nupeCadastrado();
	}

	function editarNupe(){
        $user = new Nupe();  
        $dados_user = $user->getNupeById($_GET['cod_user']);
        require __DIR__."/../view/EditarNupe.php";

    }
    function atualizar(){
        $codNupe = $_POST['codNupe'];
        $senha = $_POST['senha'];
        $cod_user = $_POST['cod_user'];
        $userNup = new Nupe();

        if(($_FILES['foto']['size'] != 0)){
            

        $foto = $_FILES['foto'];
        $quebra = explode(".", $foto['name']);
        $nome = time().'.'.$quebra[1];

        move_uploaded_file($foto['tmp_name'], '../fotos/'.$nome);
        $caminho = '../fotos/'.$nome;

       $userNup->update($codNupe,$cod_user,$senha,$caminho);


        }else{

       $userNup->update($codNupe,$cod_user,$senha,'vazio');
        }

       
        header("location:usuario.php?acao=logout");
    }
    function excluir(){
       $user = new Nupe();
        $user->delete($_GET['cod_user']);
    
    }
    

		 if (isset($_GET['acao']) and function_exists($_GET['acao']) ){
		    call_user_func($_GET['acao']);
		}else {
		    index();
		}