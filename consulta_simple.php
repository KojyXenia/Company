<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La company</title>

    <link rel="stylesheet" href="vistas/modulos/assets/estilo.css">
    <!-- Resources -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous"> -->
        <link rel="stylesheet" href="vistas/modulos/assets/bootstrap.min.css">
        <style>
            
                #tablaEmpleados {
                    /* overflow: : auto!important;; */
                }
            
        </style>
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
                        <h1>Registro de empleados</h1>

                        <!-- FNAME REGISTRO -->
                        <div class="col-12 col-lg-6">
                            <div class="form-group mb-2">
                                <label class="" for="fname"><i class="fas fa-barcode fs-6"></i>
                                    <span class="small">First Name</span><span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control form-control-sm" id="fname" name="fname"
                                    placeholder="" required>
                                <div class="invalid-feedback">Input fname</div>
                            </div>
                        </div>
                        <!-- lname REGISTRO -->
                        <div class="col-12 col-lg-6">
                            <div class="form-group mb-2">
                                <label class="" for="lname"><i class="fas fa-barcode fs-6"></i>
                                    <span class="small">Last Name</span><span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control form-control-sm" id="lname" name="lname"
                                    placeholder="" required>
                                <div class="invalid-feedback">Input fname</div>
                            </div>
                        </div>
                        <!-- ssn -->
                        <div class="col-12 col-lg-6">
                            <div class="form-group mb-2">
                                <label class="" for="ssn"><i class="fas fa-barcode fs-6"></i>
                                    <span class="small">SSN</span><span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control form-control-sm" id="ssn" name="ssn"
                                    placeholder="" minlength="9" maxlength="9"  required>
                                <div class="invalid-feedback">Input ssn</div>
                            </div>
                        </div>

                        <label for=""><span>dno</span></label><br>
                        <select id="listarDept">

                        </select>
                        <br>
                        <input type="button" value="Submit" onclick="sendInfo()"/> 

                        <div class="tablas" id="tablaEmpleados">
                    </div>
                    </div>
                </div>
            </div>
        </div>



        <script>
            //Registrar empleados
            function sendInfo() {
                var fname = document.getElementById("fname").value;
                var lname = document.getElementById("lname").value;
                var ssn = document.getElementById("ssn").value;
                var dno = document.getElementById("listarDept").value;

                var xhr = new XMLHttpRequest();
                var url = "modelo/consulta_simple.modelo.php?action=Empleados&fname=" + encodeURIComponent(fname) + "&lname=" + encodeURIComponent(lname) + "&ssn=" + encodeURIComponent(ssn) + "&dno=" + encodeURIComponent(dno);
                xhr.open("GET", url, true);
                xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhr.onload = function () {
                    if (this.status === 200) {
                        console.log(this.responseText);
                        document.getElementById("tablaEmpleados").innerHTML = JSON.parse(this.responseText).html;
                    }
                }
                xhr.send();
            }  
        </script>

        <script>
        function listarDepartamentos(){
            var xhr = new XMLHttpRequest();
            // console.log(xhr);
            xhr.onload = function(){
                if(xhr.status === 200){
                    console.log(xhr.response);
                    llenarListado(JSON.parse(xhr.responseText));
                }
            };
            xhr.open("GET", "modelo/modelo.listarDept.php?action=getDept", true);
            xhr.send();
        }
        var listarDept = document.getElementById("listarDept");
        function llenarListado(response) {
            for(var i = 0; i < Object.keys(response).length; i++){
            var opciones  = document.createElement('option');
            opciones.value = response[i].Dnumber;
            opciones.textContent = response[i].Dname;
            listarDept.appendChild(opciones);
            console.log(opciones);
        }
    }
    listarDepartamentos();
    </script>
</body>

</html>