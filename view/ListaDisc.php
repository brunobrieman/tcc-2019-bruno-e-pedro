<?php

include "cabecalho.php";

if(isset( $_SESSION['usuario']) or $_SESSION['tipoUser'] ==1 or $_SESSION['tipoUser'] ==2){
 ?>
 
<div class="espaco">
<div class="col-sm-9" style="margin-left:5%;">
        <h4>Listagem de Discentes <h4>

                  

                <table class="table" style="margin-top: 25px">

                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Matricula</th>                        
                        <th scope="col">Nome</th>
                        <th scope="col">Email</th>
                        <th scope="col">Responsável</th>
                        <th scope="col">Curso</th>
                        
                        
                        <th>
                        
                    </tr>
                    </thead>
                    <tbody>

                        <?php foreach ($listaDisc as $key => $usuario): ?>

                        <tr>
                            <th scope="row"><?= $usuario->cod_user; ?></th>
                             <td><?= $usuario->matricula; ?></td>
                            <td><?= $usuario->nome; ?></td>
                            <td><?= $usuario->email; ?></td>
                             <td><?= $usuario->emailResp; ?></td>
                            <td><?= $usuario->curso; ?></td>


                           
                           
                
                            <td>
                            <?php
                            if(isset( $_SESSION['usuario']) and  $_SESSION['tipoUser'] ==1){?>

                             
                                <a class="btn btn-danger" href="discente.php?acao=excluir&cod_user=<?= $usuario->cod_user ?>">excluir</a>
                            
                        
                           <?php          
                            if ( $usuario->status == 1) {

                                echo '


                                    <td>
                                     <a id="'.$key.'ref" href="?acao=statusSaida&cod_user=' .$usuario->cod_user.'&status='.$usuario->status.'">

                                    <button id="bt'.$key.'" onclick="myFunction2('.$key.')" class=" btn btn-danger">autorizar saída</button>
                                    
                                    </a>
                                    </td>

                                ';

                            }else{

                                echo ' <td>                                   
                                         <button class=" btn btn-success">Saída autorizada
                                         </button>
                                        </td> 
                                ';
                            }


                                        
 
                                        
                                        

                                    

                            
                            
                             
                            }elseif ($_SESSION['tipoUser'] ==2 and $usuario->status == 0) {
                            echo'
                                <td>

                                   <a id="'.$key.'ref" href="../controllers/usuario.php?acao=status&cod_user=' .$usuario->cod_user.'">
                                   
                                    <button id="'.$key.'" onclick="myFunction('.$key.')" class="btn btn-danger" name="cod_user" "> fora da instituição</button>
                                      </a>


                                   
                                </td>

                        
                            <td><button type="button" class="btn btn-success"> saída autorizada </button></td>
                            ';  
                            }elseif($usuario->status == 1){
                                echo '
                                <td>
                                <button id="bt'.$key.'" onclick="myFunction2('.$key.')" class="nao_aparece btn btn-danger">ativo na instituição</button>
                                </td>';
                            }

                            



                            ?>
                         </td>
                            <td>
                                <a class="btn btn-danger" href="../controllers/usuario.php?acao=ListaDiscTurma&cod_turma=<?= $usuario->cod_turma ?>">Turma do discente</a>
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