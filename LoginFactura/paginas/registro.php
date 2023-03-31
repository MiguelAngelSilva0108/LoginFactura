<?php

  require '../database/database.php';

  $message = '';

  if (!empty($_POST['Nombres']) && !empty($_POST['AP']) && !empty($_POST['AM']) && !empty($_POST['Celular']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['Servicio']) && !empty($_POST['Calle']) && !empty($_POST['Colonia']) && !empty($_POST['NumExt']) && !empty($_POST['Municipio']) && !empty($_POST['CP']) && !empty($_POST['Estado'])) {

    $sql = "INSERT INTO users (Nombres, AP, AM, Celular, email, password, Servicio, Calle, Colonia, NumInt, NumExt, Municipio, CP, Estado) VALUES (:Nombres, :AP, :AM, :Celular, :email, :password, :Servicio, :Calle, :Colonia, :NumInt, :NumExt, :Municipio, :CP, :Estado)";
    $stmt = $conn->prepare($sql);
    
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
  
    $stmt->bindParam(':Nombres', $_POST['Nombres']);
    $stmt->bindParam(':AP', $_POST['AP']);
    $stmt->bindParam(':AM', $_POST['AM']);
    $stmt->bindParam(':Celular', $_POST['Celular']);
    $stmt->bindParam(':email', $_POST['email']);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':Servicio', $_POST['Servicio']);
    $stmt->bindParam(':Calle', $_POST['Calle']);
    $stmt->bindParam(':Colonia', $_POST['Colonia']);
    $stmt->bindParam(':NumInt', $_POST['NumInt']);
    $stmt->bindParam(':NumExt', $_POST['NumExt']);
    $stmt->bindParam(':Municipio', $_POST['Municipio']);
    $stmt->bindParam(':CP', $_POST['CP']);
    $stmt->bindParam(':Estado', $_POST['Estado']);
  
    if ($stmt->execute()) {
      $message = 'Successfully created new user';
    } else {
      $message = 'Sorry there must have been an issue creating your account';
    }
  }
  

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap">
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
<link rel="stylesheet" href="../css/registro.css">
<link rel="stylesheet" href="../css/navbar.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

<body>
    <?PHP require('../navbar/navbar.php'); ?>
    <div>
        <a href="/LoginFactura/index.php">
            <img src="https://upload.wikimedia.org/wikipedia/commons/9/95/Logotipo_izzi_negativo.png" width="120" height="50" class="rounded mx-auto d-block" alt="...">
        </a>


        <p class="text-center" style="font-family: Poppins; font-size: 24px;">Registre todos sus datos.</p>


        <div class='registro'>
            <form action="registro.php" method="POST">
                <div class="row">
                    <div class="col-sm-6 col-lg-3 offset-15 mt-5 mx-auto">
                        <div class="card pt=5">
                            <div class="card-header">
                                ¡Sólo te tomará un par de minutos!
                            </div>
                            <div class="card-body">
                                <!--Nombres-->
                                <div class="form-floating mb-3">
                                    <input type="text" name='Nombres' class="form-control" id="floatingInput"
                                        placeholder="name@example.com"  
                                        required />
                                    <label htmlFor="floatingInput">Nombres</label>
                                </div>
                                <!--AP-->
                                <div class="form-floating mb-3">
                                    <input type="text" name='AP' class="form-control" id="floatingInput"
                                        placeholder="name@example.com"  
                                        required />
                                    <label htmlFor="floatingInput">Apellido Paterno</label>
                                </div>
                                <!--AM-->
                                <div class="form-floating mb-3">
                                    <input type="text" name='AM' class="form-control" id="floatingInput"
                                        placeholder="name@example.com"  />
                                    <label htmlFor="floatingInput">Apellido Materno</label>
                                </div>
                                <!--Celular-->
                                <div>
                                    <div class="form-floating mb-3">
                                        <input type="text" name="Celular" class="form-control" id="floatingInput"
                                            placeholder="name@example.com"  />
                                        <label htmlFor="floatingInput">Teléfono Celular</label>
                                    </div>
                                </div>

                                <!--Email-->
                                <div class="form-floating mb-3">
                                    <input type="email" name='Email' class="form-control" id="floatingInputValue"
                                        placeholder="name@example.com"  />
                                    <label htmlFor="floatingInputValue">Correo electrónico</label>
                                </div>


                                <!--Botón de contraseña-->
                                <div class="form-floating mb-3">
                                    <input type="password" name='password' class="form-control" id="floatingPassword"
                                        placeholder="Password" />
                                    <label htmlFor="floatingPassword">Contraseña</label>
                                </div>

                                <!--Botón de confirmar contraseña-->
                                <div class="form-floating mb-3">
                                    <input type="password" name='confirmpassword' class="form-control"
                                        id="floatingPassword" placeholder="Password" />
                                    <label htmlFor="floatingPassword">Confirma contraseña</label>
                                </div>

                                <!--Servicio deseado-->
                                <div class="form-floating mb-3">
                                    <select class="form-select" name='Servicio' id="floatingSelect"
                                        aria-label="Floating label select example"
                                         defaultValue="Seleccione un Servicio">
                                        <option value="">Seleccione un Servicio</option>
                                        <option value="Internet + Telefonía 30 MB">Internet + Telefonía 30 MB</option>
                                        <option value="Internet + Telefonía 50 MB">Internet + Telefonía 50 MB</option>
                                        <option value="Internet + Telefonía 100MB">Internet + Telefonía 100MB</option>
                                        <option value="Internet + Telefonía + izzitv 50MB">Internet + Telefonía + izzitv
                                            50MB</option>
                                    </select>
                                    <label htmlFor="floatingSelect">Servicio contratado o deseado</label>
                                </div>


                                <!--Dirección-->
                                <!--Calle y Colonia-->
                                <div class="row g-2">
                                    <div class="col-md">
                                        <div class="form-floating mb-3">
                                            <input type="text" name='Calle' class="form-control" id="floatingInputGrid"
                                                placeholder="name@example.com" 
                                                 />
                                            <label htmlFor="floatingInputGrid">Calle</label>
                                        </div>
                                    </div>
                                    <div class="col-md">
                                        <div class="form-floating mb-3">
                                            <input type="text" name='Colonia' class="form-control"
                                                id="floatingInputGrid" placeholder="name@example.com"
                                                />
                                            <label htmlFor="floatingInputGrid">Colonia</label>
                                        </div>
                                    </div>
                                </div>

                                <!--Número int y ext-->
                                <div class="row g-2">
                                    <div class="col-md">
                                        <div class="form-floating mb-3">
                                            <input type="text" name='NumExt' class="form-control" id="floatingInputGrid"
                                                placeholder="name@example.com"  />
                                            <label htmlFor="floatingInputGrid">Num ext</label>
                                        </div>
                                    </div>
                                    <div class="col-md">
                                        <div class="form-floating mb-3">
                                            <input type="text" name='NumInt' class="form-control" id="floatingInputGrid"
                                                placeholder="name@example.com"  />
                                            <label htmlFor="floatingInputGrid">Num int</label>
                                        </div>
                                    </div>
                                </div>

                                <!--Municipio y CP-->
                                <div class="row g-2">
                                    <div class="col-md">
                                        <div class="form-floating mb-3">
                                            <input type="text" name='Municipio' class="form-control"
                                                id="floatingInputGrid" placeholder="name@example.com"/>
                                            <label htmlFor="floatingInputGrid">Alcaldia o Municipio</label>
                                        </div>
                                    </div>
                                    <div class="col-md">
                                        <div class="form-floating mb-3">
                                            <input type="text" name='CP' class="form-control" id="floatingInputGrid"
                                                placeholder="name@example.com" />
                                            <label htmlFor="floatingInputGrid">C.P.</label>
                                        </div>
                                    </div>
                                </div>

                                <!--Estado*-->
                                <div class="form-floating mb-3">
                                    <select class="form-select" name='Estado' id="floatingSelect"
                                        aria-label="Floating label select example" 
                                         defaultValue="">

                                        <option value="">Seleccione un Estado</option>
                                        <option value="Aguascalientes">Aguascalientes</option>
                                        <option value="Baja California">Baja California</option>
                                        <option value="Baja California Sur">Baja California Sur</option>
                                        <option value="Campeche">Campeche</option>
                                        <option value="Chiapas">Chiapas</option>
                                        <option value="Chihuahua">Chihuahua</option>
                                        <option value="Ciudad de México">Ciudad de México</option>
                                        <option value="Coahuila">Coahuila</option>
                                        <option value="Colima">Colima</option>
                                        <option value="Durango">Durango</option>
                                        <option value="Guanajuato">Guanajuato</option>
                                        <option value="Guerrero">Guerrero</option>
                                        <option value="Hidalgo">Hidalgo</option>
                                        <option value="Jalisco">Jalisco</option>
                                        <option value="México">México</option>
                                        <option value="Michoacán">Michoacán</option>
                                        <option value="Morelos">Morelos</option>
                                        <option value="Nayarit">Nayarit</option>
                                        <option value="Nuevo León">Nuevo León</option>
                                        <option value="Oaxaca">Oaxaca</option>
                                        <option value="Puebla">Puebla</option>
                                        <option value="Querétaro">Querétaro</option>
                                        <option value="Quintana Roo">Quintana Roo</option>
                                        <option value="San Luis Potosí">San Luis Potosí</option>
                                        <option value="Sinaloa">Sinaloa</option>
                                        <option value="Sonora">Sonora</option>
                                        <option value="Tabasco">Tabasco</option>
                                        <option value="Tamaulipas">Tamaulipas</option>
                                        <option value="Tlaxcala">Tlaxcala</option>
                                        <option value="Veracruz">Veracruz</option>
                                        <option value="Yucatán">Yucatán</option>
                                        <option value="Zacatecas">Zacatecas</option>
                                    </select> 
                                    <label For="floatingSelect">Estado</label>
                                </div>


                                <!--Fin de formulario-->

                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <button type="button" class="btn btn-primary btn-registrar">
                                        Registrar
                                    </button>
                                </div>

                                <div class="card-footer">
                                    <span>¿Ya tienes una cuenta?</span> <a href="./login.php">Inicie Sesión</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </form>

        </div>
    </div>
</body>

</html>