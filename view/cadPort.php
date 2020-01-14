<?php
 include "cabecalho.php";

?>

<body style="background: #8FBC8F;">
<div class="alert-danger" style="margin-top: 4%;">Necessita de pré-cadastro do administrador </div>

        <br>
        <br>

    <div class="container"style="margin-top: 5%;">
            <center><h3>Cadastro de Segurança:</h3></center>
                           
            <div class="col-md-6"style="
                margin-left: 25%;
                background: white;
                padding: 5%; box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);">
                


                    <form method="post" action="../controllers/portaria.php?acao=salvarCadPort" enctype="multipart/form-data">
                    <div class="form-group"/>
                        <label for="codPortaria">Código de servidor:</label>
                        <input name="codPortaria" type="text" class="form-control" id="name"  placeholder="digite seu Código">
                    </div>
                    <div class="form-group">
                        <label for="cod_user">Código de usuário:</label>
                        <input name="cod_user" type="text" class="form-control" id="email"  placeholder="fornecido pelo Nupe">
                    </div>
                    <div class="form-group">
                        <label for="senha">Senha</label>
                        <input name="senha" type="text" class="form-control" id="email"  placeholder="senha:">
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

</html>

<?php
include "../rodape.php";
?>