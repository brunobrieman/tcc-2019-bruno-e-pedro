
<?php
include "cabecalho.php";
if(isset( $_SESSION['usuario']) and $_SESSION['tipoUser'] == 3){
?>

<body >
    <div class="container" style="margin-top:10%;">

        <h4>Lista de solicitações de entrada em sua aula:</h4>

        <table class="table" style="margin-top: 25px">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Descrição</th>
                <th scope="col">Justificativa</th>
                <th scope="col">Data</th>
                <th scope="col">Aluno</th>
                
            </tr>
            </thead>

             <tbody>

                <?php foreach ($notificacao as $key=> $ocorrencia): ?>

                	<tr>
		                    <th scope="row"><?= $ocorrencia->codOcorrencia; ?></th>
		                    <td><?= $ocorrencia->descricao; ?></td>
		                    <td><?= $ocorrencia->motivo; ?></td>
		                    <td><?= $ocorrencia->dth; ?></td>
		                     <td>

                        <?php       
                            echo'  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal'.$key.'">'.$ocorrencia->matricula;
                            
                        ?>            
                                </button>
                            </td>
                            <td>
                            <?php
                                if($ocorrencia->aprovacaoprof == 0){ 
                                 echo '

                                   <a id="'.$key.'ref" href="../controllers/professor.php?acao=statusDiscOcorrencia&matricula=' .$ocorrencia->matricula.'&siape='.$ocorrencia->siape.'">
                                   
                                    <button id="'.$key.'" onclick="myFunction('.$key.')" class="btn btn-danger" name="matricula" "> autorizar entrada</button>

                                    </a>

                                    
 
                                    ';
                                }elseif( $ocorrencia->aprovacaoprof == 1) {
                                    echo '                                    
                                         <button class=" btn btn-success">autorizado
                                         </button>
                                         ';
                                }    
                            ?>
                            </td>
                	</tr>


                	<?php

       echo ' <div class="modal fade" id="modal'.$key.'" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">';

       ?>


          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="TituloModalCentralizado">Informações do discente:</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <img src='<?php echo ($ocorrencia->foto)?>' style="width:20%;height: auto; margin-bottom: 5%;">

                <h5>Nome:<?=$ocorrencia->nome?></h5>
                <h5>Responsável:<?=$ocorrencia->nomeResp?></h5>
                <h5>Contato responsável:<?=$ocorrencia->emailResp?></h5>
                <h5>Curso:<?=$ocorrencia->curso?></h5>
                <h5>Turma:<?=$ocorrencia->desc_turma?></h5>



              </div>
          </div>
      </div>
  </div>

                
                <?php endforeach; ?>

            </tbody>
        </table>

    </div>



</body>
</html>

<?php
      include '../rodape.php';
        }else{
            header('Location:../index.php');        
        }
?>
