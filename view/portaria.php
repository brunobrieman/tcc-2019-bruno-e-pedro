<?php

include "cabecalho.php";

 if(isset($_SESSION['usuario']) and $_SESSION['tipoUser'] ==2) {
?>


<body style="background: #8FBC8F">
<div class="espaco"></div>
<div class="container">
  <div class="row">
    <div class="col-md-3 ">
      
         <div class="list-group ">
              <a href="../view/cadVisita.php " class="list-group-item list-group-item-action active">Cadastrar visitante </a>
              <a href="ocorrencia.php?acao=cadastrar" class="list-group-item list-group-item-action">Cadastrar ocorrência</a>
              <a href="?acao=ListaDisc" class="list-group-item list-group-item-action">Discentes</a>
              <a href="?acao=prof2" class="list-group-item list-group-item-action">Professores</a>
              
              
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
                        <h5><?php echo 'CPF: '.$_SESSION['cpf']?></h5>
                         <h5><?php echo 'Nome: '.$_SESSION['nome']?></h5>
                        <a class="btn btn-success" href="../controllers/portaria.php?acao=editarPort&cod_user=<?= $_SESSION['cod_user'] ?>">editar</a>
                        <a href="usuario.php?acao=logout">
                        <button class="btn-primary btn" name="encerrarSession">encerrar sessão</button>
                        </a>

                        <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h4>Suas informações:</h4>
                        <h6>código de servidor:<?php echo ($_SESSION['codportaria']);?></h6>
                        
                        <h6>Nome: <?php echo ($_SESSION['nome']);?></h6>
                        


                        
                    </div>
                </div>

                 <div class="row">
                    <div class="col-md-12">

                         <h5>Visitantes:</h5>

        
                <table class="table" style="margin-top: 25px">
                    <thead>
                    <tr>
                
                        <th scope="col">Nome</th>
                        <th scope="col">Email</th>
                         <th scope="col">CPF</th>
                         <th scope="col">Motivo</th>
                        <th scope="col">Editar</th>
                        <th scope="col">Excluir</th>
                        
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                     foreach ($listaVisitantes as $usuario): ?>
                    <tr>
                            <th scope="row"><?= $usuario->Nome; ?></th>
                           
                            <td><?= $usuario->email; ?></td>
                             <td><?= $usuario->cpf; ?></td>
                             <td><?= $usuario->motivo; ?></td>
            
                            <td>
                                <a class="btn btn-danger" href="../controllers/portaria.php?acao=updateVisita&cpf=<?= $usuario->cpf ?>">editar</a>
                            </td>
                            <td>
                                <a class="btn btn-danger" href="../controllers/portaria.php?acao=deleteVisita&cpf=<?= $usuario->cpf ?>">excluir</a>
                            </td>
                            
                    </tr>
                    <?php endforeach; ?>

            

                    </tbody>
                </table>
                        
                            


                        
                    </div>
                </div>
                
            </div>
        </div>
    </div>
  </div>
</div>

<?php
        }else{
            header('Location:../index.php');        
        }
?>                
<?php
include "../rodape.php";
?>