<?php
 include "cabecalho.php";
 if(isset( $_SESSION['usuario']) and $_SESSION['tipoUser'] == 3 ){

?>
<body style="background: #8FBC8F">
    <div class="container"style="margin-top: 5%;">
    <center><h3>Editar seu Perfil:</h3></center>
                           
            <div class="col-md-6" style="
                margin-left: 25%;
                background: white;
                padding: 5%; box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);">



                    <form method="post" action="../controllers/professor.php?acao=atualizar" enctype="multipart/form-data">

                        <input type="hidden" name="cod_user" value="<?= $_GET['cod_user'] ?>">

                    <div class="form-group"/>
                        <label for="Siape">Siape</label>
                        <input name="Siape" value="<?= $dados_user['siape'] ?>" type="text" class="form-control" id="name"  placeholder="digite seu Siape">
                    </div>
                    <div class="form-group">
                        <label for="cod_user">Código de usuário</label>
                        <input name="cod_user"  value="<?= $dados_user['cod_user'] ?>" type="text" class="form-control" id="email"  placeholder="fornecido pelo Nupe">
                    </div>
                    <div class="form-group">
                        <label for="formacao">Formação e especialização</label>
                        <input name="formacao"  value="<?= $dados_user['formacao'] ?>" type="text" class="form-control" id="email"  placeholder="ex: Dr. em Química pela UFSC">
                    </div>
                    <div class="form-group">
                        <label for="senha">Senha</label>
                        <input name="senha" value="<?= $dados_user['senha'] ?>" type="senha" class="form-control" id="email"  placeholder="senha:">
                    </div>

                    <div class="form-group">
                    <label for="exampleFormControlFile1">Foto</label>
                    <input type="file" class="form-control-file" name="foto" id="exampleFormControlFile1">
                    </div>
    
                    <button type="submit" class="btn btn-success" style="width: 50%;border-radius: 10px;">Submit</button>
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