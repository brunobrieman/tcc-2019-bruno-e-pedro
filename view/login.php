
<?php


include "cabecalho.php";
?>


<style type="text/css">
.login-container{
margin-top: 5%;
margin-bottom: 5%;
}
.login-form-1{
padding: 5%;
box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);
}
.login-form-1 h3{
text-align: center;
color: #333;
}

.login-container form{
padding: 10%;
}
.btnSubmit
{
width: 50%;
border-radius: 1rem;
padding: 1.5%;
border: none;
cursor: pointer;
}
.login-form-1 .btnSubmit{
font-weight: 600;
color: #fff;
background-color: #0062cc;
}
.login-form-1 .ForgetPwd{
color: #0062cc;
font-weight: 600;
text-decoration: none;
}


</style>
<body style="background: #8FBC8F;">
<div class="container login-container" style="margin-top: 10%;">

            <div class="row">

                <div class="col-md-6 login-form-1 " style="
                margin-left: 25%;
                background: white;
                padding: 5%; box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);">

                    <h3>Entre na sua conta:</h3>
                    <form method="post" action="../controllers/usuario.php?acao=login">
                        <div class="form-group">
                        <label for="exampleFormControlSelect1">Tipo de usuário</label>
                        <select  name="codTipuser" class="form-control" id="exampleFormControlSelect1">
                          <option value="1">Nupe</option>
                          <option value="2">Portaria</option>
                          <option value="3">Professor</option>
                          <option value="4">Discente</option>
                          
                        </select>
                      </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="seu email" name="email" />
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Senha:" value="Senha:" name="senha" />
                        </div>
                        <button type="submit" class="btn btn-success" style="width: 50%;border-radius: 10px;" name="submit">Entrar</button>
                       
                    </form>
                </div>
            </div>
</div>
</body>
<?php
include "../rodape.php";
?>