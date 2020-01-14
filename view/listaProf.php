<?php


if(isset( $_SESSION['usuario']) and $_SESSION['tipoUser'] ==1){
include "cabecalho.php";
 ?>
<div class="espaco">
<div class="col-sm-10" style="margin-left:10%;">
        <h4>Listagem de Professores Cadastrados:</h4>

                  

                <table class="table" style="margin-top: 25px">

                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Siape</th>                        
                        <th scope="col">Nome</th>
                        <th scope="col">Email</th>
                        <th scope="col">Formacao do Professor</th>
                        <th scope="col">Editar</th>
                        <th scope="col">Excluir</th>
                        <th>
                        
                    </tr>
                    </thead>
                    <tbody>

                        <?php foreach ($listaProf as  $usuario): ?>

                        <tr>
                            <th scope="row"><?= $usuario->cod_user; ?></th>
                             <td><?= $usuario->siape; ?></td>
                               <td><?= $usuario->nome; ?></td>
                               <td><?= $usuario->email; ?></td>
                               <td><?= $usuario->formacao; ?></td>
                           

                            <td>
                                <a class="btn btn-danger" href="../controllers/usuario.php?acao=editar&cod_user=<?= $usuario->cod_user ?>">editar</a>
                            </td>
                            <td>
                                <a class="btn btn-danger" href="../controllers/professor.php?acao=excluirProf&cod_user=<?= $usuario->cod_user ?>">excluir</a>
               
                            </td>
                           
                        </tr>
                        </tr>
                        
                        <?php endforeach; ?>

                    </tbody>
                </table>
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