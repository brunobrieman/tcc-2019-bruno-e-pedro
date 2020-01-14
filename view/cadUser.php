<?php
 include "cabecalho.php";
?>

<body style="background: #8FBC8F;">

        <br>
        <br>

    <div class="container"style="margin-top: 5%;">
                           
            <center><h3>Cadastro de usuário:
            Página Nupe</h3></center>
            <div class="col-md-6" style="
                margin-left: 25%;
                background: white;
                padding: 5%; box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);">



                    <form method="post" action="../controllers/usuario.php?acao=salvar">
                    <div class="form-group"/>
                        <label for="name">Nome</label>
                        <input name="nome" type="text" class="form-control" id="name"  placeholder="digite seu nome">
                    </div>
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input name="email" type="email" class="form-control" id="email"  placeholder="digite email:">
                    </div>
                     <div class="form-group">
                        <label for="cpf">CPF</label>
                        <input name="cpf" type="text" class="form-control"   placeholder="digite um cpf:">
                    </div>

                  
                    
                    <?php if($_SESSION['tipoUser'] == 2){?>
                      <div class="form-group">
                        <label for="exampleFormControlSelect1">Tipo de usuário</label>
                        <select  name="codTipuser" class="form-control" id="exampleFormControlSelect1">
                          <option value="5">Externo</option>
                        </select>
                      </div>
                    <?php }elseif($_SESSION['tipoUser']==1){?>

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
                    <?php }?>
                    <button type="submit" class="btn btn-success" style="width: 50%;border-radius: 10px;">Submit</button>
                </form>
            </div>
        
</div>
</body>
</html>

<?php
include "../rodape.php";
?>