<?php
include "cabecalho.php";
 if(isset( $_SESSION['usuario']) or $_SESSION['tipouser'] == 1){

?>
<body style="background: #8FBC8F">
    <div class="container"style="margin-top: 10%;">
            <center><h3>Editar usuário:</h3></center>
                           
            <div class="col-md-6"style="
                margin-left: 25%;
                background: white;
                padding: 5%; box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);">
                


        <h4>Editar Usuário</h4>

        <form method="post" action="../controllers/usuario.php?acao=atualizar">

            <input type="hidden" name="cod_user" value="<?= $_GET['cod_user'] ?>">

            <div class="form-group">
                <label for="name">Nome</label>
                <input value="<?= $dados_user['nome'] ?>" name="nome" type="text" class="form-control" id="name"  placeholder="digite seu nome">
            </div>


            <div class="form-group">
                <label for="email">E-mail</label>
                <input value="<?= $dados_user['email'] ?>" name="email" type="email" class="form-control" id="email"  placeholder="digite seu email">
            </div>

             <div class="form-group">
                        <label for="exampleFormControlSelect1">Tipo de usuário</label>
                        <select  name="codTipuser" class="form-control" id="exampleFormControlSelect1">
                          <option value="1">Nupe</option>
                          <option value="2">Portaria</option>
                          <option value="3">Professor</option>
                          <option value="4">Discente</option>
                          <option value="5">Externo</option>
                        </select>
                      </div>


            <div class="form-group">
                <label for="cod_user">Código de usuario</label>
                <input value="<?= $dados_user['cod_user'] ?>" name="cod_user" type="number" class="form-control" id="email"  placeholder="digite seu email">
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