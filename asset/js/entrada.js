 (()=>{
'use strict'

 document.getElementById("validar").addEventListener("click",function(e){
    e.preventDefault();    
       document.getElementById("preload").style.display='block'; 
      let formulario=document.getElementById("formulario");
      let datos=new FormData(formulario);  
      enviarServidor(datos.get("user"),datos.get("pass"));
       document.getElementById("preload").style.display='none'; 
     


          
   });



  const enviarServidor=(user,pass)=>{
     //let urlServidor='https://caceresapp.site/plaforma/api/validar.php';
    let urlServidor='http://127.0.0.1/plataforma/api/validar.php';
      
        let dataobj = {
          usuario : user,
          password : pass
        };

         let headers={ 
         'Accept': 'application/json'
        };


    fetch(urlServidor,{
      method: 'POST',
      headers:headers,
      body: JSON.stringify(dataobj),
      mode:'cors'


    })
    .then(response=>response.json())
     .then(({token,status,usuario,nomapel,foto})=>{
     if(status=="200"){
//       alert("acceso al sistema");
          localStorage.setItem('user',user);
          localStorage.setItem('token',token); 
          localStorage.setItem('nomapel',nomapel); 
          localStorage.setItem('foto',foto+".png");         
          limpiar();
          location.href ="evaluacion.php";
      }
      else if(status=="400"){
        alert("usuario o password invalido");
          localStorage.removeItem("token");
          localStorage.removeItem("user");
          limpiar();
      }
      
    })
    .catch(function(err) {
        console.error(err);
    });

      } 
 
  const limpiar=()=>{
    document.getElementById("formulario").reset();
  }



})();

  