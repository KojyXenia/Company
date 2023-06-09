<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La company</title>

    <link rel="stylesheet" href="vistas/modulos/assets/estilo.css">
    <!-- Resources -->
    <link rel="stylesheet" href="vistas/modulos/assets/bootstrap.min.css">

    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous"> -->

</head>
<body>
    <div class="wrapper">
    <div class="container-fluid" style="padding:0;">
        <div class="row">
            <div class="col-2">
                <?php
                    include "vistas/modulos/aside.php"
                ?>
            </div>
            <div class="col-10">
                <div class="content-wrapper">
                  <h1>Consulta Paginacion</h1>
                <div id="rangoEmpleados"></div>
                <button type="button" id="anterior"class="btn btn-primary">Anterior</button>
                <button type="button" id="siguiente" class="btn btn-secondary">Siguiente</button>
                    <div class="tablas" id="tablaEmpleados">
                    </div>
                </div>    
            </div>
        </div>
    </div>
    </div>


<!-- TRAE LOS RECORDS DE LA BASE DE DATOS PARA CONSULTA_PAGINACION -->
<script>

function cargarPaginacion() {
  var xhr = new XMLHttpRequest();
  xhr.open('POST', 'ajax/paginacion.ajax.php', true);
  xhr.responseType = 'json';
  xhr.onload = function() {
    if (this.status === 200) {
      json = this.response;
      actualizarTabla();
    }
  };

  xhr.send();
}

var paginacionActual = 1;
var registrosPorPagina = 5;
var json; 

function actualizarTabla() {
  var comienzo = (paginacionActual - 1) * registrosPorPagina; //Evitamos ir una pagina de max
  var final = comienzo + registrosPorPagina;
  var records = json.slice(comienzo, final);

  var html = '';

  html += "<table>\n";
  html += "<tr>\n";
  html += "<th>Nombre</th>\n";
  html += "<th>Apellido</th>\n";
  html += "<th>No Seguro</th>\n";
  html += "<th>Fecha Nac</th>\n";
  html += "<th>Dirección</th>\n";
  html += "<th>Departamento</th>\n";
  html += "</tr>\n";
  for (var i = 0; i < records.length; i++) {
    var record = records[i];
    
    html += '<tr>\n<td>' + record.fname + '</td>';  
    html += '<td>' + record.lname + '</td>';  
    html += '<td>' + record.ssn + '</td>';  
    html += '<td>' + record.bdate + '</td>';  
    html += '<td>' + record.address + '</td>';  
    html += '<td>' + record.dname + '</td>';  
}

  html += "</tr>\n"
  html += "</table>"

//Actualizar la tabla empleados
  var tablaEmpleados = document.getElementById("tablaEmpleados");
  if (tablaEmpleados) {
    tablaEmpleados.innerHTML = html;
  }

  updaterangoEmpleados(comienzo + 1, final, json.length);
}

//Actualizar el rango de paginacion
function updaterangoEmpleados(comienzo, final, totalRegistros) {
  var rangoEmpleados = document.getElementById("rangoEmpleados");
  if (rangoEmpleados) {
    rangoEmpleados.innerHTML = "<h3> Mostrando empleados " + comienzo + "-" + final + " de un total de " + totalRegistros + "</h3>";
  }
}
// Initial fetch on page load
cargarPaginacion();

//Paginacion para atras
var anterior = document.getElementById("anterior");
  anterior.addEventListener("click", function() {
    if (paginacionActual > 1) {
      paginacionActual--;
      actualizarTabla();
    }
  });


//Paginacion para adelante
var siguiente = document.getElementById("siguiente");
  siguiente.addEventListener("click", function() {
    var totalPaginas = Math.ceil(json.length / registrosPorPagina);
    if (paginacionActual < totalPaginas) {
      paginacionActual++;
      actualizarTabla();
    }
  });

</script>
</body>
</html>