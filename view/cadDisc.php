<?php
 include "cabecalho.php";
?>

<body style="background: #8FBC8F">
<div class="alert-danger" style="margin-top: 4%;">Necessita de pré-cadastro do Nupe </div>

        <br>
        <br>

    <div class="container">
            <center><h3>Cadastro de discente:</h3></center>
                           
            <div class="col-md-6" style="
                margin-left: 25%;
                background: white;
                padding: 5%; box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);">



                    <form method="post" action="../controllers/discente.php?acao=salvarCadDisc" enctype="multipart/form-data">
                    <!-- <div class="form-group"/>
                        <label for="name">Matricula:</label>
                        <input name="codMat" type="text" class="form-control" id="name"  placeholder="digite sua matricula">
                    </div> -->
                    <div class="form-group">
                        <label for="cod_user">Código de usuário:</label>
                        <input name="cod_user" type="text" class="form-control" id="email"  placeholder="fornecido pelo Nupe:">
                    </div>
                    <div class="form-group">
                        <label for="curso">Curso:</label>
                        <input name="curso" type="text" class="form-control" id="email"  placeholder="seu curso:">
                    </div>
                     <div class="form-group">
                        <label for="resp">E-mail do Responsável:</label>
                        <input name="resp" type="email" class="form-control" id="email"  placeholder="e-mail do Responsável:">
                    </div>
                    <div class="form-group">
                        <label for="respnome"> Responsável:</label>
                        <input name="respnome" type="text" class="form-control" id="email"  placeholder="Nome do Responsável:">
                    </div>
                    <div class="form-group">
                        <label for="senha">Senha</label>
                        <input name="senha" type="text" class="form-control" id="password" placeholder="digite sua senha:">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Sua turma</label>
                        <select  name="turma" class="form-control" id="exampleFormControlSelect1">
                          <option value="4">3info3</option>
                          <option value="5">3agro3</option>
                          <option value="8">3quimi</option>
                          
                        </select>
                      </div>
                      <div class="form-group">
                    <label for="exampleFormControlFile1">Foto</label>
                    <input type="file" class="form-control-file" name="foto" id="exampleFormControlFile1">
                    </div>
                    <button type="submit" class="btn btn-success" style="width: 50%;border-radius: 10px;">Cadastrar</button>
                </form>
            </div>
        
</div>
</body>
</html>

<?php
include "../rodape.php";
?>
