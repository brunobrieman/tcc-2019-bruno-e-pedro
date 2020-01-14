<?php
include "cabecalho.php";
 if(isset( $_SESSION['usuario']) and $_SESSION['tipoUser'] == 1){

?>
<body style="background: #8FBC8F">      
    <div class="container" style="margin-top: 10%;">

       <center><h3>Editar seu perfil:</h3></center>
                           
            <div class="col-md-6" style="
                margin-left: 25%;
                background: white;
                padding: 5%; box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);">

        

        <form method="post" action="../controllers/nupe.php?acao=atualizar" enctype="multipart/form-data">

            <input type="hidden" name="cod_user" value="<?= $_GET['cod_user'] ?>">

            <div class="form-group"/>
                        <label for="codNupe">Código Nupe</label>
                        <input name="codNupe"  value="<?= $dados_user['codNupe'] ?>" type="text" class="form-control" id="name"  placeholder="digite código Nupe">
                    </div>
                    <div class="form-group">
                        <label for="cod_user">Código de usuário</label>
                        <input name="cod_user" type="text" class="form-control" id="email" value="<?= $dados_user['cod_user'] ?>" placeholder="digite seu código de usuário:">
                    </div>
                    <div class="form-group">
                        <label for="senha">Senha</label>
                        <input name="senha" value="<?= $dados_user['senha'] ?>" type="text" class="form-control" id="email"  placeholder="senha:">
                    </div>
                    
                    <div class="form-group">
                    <label for="exampleFormControlFile1">Foto</label>
                    <input type="file" class="form-control-file" name="foto" id="exampleFormControlFile1">
                    </div>

            <button type="submit" class="btn btn-success">Submit</button>
        </form>


    </div>
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