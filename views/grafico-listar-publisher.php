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
            <label for="">Bando:</label>
              <select name="" id="_publisher_id" class="form-control" required>
                 <option value="">Seleccione...</option>
              </select>
          </div>    
          </div>
          
          
        </form>
        </div>
      </div>

       <div style="width: 70%;margin:auto;">
        <canvas id="lienzo"></canvas>
       </div>
       
  
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
document.addEventListener("DOMContentLoaded", () => {
  function $(id) {
    return document.querySelector(id);
  }

  // ...

  // Fetch para llenar el dropdown
  (function () {
    fetch("../controller/publisher.controller.php?operacion=listarpublisher")
      .then((respuesta) => respuesta.json())
      .then((datos) => {
        console.log(datos);
        datos.forEach((element) => {
          const tagoption = document.createElement("option");
          tagoption.value = element.id;
          tagoption.innerHTML = element.publisher_name;
          $("#_publisher_id").appendChild(tagoption);
        });
      })
      .catch((e) => {
        console.error(e);
      });
  })();

  const lienzo = document.querySelector("#lienzo");
  const grafico = new Chart(lienzo, {
    type: "bar",
    data: {
      labels: [],
      datasets: [
        {
          label: "Porcentaje",
          data: [],
        },
      ],
    },
  });


  $("#_publisher_id").addEventListener("change", function () {
    const idseleccionado= this.value;

    fetch(`../controller/alignment.controller.php?operacion=resumenalignment&_publisher_id=${idseleccionado}`)
      .then((respuesta) => respuesta.json())
      .then((datos) => {
        console.log(datos);

        grafico.data.labels = datos.map((registro) => registro.alignment);
        grafico.data.datasets[0].data = datos.map((registro) => registro.porcentaje); 
        grafico.update();
      })
      .catch((e) => {
        console.error(e);
      });
  });
});
</script>

  </body>
</html>
