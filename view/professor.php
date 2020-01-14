<?php

session_start();
include "cabecalho.php";

 if(isset($_SESSION['usuario']) and $_SESSION['tipoUser']==3) {
?>
<body style="background: #8FBC8F">
<div class="espaco"></div>
<div class="container">
  <div class="row">
    <div class="col-md-3 ">
      
         <div class="list-group ">
              <a href="ocorrencia.php?acao=listanotify&&siape=<?php echo($_SESSION['siape'])?> " class="list-group-item list-group-item-action active">solicitações de entrada em sala </a>
              <a href="professor.php?acao=listaProfTurma&&siape=<?php echo($_SESSION['siape'])?>" class="list-group-item list-group-item-action">Suas turmas</a>
              
              
            </div> 
    </div>
    <div class="col-md-9">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">

                        <img src='<?php echo ($_SESSION['foto'])?>' style="width:20%;height: auto; margin-bottom: 5%;">
                        
                        <h4>Seu Perfil:</h4>
                        <h4><?php echo '<strong>'.$_SESSION['usuario'].'</strong>'?></h4>
                        <a class="btn btn-success" href="../controllers/professor.php?acao=editarProf&cod_user=<?= $_SESSION['cod_user'] ?>">editar</a>
                        <a href="usuario.php?acao=logout">
                        <button class="btn-primary btn" name="encerrarSession">encerrar sessão</button>
                        </a>

                        <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h4>Suas informações:</h4>
                        <h6>Siape: <?php echo ($_SESSION['siape']);?></h6>
                        <h6>CPF: <?php echo ($_SESSION['cpf']);?></h6>
                        <h6>Formação: <?php echo ($_SESSION['formacao']);?></h6>
                        <h6>Nome: <?php echo ($_SESSION['nome']);?></h6>
                        


                        
                    </div>
                </div>
                
            </div>
        </div>
    </div>
  </div>
</div>
<!--
<div class="espaco"></div>
<hr>
<div class="container bootstrap snippet">
    
  <div class="row">
          
    <div class="col-sm-3">
      
          <div class="col-sm-1515151515"><h4><?php echo '<strong>'.$_SESSION['usuario'].'</strong>'?></h4></div>

   
        <a href="usuario.php?acao=logout">
        <button class="btn-primary btn" name="encerrarSession">encerrar sessão</button>
        </a>
    

          <a class="btn btn-success" href="../controllers/professor.php?acao=editarProf&cod_user=<?= $_SESSION['cod_user'] ?>">editar</a>
    
      
      
               
         <div class="espaco"></div>
          
          <ul class="list-group">
           
            <a href =""><li class="list-group-item text-right"><span class="pull-left"><strong></strong></span></li></a>
            <a href =""><li class="list-group-item text-right"><span class="pull-left"><strong ></strong></span></li></a>
            <a href ="ocorrencia.php?acao=listanotify&&siape=<?php echo($_SESSION['siape'])?> "><li class="list-group-item text-right"><span class="pull-left"><strong >ocorrencias de discentes </strong></span></li></a>
            <a href ="professor.php?acao=listaProfTurma&&siape=<?php echo($_SESSION['siape'])?>"><li class="list-group-item text-right"><span class="pull-left"><strong>Suas Turmas</strong></span></li></a>
            <a href ="?acao=prof"><li class="list-group-item text-right"><span class="pull-left"><strong ></strong></span></li></a>

            <li class="list-group-item text-right"><span class="pull-left"><strong>Siape:<?php echo ($_SESSION['siape']);?></strong></span></li>

          </ul> 
    </div>

          <div class="col-md-9">
            <h1>aQUI</h1>     
          </div>
  </div> 
</div>              
-->
<?php
        }else{
            header('Location:../index.php');        
        }
?>                

<?php
include "../rodape.php";
?>