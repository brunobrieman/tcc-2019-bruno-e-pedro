<?php
 include "cabecalho.php";
 if(isset( $_SESSION['usuario']) and $_SESSION['tipoUser'] == 4 ){

?>]
<body style="background: #8FBC8F">
    <div class="container"style="margin-top: 5%;">
    <center><h3>Editar seu perfil:</h3></center>
                           
            <div class="col-md-6" style="
                margin-left: 25%;
                background: white;
                padding: 5%; box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);">



                    <form method="post" action="../controllers/discente.php?acao=atualizar" enctype="multipart/form-data">

                    <input type="hidden" name="cod_user" value="<?= $_GET['cod_user'] ?>">


                    <div class="form-group">
                        <label for="curso">Matricula:</label>
                        <input name="matricula" type="text" value="<?= $dados_user['matricula'] ?>" class="form-control" id="email"  placeholder="sua matricula:">
                    </div>

                     <div class="form-group">
                        <label for="resp">E-mail do Responsável:</label>
                        <input name="resp" type="email" value="<?= $dados_user['emailResp'] ?>" class="form-control" id="email"  placeholder="e-mail do Responsável:">
                    </div>
                    <div class="form-group">
                        <label for="respnome"> Responsável:</label>
                        <input name="respnome" type="text" value="<?= $dados_user['nomeResp'] ?>" class="form-control" id="email"  placeholder="Nome do Responsável:">
                    </div>
                    <div class="form-group">
                        <label for="senha">Senha</label>
                        <input name="senha" type="text" class="form-control" value="<?= $dados_user['senha'] ?>" id="password" placeholder="digite sua senha:">
                    </div>

                    <div class="form-group">
                    <label for="exampleFormControlFile1">Foto</label>
                    <input type="file" class="form-control-file" name="foto" id="exampleFormControlFile1">
                    </div>
                    
                    <button type="submit" class="btn btn-success" style="width: 50%;border-radius: 10px;">Editar</button>
    
                   
                </form>
            </div>
        
</div>
</body>
<?php
        }else{
            header('Location:../index.php');        
        }
?>
</html>
<?php
include "../rodape.php";
?>