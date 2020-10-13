<!DOCTYPE html>
<html>
<head>
	<title>Entrada del Sistema</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="asset/css/style.css">
</head>
<body>
  <div id="preload">
  <img src="asset/img/preload.gif" alt="preload" >
   </div> 

	<div class="card">
		 <div class="card-header  bg-dark text-white"><center>
		 	<h2>Entrada del Sistema</h2></center></div>
		 	<div class="card-body">
	<form id="formulario">

    <input type="text" class="form-control" id="user" name="user" placeholder="Digite el Usuario"><br>
    <input type="password" class="form-control" id="pass" name="pass" 
    placeholder="Digite el Password">
    <br>
   
    <br>
    <center><button id="validar" class="btn btn-dark">Entrar</button></center>
   </div>
   </div>
    </form>		


    <script src="asset/js/entrada.js"></script>
      <script src="https://www.google.com/recaptcha/api.js"></script>
    
    </script>	

</body>
</html>