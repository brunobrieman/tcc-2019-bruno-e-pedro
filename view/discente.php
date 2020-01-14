<?php

include "cabecalho.php";

if(isset( $_SESSION['usuario'])  and $_SESSION['tipoUser']==4 ) {

    ?>
<body style="background: #8FBC8F">
        <div class="espaco"></div>
        <div class="container">
          <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <img src='<?php echo ($_SESSION['foto'])?>' style="width:20%;height: auto; margin-bottom: 5%;">
                                <h4>Seu Perfil</h4>
                                <h5><?php echo '<strong>'.$_SESSION['usuario'].'</strong>'?></h5>
                                <a class="btn btn-success" href="../controllers/discente.php?acao=editarDisc&cod_user=<?= $_SESSION['cod_user'] ?>">editar</a>
                                <a href="usuario.php?acao=logout">
                                    <button class="btn-primary btn" name="encerrarSession">encerrar sessão</button>
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                             <h4>Suas informações:</h4>
                             <h6>Matricula:<?php echo ($_SESSION['matricula']);?></h6>
                             <h6>Nome: <?php echo ($_SESSION['nome']);?></h6>
                             <h6>CPF: <?php echo ($_SESSION['cpf']);?></h6>

                         </div>
                     </div>
                     <div class="row">
                        <div class="col-md-12">
                          <h4>Histórico de ocorrências:</h4>
                          <table class="table" style="margin-top: 25px">

                            <thead>
                                <tr>

                                    <th scope="col">Motivo</th>
                                    <th scope="col">Descricao</th>
                                    <th scope="col">DTH</th>
                                    
                                </tr>
                            </thead>
                            <tbody> 


                                <?php foreach ($listaocorrencia as $ocorrencia): ?>

                                    <tr>

                                        <th scope="row"><?= $ocorrencia->motivo; ?></th>
                                        <td><?= $ocorrencia->descricao; ?></td>
                                        <td><?= $ocorrencia->dth; ?></td>
                                    </tr>  
                                <?php endforeach;?>
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
include "../rodape.php";
?>
</body>



<?php
}else{
    header('Location:../index.php');        
}
?>                
