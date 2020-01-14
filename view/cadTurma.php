<?php
include "cabecalho.php";
if(isset( $_SESSION['usuario']) and $_SESSION['tipoUser'] ==1 ){

?>
<body style="background: #8FBC8F">

        <br>
        <br>

    <div class="container"style="margin-top: 2%;">
                           
            <div class="col-md-6" style="
                margin-left: 25%;
                background: white;
                padding: 5%; box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);">

            <center><h3 style="margin-bottom: 4%;">Cadastrar nova Turma:</h3></center>

                   

                    <form method="post" action="../controllers/ocorrencia.php?acao=salvarTurma">

                      

                    <div class="form-group"/>
                        <label for="nome">Descrição da turma:</label>
                        <input  name="desc_turma" type="text" class="form-control" id="name"  placeholder="Descrição da Turma:">
                    </div>
                    
                    <div class="form-group"/>
                        <label for="ano">Ano de início:</label>
                        <input  name="ano" type="text" class="form-control" id="name"  placeholder="Ano de ingresso da turma:">
                    </div>

                   <div class="form-group">
                        <label for="exampleFormControlSelect1">Curso:</label>
                        <select  name="cod_curso" class="form-control" id="exampleFormControlSelect1">
                          <option value="1">Informática</option>
                          <option value="2">Agropecuária</option>
                          <option value="3">Química</option>
                        </select>
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