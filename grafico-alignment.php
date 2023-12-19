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
  <div style="width: 70%; margin: auto;">
    <canvas id="lienzo"></canvas>
</div>
<hr>
<div class="container">
<table class="table">
            <thead>
              <tr>
      
                <th scope="col" class="text-center">Alignment</th>
                <th scope="col">Total</th>
             
              </tr>
            </thead>
            <tbody>
              <tr>
               <?php
               require_once 'models/listar-aligment.php';
               ?>
              </tr>
            </tbody>
          </table>
</div>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
   const lienzo = document.querySelector("#lienzo")
   const grafico = new Chart(lienzo,{
    type: 'line',
    data: {
      labels: [],
      datasets:[{
        label: "Bando al que pertencen",
        data:[]
      }]
    }
   });
 
   ( function () {
     fetch(`controller/alignment.controller.php?operacion=resumenalignment`)
       .then(respuesta => respuesta.json())
       .then(datos =>{
           console.log(datos)

          grafico.data.labels=datos.map(registro=>registro.alignment)
          grafico.data.datasets[0].data=datos.map(registro=>registro.total)
          grafico.update()
        })
       .catch(e=>{
        console.error(e)
       })
    })();
    
    
   

</script>

  </body>
</html>
