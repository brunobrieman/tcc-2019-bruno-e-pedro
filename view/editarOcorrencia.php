<?php
include "cabecalho.php";

 if($_SESSION['tipoUser'] == 1 or $_SESSION['tipoUser'] == 2) {

?>
<body style="background: #8FBC8F">

        <br>
        <br>

    <div class="container"style="margin-top: 2%;">
                           
            <div class="col-md-6" style="
                margin-left: 25%;
                background: white;
                padding: 5%; box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);">

            <center><h3 style="margin-bottom: 4%;">Editar ocorrência:</h3></center>

                   

                    <form method="post" action="../controllers/ocorrencia.php?acao=atualizar">

                     <input type="hidden" name="codOcorrencia" value="<?=$_GET['codOcorrencia']?>">   

                    <div class="form-group"/>
                        <label for="name">Descrição da ocorrência:</label>
                        <input value="<?= $dados_ocorrencia['descricao']?>" name="Desc" type="text" class="form-control" id="name"  placeholder="Descrição">
                    </div>
                    <div class="form-group">
                        <label for="Just">Justificativa:</label>
                        <input  value="<?= $dados_ocorrencia['motivo']?>" name="Just" type="text" class="form-control" id="email"  placeholder="Justificativa">
                    </div>
                    <div class="form-group">
                        <label for="dth">Data:</label>
                        <input  value="<?= $dados_ocorrencia['dth']?>" name="dth" type="date" class="form-control" id="email"  placeholder="">
                    </div>
                    
                      <div class="form-group">
                        <label for="exampleFormControlSelect1">Tipo de ocorrência:</label>
                        <select name="codTipocorrencia" class="form-control" id="exampleFormControlSelect1">
                          <option value="1">Entrada Tardia</option>
                          <option value="2">Saída Prévia</option>
                          
                      </select>
                      </div>
                    <div class="form-group">
                        <label for="matricula">Matricula discente:</label>
                        <input  value="<?= $dados_ocorrencia['matricula']?>" name="matricula" type="text" class="form-control" id="password" placeholder="seu código de identificação">
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