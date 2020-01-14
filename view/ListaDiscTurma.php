<?php

include "cabecalho.php";

if(isset( $_SESSION['usuario']) and $_SESSION['tipoUser'] ==1 or $_SESSION['tipoUser'] ==2 or $_SESSION['tipoUser'] ==3){
 ?>

<div class="espaco">
<div class="col-sm-10" style="margin-left:10%;">

<?php 
            if(!empty($listaDisc[0]->desc_turma)){
                print("<h5>Discentes da: ".$listaDisc[0]->desc_turma."</h5>");
            }else{
                print("<h5>Nenhum discente cadastrado na turma</h5>");
            }
?>
         
        
            
        

                  

                <table class="table" style="margin-top: 25px">

                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Matricula</th>                        
                        <th scope="col">Nome</th>
                        <th scope="col">Email</th>
                        <th scope="col">Responsável</th>
                        <th scope="col">curso</th>
                       
                        <th>
                        
                    </tr>
                    </thead>
                    <tbody>

                        <?php foreach ($listaDisc as $key=> $usuario): ?>

                        <tr>
                            <th scope="row"><?= $usuario->cod_user; ?></th>
                             <td><?= $usuario->matricula; ?></td>
                            <td><?= $usuario->nome; ?></td>
                            <td><?= $usuario->email; ?></td>
                             <td><?= $usuario->emailResp; ?></td>
                            <td><?= $usuario->curso; ?></td>
                            <td>
                            <?php

                              if($_SESSION['tipoUser'] == 3){
                                
                            

                                if ( $usuario->DiscStatus == 0 or $usuario->status == 0) {
                                    echo '


                                       <a id="'.$key.'ref" href="professor.php?acao=statusDisc&matricula=' .$usuario->matricula.'&cod_turma='.$usuario->cod_turma.'"</a>
                                       
                                        <button id="'.$key.'" onclick="myFunction('.$key.')" class="btn btn-danger" name="matricula" "> fora de sala</button>
                                          </a>

                                        
 
                                        
                                        

                                    ';
                            
                                
                                }elseif( $usuario->DiscStatus == 1 and $usuario->status == 1) {
                                    echo '                                    
                                         <button class=" btn btn-success">presente
                                         </button>
                                         ';
                                }

                                
                              }elseif($_SESSION['tipoUser'] == 1 and $usuario->DiscStatus == 1 and $usuario->status == 1 ){

                                echo '                                    
                                         <button class=" btn btn-success">em sala
                                         </button>
                                         ';
                              } 

                             
                            ?>
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