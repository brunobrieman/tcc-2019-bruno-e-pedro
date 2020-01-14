<?php


if(isset( $_SESSION['usuario']) and $_SESSION['tipoUser'] ==2){
include "cabecalho.php";
 ?>

<div class="espaco">
<div class="col-sm-10" style="margin-left:10%;">
        <h4>Listagem de Professores na instituição:</h4>

                  

                <table class="table" style="margin-top: 25px">

                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Siape</th>                        
                        <th scope="col">Nome</th>
                        <th scope="col">Email</th>
                        <th scope="col">Formacao do Professor</th>
                        
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