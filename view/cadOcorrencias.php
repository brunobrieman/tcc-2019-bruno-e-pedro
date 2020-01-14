
<?php
include "cabecalho.php";

if(isset( $_SESSION['usuario']) and $_SESSION['tipoUser'] ==1 or $_SESSION['tipoUser'] ==2){

?>
<body style="background: #8FBC8F">

        <br>
        <br>

    <div class="container"style="margin-top: 2%;">
                           
            <div class="col-md-6" style="
                margin-left: 25%;
                background: white;
                padding: 5%; box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);">

            <center><h3 style="margin-bottom: 4%;">Cadastro de ocorrência:
            </h3></center>

                    <form method="post" action="../controllers/ocorrencia.php?acao=salvarOcorrencia">
                    <div class="form-group"/>
                        <label for="name">Descrição da ocorrêcia:</label>
                        <input name="Desc" type="text" class="form-control" id="name"  placeholder="descrição:">
                    </div>
                    <div class="form-group">
                        <label for="Just">Justificativa:</label>
                        <input name="Just" type="text" class="form-control" id="email"  placeholder="justificativa:">
                    </div>
                    <div class="form-group">
                        <label for="dth">Data:</label>
                        <input name="dth" type="date" class="form-control" id="email"  placeholder="">
                    </div>
                    <?php if($_SESSION['tipoUser'] == 2){?>
                      <div class="form-group">
                        <label for="exampleFormControlSelect1">Tipo de ocorrência:</label>
                        <select  name="codTipocorrencia" class="form-control" id="exampleFormControlSelect1">
                          
                          <option value="1">Entrada Tardia</option>
                        </select>

                      </div>
                      <?php }elseif($_SESSION['tipoUser']==1){?>
                         <div class="form-group">
                        <label for="exampleFormControlSelect1">Tipo de ocorrência:</label>
                        <select  name="codTipocorrencia" class="form-control" id="exampleFormControlSelect1">
                          
                          <option value="1">Entrada Tardia</option>
                          <option value="2">Saída prévia</option>
                        </select>
                          <?php }?>
                    
                    <div class="form-group">
                        <label for="matricula">Matricula discente:</label>
                        <input name="matricula" type="text" class="form-control" id="password" placeholder="matricula:">
                    </div>
                    <div class="form-group">
                        <label for="matricula">Matricula discente:</label>
                        <input name="siape" type="text" class="form-control" id="password" placeholder="siape do professor em aula:">
                    </div>
                    <center><button type="submit" class="btn btn-success" style="width: 50%;border-radius: 10px;">Submit</button></center>
                </form>
            </div>
        </form>
    </div>
</div>
</body>

        

<?php
include "../rodape.php";

        }else{
            header('Location:../index.php');        
        }


?>