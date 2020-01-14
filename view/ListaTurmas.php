<?php
include "cabecalho.php";

if(isset( $_SESSION['usuario']) and $_SESSION['tipoUser'] == 1){
 ?>

<div class="espaco">
<div class="col-sm-10" style="margin-left:10%;">
        <h4>Listagem de Turmas:</h4>

            <a class="btn btn-success" href="../controllers/ocorrencia.php?acao=cadastrarTurma">Cadastrar nova </a>


                <table class="table" style="margin-top: 25px">

                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Turma</th>                        
                        <th scope="col">Ano</th>
                         <th scope="col">Curso</th>
                        <th scope="col">Editar</th>
                        
                        <th scope="col">Excluir</th>
                        
                        
                    </tr>
                    </thead>
                     <tbody>

                        <?php foreach ($listaTurmas as  $Turma): ?>

                        <tr>
                            <th scope="row"><a href="../controllers/usuario.php?acao=ListaDiscTurma&cod_turma=<?= $Turma->cod_turma ?>"><?= $Turma->cod_turma; ?></a></th>
                             <td><?= $Turma->desc_turma; ?></a></td>
                            <td><?= $Turma->ano; ?></a></td>
                            <td><?= $Turma->desc_curso
                            ; ?></a></td>
                            
                            <td>
                        <a class="btn btn-danger" href="../controllers/ocorrencia.php?acao=editarTurma&cod_turma=<?= $Turma->cod_turma ?>">editar Turma</a>
                    </td>
                    <td>
                       <a class="btn btn-danger" href="../controllers/ocorrencia.php?acao=excluirTurma&cod_turma=<?= $Turma->cod_turma ?>">excluir Turma</a>
                    </td>
                             

                           
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