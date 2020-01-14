<?php
include "cabecalho.php";

if(isset( $_SESSION['usuario']) and $_SESSION['tipoUser'] == 3){
 ?>

<div class="espaco">
<div class="col-sm-10" style="margin-left:10%;">
        <h4>Suas Turmas:</h4>



                <table class="table" style="margin-top: 25px">

                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Turma</th>                        
                        <th scope="col">Ano</th>
                        <th scope="col">Curso</th>
                        
                    </tr>
                    </thead>
                    
                    <tbody>

                        <?php foreach ($listaTurmas as  $Turma): ?>

                        <tr>
                            <th scope="row"><a href="../controllers/usuario.php?acao=ListaDiscTurma&cod_turma=<?= $Turma->cod_turma ?>"><?= $Turma->cod_turma; ?></a></th>
                             <td><?= $Turma->desc_turma; ?></td>
                            <td><?= $Turma->ano; ?></td>
                            <td><?= $Turma->desc_curso;?></td>
                        </tr>
                    
                        
                        <?php endforeach; ?>
                    </tbody>
                    

                </table>
</div> 
</div>



<?php
include "../rodape.php";
?>
<?php
        }else{
            header('Location:../index.php');        
        }
?>