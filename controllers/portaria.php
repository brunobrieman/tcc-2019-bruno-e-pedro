<?php

    require __DIR__."/../models/Portaria.php";

   require __DIR__."/../view/head.php";  

    function portCadastrado(){

        print('<center><h3 style="margin-top: 20%;"> Cadastrado com sucesso</h3>
            <a href="../view/login.php">
        <button class="btn-primary btn">Entrar</button>
        </a>
        </center>');
        header("Refresh: 5; url = ../view/index.php");

    }  

    function cadastrarPort(){
    	require __DIR__."/../view/cadPort.php";
    }

    function cadastrarVisita(){
        require __DIR__."/../view/cadVisita.php";
    }

	function salvarCadPort(){
	    $codigo = $_POST['codPortaria'];
	    $senha = $_POST['senha'];
	    $cod_user = $_POST['cod_user'];
        $foto = $_FILES['foto'];
        $quebra = explode(".", $foto['name']);
        $nome = time().'.'.$quebra[1];

        move_uploaded_file($foto['tmp_name'], '../fotos/'.$nome);
        $caminho = '../fotos/'.$nome;

	    $userPort = new Portaria();
	    $userPort->salvarCadPort($codigo,$cod_user,$senha,$caminho);
	    portCadastrado();
    }

    function updateVisita(){
        $visita = new Portaria();  
        $dados_visit = $visita->getVisitaById($_GET['cpf']);
        require __DIR__."/../view/visita_editar.php";

    }
    function salvarCadVisitante(){
        $nome = $_POST['nome'];
        $cpf = $_POST['cpf'];;
        $motivo = $_POST['mot_ext'];
        $email = $_POST['email'];
       

        $uservisit = new Portaria();
        $uservisit->salvarCadVisitante($nome,$email,$cpf,$motivo);
        
        header("Location:usuario.php?acao=logado");
	    
    }

    function editarVisita(){

        $nome = $_POST['nome'];
        $cpf = $_POST['cpf'];
        $motivo = $_POST['mot_ext'];
        $email = $_POST['email'];
        $uservisit = new Portaria();
        $uservisit->EditarVisitante($nome,$cpf,$motivo,$email);
        header("Location:usuario.php?acao=logado");
    }

	function editarPort(){
        $user = new Portaria();  
        $dados_user = $user->getPortById($_GET['cod_user']);
        require __DIR__."/../view/PortEditar.php";

    }
    function atualizar(){
        $cod_user = $_POST['cod_user'];
        $senha = $_POST['senha'];
        $codigo = $_POST['codPortaria'];
        $userPort = new Portaria();
        if(($_FILES['foto']['size'] != 0)){
            

        $foto = $_FILES['foto'];
        $quebra = explode(".", $foto['name']);
        $nome = time().'.'.$quebra[1];

        move_uploaded_file($foto['tmp_name'], '../fotos/'.$nome);
        $caminho = '../fotos/'.$nome;
        $userPort->update($codigo,$cod_user,$senha,$caminho);
        }else{
           $userPort->update($codigo,$cod_user,$senha,'vazio');  
        }

        header("Location:usuario.php?acao=logout");
    }
    
    function excluir(){
       $userPort = new Portaria();
        $userPort->delete($_GET['cod_user']);


    
    }

    function deleteVisita(){
        $userPort = new Portaria();
        $userPort->deleteVisita($_GET['cpf']);
         header('Location:usuario.php?acao=logado');
    }
    

		 if (isset($_GET['acao']) and function_exists($_GET['acao']) ){
		    call_user_func($_GET['acao']);
		}