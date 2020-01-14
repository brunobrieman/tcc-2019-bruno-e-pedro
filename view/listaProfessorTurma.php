<?php


include "cabecalho.php";
if(isset( $_SESSION['usuario']) and $_SESSION['tipoUser'] ==1){
 ?>   
<div class="espaco"></div>
<div class="col-sm-10" style="margin-left:10%;">
        <h4>Listagem de professores em turmas:</h4>

                  

                <table class="table" style="margin-top: 25px">

                    <a class="btn btn-success" href="../view/cadProfTurma.php">Novo cadastro</a>

                    <thead>
                    <tr>
                        <th scope="col">Turma</th>
                        <th scope="col">Código da turma</th>                        
                        <th scope="col">Siape</th>
                        <th scope="col">Excluir</th>
                    
                        
                    </tr>
                    </thead>
                    <tbody>

                        <?php foreach ($listaTurmas as  $turma): ?>

                        <tr>
                            <th scope="row"><?= $turma->desc_turma; ?></th>
                             <td><?= $turma->cod_turma; ?></td>
                               <td><?= $turma->siape; ?></td>
                               
                           

                            
                            <td>
                                <a class="btn btn-danger" href="../controllers/professor.php?acao=excluirProfTurma&siape=<?= $turma->siape?>&cod_turma=<?=$turma->cod_turma?>"/>excluir</a>
               
                            </td>
                           
                        </tr>
                        </tr>
                        
                        <?php endforeach; ?>

                    </tbody>
                </table>
            
</div>
</div>


<?php
include'../rodape.php';
        }else{
            header('Location:../index.php');        
        }
?>