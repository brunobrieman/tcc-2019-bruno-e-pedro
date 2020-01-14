 
<body>



  <?php   
    include('cabecalho.php');
  ?>



    <style type="text/css">

  .cards_home{
    margin-top: 5%;
   width: 100%;

  }
      
  .card_home1{
    width: 15%;
    float: left;
   margin-left: 13%;
   
  }
  .card_home2{
    width: 15%;
    float: left;
    margin-left: 5%;
  }
  .card_home3{
    width: 15%;
    float: left;
  margin-left: 5%;
  }
  

      <style>
  body {
    margin: 0;
    font-family: Arial, Helvetica, sans-serif;
  }

  .hero-image {
    background-image: url("../img/fundo_home.jpg");
    
    background-position: center center;
    background-repeat: no-repeat;
    background-size: cover;
    position: relative; 
  
    padding: 20em;
  }

  </style>
  </head>
  <body>

  <?php if(isset($_SESSION['usuario'])) {?>
  <div class="hero-image">
    <div class="hero-text">
  <center style = "margin-top: 20%;">
           <h1 class="animated fadeInLeftBig tituloIndex">Controle de acesso IFC</h1>

                <a href="../controllers/usuario.php?acao=logado"><button type="button" class="btn btn-outline-light my-2 my-sm-"><?php echo '<strong>'.$_SESSION['usuario'].'</strong>'?></button></a>
               <?php }else{?>
                <div class="hero-image">
              <div class="hero-text">
                <center style = "margin-top: 20%;">
                  <h1 class="animated fadeInLeftBig tituloIndex">Controle de acesso IFC</h1>
                    <a href="login.php"><button type="button" class="btn btn-outline-light my-2 my-sm-">Entrar</button></a>
               <?php }?>                
      </div>
            
    </div>

  <center>
  <section class="cards_home">
     <div class="card_home1" >
    <img src="../img/pessoas.png" class="card-img-top" alt="...">
    <div class="card-body">
      <p class="card-text"><h5> Maior segurança à toda instituição </h5></p>
      <a href=""><button type="submit" class="btn btn-success" style="width: 50%;border-radius: 10px;">Discente</button></a>
    </div>
  </div>

   <div class="card_home2">
    <img src="../img/cont.jpg" class="card-img-top" alt="...">
    <div class="card-body">
      <p class="card-text"><h5>Maior controle de entrada e saída</h5></p>
      <a href=""><button type="submit" class="btn btn-success" style="width: 60%;border-radius: 10px;">Segurança</button></a>
    </div>
  </div>
  <div class="card_home3">
    <img src="../img/comunicacao.png" class="card-img-top" alt="...">
    <div class="card-body">
      <p class="card-text"><h5> Comunicação entre os pais e o NUPE</h5></p>
      <a href=""><button type="submit" class="btn btn-success" style="width: 60%;border-radius: 10px;">Nupe</button></a>
    </div>
  </div>
  <div class="card_home3">
    <img src="../img/prof.png" class="card-img-top" alt="...">
    <div class="card-body">
      <p class="card-text"><h5>Maior segurança a professores</h5></p>
      <a href=""><button type="submit" class="btn btn-success" style="width: 50%;border-radius: 10px;">Professor</button></a>
    </div>
  </div>
  
  
</center> 
 
</body>
</html>
