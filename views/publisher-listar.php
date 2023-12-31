<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <!-- Bootstrap CSS v5.2.1 -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
  </head>

  <body>
    <div class="container">
      <div class="container">
        <div class="card mb-4 mt-3">
          <div class="card-header mg-primary">
    
            <span>Publicidad</span>
          </div>
  
        <form action="" method="POST" id="formempleado" >
          
          <div class="mt-3">
            <div class="input-group">
                  
  
            </div>
           
          </div> 
          <div class="mb-4">
            <label for="">Casa de publicidad:</label>
              <select name="" id="_publisher_id" class="form-control" required>
                 <option value="">Seleccione...</option>
              </select>
          </div>    
          </div>
          
          <table class="table">
            <thead>
              <tr>
                <th scope="col"></th>
                <th scope="col">First</th>
                <th scope="col">Last</th>
                <th scope="col">Handle</th>
              </tr>
            </thead>
            <tbody id="table">
              <tr>
             
             
              </tr>
            </tbody>
          </table>
        </form>
        </div>
      </div>
       
       
  
    </div>
    <script>
        document.addEventListener("DOMContentLoaded",()=>{
      function $(id) {return document.querySelector(id)}
      // funcion auto ejecutada
      (function(){
          fetch(`../controller/publisher.controller.php?operacion=listarpublisher`)
            .then(respuesta =>respuesta.json())
            .then(datos =>{
               console.log(datos)
               datos.forEach(element => {
                 const tagoption=document.createElement("option")
                 tagoption.value=element.id
                 tagoption.innerHTML=element.publisher_name
                 $("#_publisher_id").appendChild(tagoption)
               });
            })
            .catch(e=>{
              console.error(e)
            })

           
      })();
      (function (){
           const  publisherId=$("#_publisher_id")
           publisherId.addEventListener("change",function(){
            const id =publisherId.value
              fetch(`../controller/publisher.controller.php?operacion=buscar&_publisher_id=${id}`)
                .then(respuesta => respuesta.json())
                .then(datos=>{
                  console.log(datos)
                  const table=$("#table");
                   datos.forEach(datos => {
                     const fila =document.createElement("tr");
                     fila.innerHTML=`
                      <td>${datos.superhero_name}</td>
                      <td>${datos.full_name}</td>
                      <td>${datos.gender}</td>
                      <td>${datos.race}</td>
                     `;
                     table.appendChild(fila)
                   });
                })
                .catch(e=>{
                  console.error(e)
                })
           })
      })();
    })
    </script>
  </body>
</html>
