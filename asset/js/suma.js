(()=>{
'use strict'

 document.getElementById("validar").addEventListener("click",function(e){
    
    e.preventDefault();    
       document.getElementById("preload").style.display='block'; 
       enviarServidor();
       document.getElementById("preload").style.display='none'; 
     


          
   });



  const enviarServidor=()=>{
     //let urlServidor='https://caceresapp.site/backend/api/validar.php';
    let token=localStorage.getItem('token');
    let urlServidor='http://127.0.0.1/entrada/api/suma.php';
    console.log(token);
      
        let dataobj = {
          n1 : 1,
          n2 : 2
        };

         let headers={ 
          'Accept': 'application/json',
          'Authorization': token
        };


    fetch(urlServidor,{
      method: 'POST',
      headers:headers,
      body: JSON.stringify(dataobj),
      mode:'cors'


    })
    .then(response=>response.json())
     .then(({status,suma})=>{
      console.log(status);
     if(status=="202"){
      alert(suma);
          
      }
      else if(status=="406"){
        alert("Acceso no Autorizado");
        }
      
    })
    .catch(function(err) {
        console.error(err);
    });

      } 
 
  



})();

  