<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La company</title>

    <link rel="stylesheet" href="vistas/modulos/assets/estilo.css">
    <!-- Resources -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" -->
        <!-- integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous"> -->
        <link rel="stylesheet" href="vistas/modulos/assets/bootstrap.min.css">
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
                        <!-- minit REGISTRO -->
                        <div class="col-12 col-lg-6">
                            <div class="form-group mb-2">
                                <label class="" for="minit"><i class="fas fa-barcode fs-6"></i>
                                    <span class="small">Initial</span><span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control form-control-sm" id="minit" name="minit"
                                    placeholder="" required>
                                <div class="invalid-feedback">Input initial</div>
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

                        <!-- Bdate -->
                        <div class="col-12 col-lg-6">
                            <div class="form-group mb-2">
                                <label class="" for="bdate"><i class="fas fa-barcode fs-6"></i>
                                    <span class="small">Birth Date</span><span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control form-control-sm" id="bdate" name="bdate"
                                    placeholder="YYYY-MM-DD" required
                                    pattern="(?:19|20)\[0-9\]{2}-(?:(?:0\[1-9\]|1\[0-2\])/(?:0\[1-9\]|1\[0-9\]|2\[0-9\])|(?:(?!02)(?:0\[1-9\]|1\[0-2\])/(?:30))|(?:(?:0\[13578\]|1\[02\])-31))"
                                    title="Enter a date in this format YYYY/MM/DD" required>
                                <div class="invalid-feedback">Input bdate</div>
                            </div>
                        </div>
                        <!-- address -->
                        <div class="col-12 col-lg-6">
                            <div class="form-group mb-2">
                                <label class="" for="address"><i class="fas fa-barcode fs-6"></i>
                                    <span class="small">Address</span><span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control form-control-sm" id="address" name="address"
                                    required>
                                <div class="invalid-feedback">Input address</div>
                            </div>
                        </div>
                        <!-- sex -->
                        <div class="radio">
                            <input type="radio" name="gender" value="M" id="sex" />Male
                            <input type="radio" name="gender" value="F" id="sex" />Female <br />
                        </div>

                        <!-- salary -->
                        <div class="col-12 col-lg-6">
                            <div class="form-group mb-2">
                                <label class="" for="salary"><i class="fas fa-barcode fs-6"></i>
                                    <span class="small">Salary</span><span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control form-control-sm" id="salary" name="salary"
                                    required>
                                <div class="invalid-feedback">Input salary</div>
                            </div>
                        </div>
                        <label for=""><span>dno</span></label><br>
                        <select id="listarDept">

                        </select>

                        <!-- dno -->
                        <!-- <div class="col-12 col-lg-6">
                            <div class="form-group mb-2">
                                <label class="" for="dno"><i class="fas fa-barcode fs-6"></i>
                                    <span class="small">dno</span><span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control form-control-sm" id="dno" name="dno"
                                    required>
                                <div class="invalid-feedback">Input dno</div>
                            </div>
                        </div> -->
                        <br>
                        <input type="button" value="Submit" onclick="sendInfo()"/> 

                        <div id="response"></div>
                    </div>
                </div>
            </div>
        </div>


        <script>
            //Registrar empleados
            function sendInfo() {
                var fname = document.getElementById("fname").value;
                var minit = document.getElementById("minit").value;
                var lname = document.getElementById("lname").value;
                var ssn = document.getElementById("ssn").value;
                var bdate = document.getElementById("bdate").value;
                var address = document.getElementById("address").value;
                var sex = document.getElementById("sex").value;
                var salary = document.getElementById("salary").value;
                // var super_ssn = document.getElementById("super_ssn").value;
                var dno = document.getElementById("listarDept").value;

                var xhr = new XMLHttpRequest();
                xhr.open("POST", "ajax/regemp.ajax.php", true);
                xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhr.onload = function () {
                    if (this.status === 200) {
                        console.log(this.responseText);
                        document.getElementById("response").innerHTML = this.responseText;
                    }
                }
                // xhr.send("fname=" + fname + "&minit=" + minit + "&lname=" + lname + "&ssn=" + ssn + "&bdate=" + bdate + "&address=" + address + "&sex=" + sex + "&salary=" + salary + "&super_ssn=" + "&dno=" + dno);
                xhr.send("fname=" + fname + "&minit=" + minit + "&lname=" + lname + "&ssn=" + ssn + "&bdate=" + bdate + "&address=" + address + "&sex=" + sex + "&salary=" + salary + "&dno=" + dno);
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
        var listarDept = document.getElementById("listarDept")
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