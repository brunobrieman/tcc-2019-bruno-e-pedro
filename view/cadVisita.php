<?php
 include "cabecalho.php";
 if(isset( $_SESSION['usuario']) and $_SESSION['tipoUser'] == 2 ){
?>

<body style="background: #8FBC8F;">

    <div class="container"style="margin-top: 10%;">
            <center><h3>Cadastro de Visitante:</h3></center>
                           
            <div class="col-md-6"style="
                margin-left: 25%;
                background: white;
                padding: 5%; box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);">
                


                    <form method="post" action="../controllers/portaria.php?acao=salvarCadVisitante">
                    
                    <div class="form-group">
                        <label for="nome">Nome</label>
                        <input name="nome" type="text" class="form-control" id="email"  placeholder="Nome:">
                    </div>
                    <div class="form-group">
                        <label for="mot_ext">Motivo da visitação:</label>
                        <input name="mot_ext" type="text" class="form-control" id="email"  placeholder="ex: consulta a biblioteca">
                    </div>
                    <div class="form-group">
                        <label for="cpf">CPF</label>
                        <input name="cpf" type="text" class="form-control" id="email"  placeholder="cpf:">
                    </div>
                     <div class="form-group">
                        <label for="cpf">Email</label>
                        <input name="email" type="text" class="form-control" id="email"  placeholder="email:">
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
