<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<style type="text/css">
<style>
body {
  font-family: "Lato", sans-serif;
}

/* Fixed sidenav, full height */
.sidenav {
  height: 100%;
  width: 220px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  margin-left:0px;
  background-color: #111;
  overflow-x: hidden;
  padding-top: 20px;
}



.depizq{
  margin-left:-200px;
}

/* Style the sidenav links and the dropdown button */
.sidenav a, .dropdown-btn {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 20px;
  color: #818181;
  display: block;
  border: none;
  background: none;
  width: 100%;
  text-align: left;
  cursor: pointer;
  outline: none;
}

/* On mouse-over */
.sidenav a:hover, .dropdown-btn:hover {
  color: #f1f1f1;
}

/* Main content */
.main {
  margin-left: 200px; /* Same as the width of the sidenav */
  font-size: 20px; /* Increased text to enable scrolling */
  padding: 0px 10px;
}

/* Add an active class to the active dropdown button */
.active {
  background-color: #e67818;
  color: white;
}

/* Dropdown container (hidden by default). Optional: add a lighter background color and some left padding to change the design of the dropdown content */
.dropdown-container {
  display: none;
  background-color: #262626;
  padding-left: 8px;
}

/* Optional: Style the caret down icon */
.fa-caret-down {
  float: right;
  padding-right: 8px;
}


#vermenu{
  display:none;
}


.headerusb{
  margin-left: 221px;
}

#usuario{
  color:white;
  font-weight: bold;
  font-size: 15px;
}




/* Some media queries for responsiveness */
@media screen and (max-height: 768px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}


.headerusb{
  margin-left: 0px;
}

.menulateral1{
  animation-name: example;
  animation-duration: 1s;
  position: fixed;
  margin-left: 0px;
}

@keyframes example {
  from {margin-left:-220px;}
  to {margin-left:0px;}
}

.menulateral2{
  animation-name: examples;
  animation-duration: 1s;
  position: fixed;
  margin-left: -220px;
}

@keyframes examples {
  from {margin-left:0px;}
  to {margin-left:-220px;}
}



}
</style>
</head>
<body>
   <header class="headerusb">

    <nav  class="navbar navbar-expand-md navbar-light bg-light">
      <button class="btn" id="vermenu"><i class="fa fa-bars"></i></button>
        <a href="#" class="navbar-brand">
            <img src="usb.png"  alt="CoolBrand" height="50">
        </a>
        <button id="evento" type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse" onclick="cerrarMenu()">
            <span class="navbar-toggler-icon"></span>
        </button>

     
    </nav>
</header>
<div class="sidenav" id="menulateral" >
  <br>
  <center>
    <img id="perfil" src="user-profile.png" class="rounded-circle" alt="Cinque Terre" width="50" height="50">
    <br>
    </center>

   <button class="dropdown-btn"><strong id="usuario"></strong> 
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container">
    <a href="#">Cambiar Contraseña</a>
    <a href="#">Ver Perfil</a>
    <a href="#" onclick="salir()">Salir</a>
  </div>
  <br>
  <button  class="dropdown-btn">Proyecto 
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container">
    <a href="#">Evaluación</a>
    <a href="#">Listar Proyectos</a>
   </div>

  <button class="dropdown-btn">Encuentro 
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container">
    <a href="#">Link 1</a>
    <a href="#">Link 2</a>
    <a href="#">Link 3</a>
  </div>



  <a href="#contact">Universidad</a>
</div>

<div class="main">
  <!--<h2>Sidebar Dropdown</h2>
  <p>Click on the dropdown button to open the dropdown menu inside the side navigation.</p>
  <p>This sidebar is of full height (100%) and always shown.</p>
  <p>Some random text..</p>-->
</div>

<script>
 var cont=0;
 var element = document.getElementById("menulateral");
 var elemento;
 elemento=element.classList.add("menulateral2");
 elemento=element.classList.remove("menulateral1");
 
 
 let user=localStorage.getItem('nomapel');
 let perfil=localStorage.getItem('foto');
  if(localStorage.getItem('nomapel')==null & localStorage.getItem('token')==null){
    location.href ="index.php";
 }

document.getElementById("usuario").innerHTML=user;
document.getElementById("perfil").src=perfil;

/* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
  this.classList.toggle("active");
  var dropdownContent = this.nextElementSibling;
  if (dropdownContent.style.display === "block") {
  dropdownContent.style.display = "none";
  } else {
  dropdownContent.style.display = "block";
  }
  });
}

function salir(){
  localStorage.removeItem("token");
  localStorage.removeItem("user");
  localStorage.removeItem("nomapel");
   localStorage.removeItem("foto");
  location.href ="index.php";  
}


function cerrarMenu() {
  //menu lateral 2 oculta
  // menu lateral 1 muestra
  
  
  if(cont==0){
   elemento=element.classList.add("menulateral1");
   elemento=element.classList.remove("menulateral2");
   
   cont=1;
  }
   else if(cont==1){
    elemento=element.classList.add("menulateral2");
    elemento=element.classList.remove("menulateral1");
     cont=0;
   }
  
   console.log("cont "+cont);


}

</script>

</body>
</html> 