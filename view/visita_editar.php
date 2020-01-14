<?php
include "cabecalho.php";

 if( $_SESSION['tipoUser'] == 2) {

?>
<body style="background: #8FBC8F">

        <br>
        <br>

    <div class="container"style="margin-top: 2%;">
                           
            <div class="col-md-6" style="
                margin-left: 25%;
                background: white;
                padding: 5%; box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);">

            <center><h3 style="margin-bottom: 4%;">Editar Visiatante:</h3></center>

                   

                    <form method="post" action="../controllers/portaria.php?acao=editarVisita">

                     <input type="hidden" name="cpf" value="<?=$_GET['cpf']?>">   

                    <div class="form-group"/>
                        <label for="nome">Nome:</label>
                        <input value="<?= $dados_visit['Nome']?>" name="nome" type="text" class="form-control" id="name"  placeholder="Nome:">
                    </div>
                    
                    

                    <div class="form-group"/>
                        <label for="email">Email:</label>
                        <input value="<?= $dados_visit['email']?>" name="email" type="text" class="form-control" id="name"  placeholder="Email:">
                    </div>
                    <div class="form-group"/>
                        <label for="mot_ext">Motivo:</label>
                        <input value="<?= $dados_visit['motivo']?>" name="mot_ext" type="text" class="form-control" id="name"  placeholder="Motivo da visitação:">
                    </div>
                    
                    <center><button type="submit" class="btn btn-success" style="width: 50%;border-radius: 10px;">Submit</button></center>
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