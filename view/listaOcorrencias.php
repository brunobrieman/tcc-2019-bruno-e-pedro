<?php
include "cabecalho.php";
if(isset( $_SESSION['usuario']) and $_SESSION['tipoUser'] ==1){

?>


    <div class="container" style="margin-top:10%;">

        <h4>Listagem de ocorrencias:</h4>

        <a class="btn btn-success" href="../controllers/ocorrencia.php?acao=cadastrar">Cadastrar nova </a>

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

                <?php

                 foreach ($listaOcorrencias as $key => $ocorrencia): ?>

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
                    <?php
                    if ($ocorrencia->aprovacaoprof == 1) {
                      
                   
                    echo'
                    <td>
                      <button class ="btn btn-success">entrada aprovada </button>

                    </td>';
                     }
                    ?>
                    <td>
                        <a class="btn btn-danger" href="../controllers/ocorrencia.php?acao=editarocorrencia&codOcorrencia=<?= $ocorrencia->codOcorrencia ?>">editar ocorrência</a>
                    </td>
                    <td>
                       <a class="btn btn-danger" href="ocorrencia.php?acao=excluir&codOcorrencia=<?= $ocorrencia->codOcorrencia ?>">excluir  ocorrência</a>
                    </td>
                </tr>


                
                <!-- Modal -->



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
        }else{
            header('Location:../index.php');        
        }
?>
<?php
include "../rodape.php";
?>