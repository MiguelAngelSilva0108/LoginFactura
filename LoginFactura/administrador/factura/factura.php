<?php
require('../../database/database.php');

// Verificar si el usuario ha iniciado sesión
session_start();
if (!isset($_SESSION['user_id'])) {
  header('Location: /LoginFactura/login.php');
}

// Obtener los datos del usuario correspondiente a la sesión
$userId = $_SESSION['user_id'];
$records = $conn->prepare('SELECT * FROM users WHERE id_users = :userId');
$records->bindParam(':userId', $userId);
$records->execute();
$user = $records->fetch(PDO::FETCH_ASSOC);

//Así llamas a una función
//Nombre: <?php echo $user['Nombres']; 
//<p><img class="codigo-barras"  width="130.15625" height="86.71875" alt=""></p>
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Factura</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
  <link rel="stylesheet" href="../../css/factura.css">
</head>

<body>
  <!--Logo-->
  <a href="/LoginFactura/index.php">
    <img src="https://upload.wikimedia.org/wikipedia/commons/9/95/Logotipo_izzi_negativo.png" width="150" height="62.5"
      class="img-fluid img-pago" alt="...">
  </a>
  <br>
  <br>
  <div>
    <div>
      <!--Encabezado-->
      <div class="container-fluid text-center border-bottom">
        <div class="row justify-content-center align-items-center">
          <div class="col-md-4 nombre-apellido">
            <?php echo $user['Nombres']; ?>
            <?php echo $user['AP']; ?>
            <?php echo $user['AM']; ?>
            <p class="texto-abajo">RFC:
              <?php echo $user['RFC']; ?>
            </p>
            <p class="texto-abajo">
              <?php echo $user['Calle']; ?> No.
              <?php echo $user['NumExt']; ?>
              <?php if (!empty($user['NumInt'])) {
                echo " #" . $user['NumInt'];
              } ?>
            </p>
            <p class="texto-abajo">Col.
              <?php echo $user['Colonia']; ?>
            </p>
            <p class="texto-abajo">
              <?php echo $user['Municipio']; ?>
            </p>
            <p class="texto-abajo">C.P.
              <?php echo $user['CP']; ?>,
              <?php echo $user['Estado']; ?>
            </p>  
          </div>
          <div class="col col-divider barras">
            Realiza tu pago escaneando este código
            <img src="https://www.consumoteca.com/wp-content/uploads/codigo-de-barras.png" class="img-fluid"
              width="180.234375" height="130.078125" alt="...">
          </div>
          <div class="col col-divider QR">
            Paga fácilmente con IZZI app
            <p><img src="https://es.mailpro.com/blog/image.axd?picture=/QRCODES.png" class="img-fluid" width="130"
                height="130" alt="..."></p>
          </div>
        </div>
       
      </div>

      <!--DatosFacturación-->

      <div>
        <p class="titulo">Datos facturación xdxdxd</p>
        <p class="QR">
          Domicilio Fiscal
        </p>
        <p class="texto-abajo">
          <?php echo $user['Calle_Fiscal']; ?> No.
          <?php echo $user['NumExt_Fiscal']; ?>
          <?php if (!empty($user['NumInt_Fiscal'])) {
            echo " #" . $user['NumInt_Fiscal'];
          } ?>
        </p>
        <p class="texto-abajo">Col.
          <?php echo $user['Colonia_Fiscal']; ?>
        </p>
        <p class="texto-abajo">
          <?php echo $user['Municipio_Fiscal']; ?>
        </p>
        <p class="texto-abajo">C.P.
          <?php echo $user['CP_Fiscal']; ?>,
          <?php echo $user['Estado_Fiscal']; ?>
        </p>

      </div>



    </div>
  </div>




</body>

</html>