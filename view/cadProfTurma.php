<?php
 include "cabecalho.php";
?>
<div class="espaco">.</div>
<body style="background: #8FBC8F">

    <div class="container">
            <center><h3>Cadastro de Professor em turma:</h3></center>
                           
            <div class="col-md-6" style="
                margin-left: 25%;
                background: white;
                padding: 5%; box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);">



                    <form method="post" action="../controllers/professor.php?acao=cadProfTurma" enctype="multipart/form-data">
                    <!-- <div class="form-group"/>
                        <label for="name">Matricula:</label>
                        <input name="codMat" type="text" class="form-control" id="name"  placeholder="digite sua matricula">
                    </div> -->
                    <div class="form-group">
                        <label for="siape">Siape:</label>
                        <input name="siape" type="text" class="form-control" id="email"  placeholder="Siape do professsor:">
                    </div>
                    
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Turma:</label>
                        <select  name="codTurma" class="form-control" id="exampleFormControlSelect1">
                          <option value="11">2info1</option>
                          <option value="12">2info2</option>
                          <option value="13">2info3</option>
                          <option value="10">3info1</option>
                          <option value="9">3info2</option>
                          <option value="4">3info3</option>
                          <option value="8">3quimi</option>
                          <option value="5">3agro3</option>
                          
                        </select>
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
