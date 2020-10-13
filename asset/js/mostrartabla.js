(()=>{

'use strict'

document.addEventListener("DOMContentLoaded", function(event) {
  
    document.getElementById("user").innerHTML="Usuario:"+localStorage.getItem("user");
    document.getElementById("preload").style.display='block';  
    cargarTabla();
   
    });
  
    

   const cargarTabla=()=>{
    let usertoken=localStorage.getItem('usertoken');   
    console.log("user token "+usertoken);
    let token=localStorage.getItem('token');
    const urlApiToken="https://caceresapp.site/backend/api/apitoken.php";
   //const urlApiToken="http://127.0.0.1/asistencia/api/apitoken.php";
    http://127.0.0.1/asistencia/api/
    let headers={
               'Accept': 'application/json',           
                'Authorization': token,
                'Usertoken':usertoken
    }

    fetch(urlApiToken,{
        method: 'get',
        headers:headers,
        cache: 'no-cache',
        mode:'cors'
    })
    .then(response=>response.json())
    .then(({status,data})=>{
           if(status=="200"){
          let txt="";
             for(let i=0;i<data.length;i++){
               txt=txt+renderVista(i,data[i].fecha,data[i].hora,data[i].bitacora)+"<br>";
               document.getElementById("datos").innerHTML=txt;

             }
              document.getElementById("preload").style.display='none';   
          
         }
    
        else if(status=='401'){
          redireccionar();
           document.getElementById("preload").style.display='none';   
        }
        
         
        
    })
    .catch(function(err) {
      //  console.error(err);
       document.getElementById("preload").style.display='none';   
    });

    }



    const redireccionar=()=>{

        localStorage.removeItem("token");
        localStorage.removeItem("user");   
        localStorage.removeItem("usertoken");   
        location.href ="index.php";
    }

    

    const renderVista=(i,fecha,hora,bitacora) => "<p>Clase "+(i+1)+"</p>"+
            "<p>Fecha: "+fecha+"&nbsp;Hora: "+hora+"</p>"+
            "<textarea name='textarea' rows='10' class='form-control'>"
            +bitacora+"</textarea>";
          


    const salirSesion=()=>{
        redireccionar();
     }


    document.getElementById("salir").addEventListener("click",function(e){

    salirSesion();
    });



})();

    