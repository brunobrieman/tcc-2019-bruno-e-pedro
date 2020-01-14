<?php

include "cabecalho.php";


 if(isset( $_SESSION['usuario']) and $_SESSION['tipoUser'] == 1) {
    
?>

<div class="espaco"></div>
<body style="background: #8FBC8F;">


<div class="container">
  <div class="row">
    <div class="col-md-3 ">
      
         <div class="list-group ">
              <a href="?acao=ListaDisc" class="list-group-item list-group-item-action active">Discentes </a>
              <a href="?acao=ListaTurmas" class="list-group-item list-group-item-action">Turmas</a>
              <a href="ocorrencia.php?acao=listaOcorrencias" class="list-group-item list-group-item-action">Lista de ocorrências</a>

              <a href="usuario.php?acao=prof" class="list-group-item list-group-item-action">Professores</a>

              <a href="../view/cadOcorrencias.php" class="list-group-item list-group-item-action">Realizar ocorrência</a>

              <a href="ocorrencia.php?acao=listaOcorrencias?>" class="list-group-item list-group-item-action"></a>

              <a href="professor.php?acao=listaProfessorTurma" class="list-group-item list-group-item-action">Professores com turmas</a>

              
              
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
                         <h5><?php echo 'código de servidor: '.$_SESSION['codNupe']?></h5>
                         <h5><?php echo 'CPF: '.$_SESSION['cpf']?></h5>
                         <h5><?php echo 'Nome: '.$_SESSION['nome']?></h5>

                        <a class="btn btn-success" href="../controllers/nupe.php?acao=editarNupe&cod_user=<?= $_SESSION['cod_user'] ?>">editar</a>
                        <a href="usuario.php?acao=logout">
                        <button class="btn-primary btn" name="encerrarSession">encerrar sessão</button>
                        </a>

                        <hr>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <h5>Listagem de Usuários cadastrados:</h5>

                            <a class="btn btn-success" href="../controllers/usuario.php?acao=cadastrar">Cadastrar novo</a>
                              <a class="btn btn-primary" style="margin-left: 80%;" href="../controllers/usuario.php?acao=desativaTodos">Desativar todos</a>
                             <table class="table" style="margin-top: 25px">

                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Editar</th>
                                    <th scope="col">Excluir</th>
                                    <th scope="col">Status</th>
                            
                                </tr>
                            </thead>
                        <tbody>

                
                           <?php      
                            foreach ($listaUsuarios as $key => $usuario): ?>

                        <tr>
                            <?php if($usuario->codTipuser != 1){?>
                            <th scope="row"><?= $usuario->cod_user; ?></th>
                            <td><?= $usuario->nome; ?></td>
                            <td><?= $usuario->email; ?></td>
                            <td>
                                <a class="btn btn-danger" href="../controllers/usuario.php?acao=editar&cod_user=<?= $usuario->cod_user ?>">editar</a>
                            </td>
                            <td>
                                <a class="btn btn-danger" href="../controllers/usuario.php?acao=excluir&cod_user=<?= $usuario->cod_user ?>">excluir</a>
                            </td>
                                
                                <?php
                                echo '<td>';
                                if ( $usuario->status == 0) {
                                echo '

                                   <a id="'.$key.'ref" href="../controllers/usuario.php?acao=status&cod_user=' .$usuario->cod_user.'">
                                   
                                    <button id="'.$key.'" onclick="myFunction('.$key.')" class="btn btn-danger" name="cod_user" "> fora da instituição</button>
                                      </a>


                                    <button id="bt'.$key.'" onclick="myFunction2('.$key.')" class="nao_aparece btn btn-danger">ativo na instituição</button>

                                    ';
                                
                              
                                
                                }elseif ($usuario->status == 1) {
                                    
                                echo'
                                 <a id="'.$key.'ref" href="../controllers/usuario.php?acao=status&cod_user=' .$usuario->cod_user.'&status='.$usuario->status.'">
                                <button id="bt'.$key.'" onclick="myFunction2('.$key.')" class=" btn btn-danger">ativo na instituição</button>
                                </a>
                                <button id="'.$key.'" onclick="myFunction('.$key.')" class="nao_aparece btn btn-danger" name="cod_user" value ="'.$usuario->cod_user.'"> fora da instituição</button>
                                ';
                                
                                }
                            }
                                echo '</td>';
                            
                            ?>
                            
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