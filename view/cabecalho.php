<?php
 session_start();
 // require '../models/Usuario.php';
 error_reporting(0);
?>

<!DOCTYPE html>

<head>
	<title>IFControl</title>
<script src="../js/projeto.js" type="text/javascript"></script>
<script src="../js/jquery.js" ></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="../js/popper.min.js"  crossorigin="anonymous"></script>
<script src="../js/bootstrap.min.js"  crossorigin="anonymous"></script>
<link rel="stylesheet" href="../css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../css/trabalho.css">
<link rel="stylesheet" type="text/css" href="../css/animate.mim.css">
<link href="../../dist/css/bootstrap.min.css" rel="stylesheet">
 

</head> 



<body>
  <header style="margin-bottom: 1%;">
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
     <a class="navbar-brand" href="../controllers/usuario.php?acao=home"><strong>IFControl</strong></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="../controllers/usuario.php?acao=home">Home<span class="sr-only">(current)</span></a>

        </li>

        
          <a class="nav-link" href="sobre.php">Sobre <span class="sr-only">(current)</span></a>
         
      </ul>
          
    </div>
  </nav>

</header>
