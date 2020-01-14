<?php

    require __DIR__."/../models/Ocorrencia.php";
     
    
    function listaOcorrencias(){
        $ocorrencia = new Ocorrencia();
        $listaOcorrencias = $ocorrencia->lista();
        require __DIR__."/../view/listaOcorrencias.php";
    }
    function cadastrar(){
        require __DIR__."/../view/cadOcorrencias.php";
    }
    function salvarOcorrencia(){
      //  $cod_user = $_POST['cod_user'];
        
        $Desc  = filter_input(INPUT_POST, 'Desc', FILTER_SANITIZE_SPECIAL_CHARS);
        $Just = $_POST['Just'];
        $codTipocorrencia = $_POST['codTipocorrencia'];
        $dth = $_POST['dth'];
        $siape = $_POST['siape'];
        $matricula = $_POST['matricula'];

         $ocorrencia = new Ocorrencia();

      
        $ocorrencia->salvar($Desc,$Just,$codTipocorrencia,$dth,$matricula,$siape,0);

        listaOcorrencias();

         
    }

    function cadastrarTurma(){
        require __DIR__."/../view/cadTurma.php";
    }

    function salvarTurma(){
        //$cod_turma = $_POST['cod_turma'];
            $desc_turma  = filter_input(INPUT_POST, 'desc_turma', FILTER_SANITIZE_SPECIAL_CHARS);
            $cod_curso = $_POST['cod_curso'];
            $ano = $_POST['ano'];
            $turma = new Ocorrencia();
            $turma->salvarTurma($desc_turma,$ano,$cod_curso);
            
            header("location:usuario.php?acao=listaTurmas");
    }

    function editarTurma(){
        $turma = new Ocorrencia();  
        $dados_Turma = $turma->getTurmaById($_GET['cod_turma']);
        require __DIR__."/../view/editarTurma.php";
    }

    function atualizarTurma(){
            $cod_turma = $_POST['cod_turma'];
            $desc_turma  = filter_input(INPUT_POST, 'desc_turma', FILTER_SANITIZE_SPECIAL_CHARS);
            $cod_curso = $_POST['cod_curso'];
            $ano = $_POST['ano'];
            $turma = new Ocorrencia();
            $turma->updateTurma($desc_turma,$cod_turma,$ano,$cod_curso);
            
            header("location:usuario.php?acao=listaTurmas");
    }
    function excluirTurma(){
        $ocorre = new Ocorrencia();
        $ocorre->deleteTurma($_GET['cod_turma']);
        
        header("location:usuario.php?acao=listaTurmas");
    }



    function listanotify(){
        $ocorre = new Ocorrencia();
        $notificacao = $ocorre->ProfDiscOcorre($_GET['siape']);
        require __DIR__."/../view/Notificacao.php";

    }

    function editarOcorrencia(){
        $ocorrencia = new Ocorrencia();  
        $dados_ocorrencia = $ocorrencia->getOcorrenciaById($_GET['codOcorrencia']);
        require __DIR__."/../view/editarOcorrencia.php";

        
    }

        function atualizar(){
            $codOcorrencia = $_POST['codOcorrencia'];
            $Desc  = filter_input(INPUT_POST, 'Desc', FILTER_SANITIZE_SPECIAL_CHARS);
            $Just = $_POST['Just'];
            $codTipocorrencia = $_POST['codTipocorrencia'];
            $dth = $_POST['dth'];
            $matricula = $_POST['matricula'];
            $ocorrencia = new Ocorrencia();
            $ocorrencia->update($Desc,$Just,$codTipocorrencia,$dth,$matricula,$codOcorrencia);
            
            listaOcorrencias();
        }
    function excluir(){
        $ocorre = new Ocorrencia();
        $ocorre->deleteOcorrencia($_GET['codOcorrencia']);
        listaOcorrencias();

    }
    
    if (isset($_GET['acao']) and function_exists($_GET['acao']) ){
        call_user_func($_GET['acao']);
    }

