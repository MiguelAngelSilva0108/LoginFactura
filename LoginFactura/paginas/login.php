<?php
session_start();
if (isset($_SESSION['user_id'])) {
  header('Location: inicio.php');
}

require './database/database.php';

$message = '';
if (!empty($_POST['email']) && !empty($_POST['password'])) {
  $records = $conn->prepare('SELECT id_users, email, password FROM users WHERE email = :email');
  $records->bindParam(':email', $_POST['email']);
  $records->execute();
  $results = $records->fetch(PDO::FETCH_ASSOC);

  if (count($results) > 0 && password_verify($_POST['password'], $results['password'])) {
    $_SESSION['user_id'] = $results['id_users'];
    header('Location: inicio.php');
  } else {
    $message = 'Sus credenciales son erróneas';
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap">
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
<link rel="stylesheet" href="../css/login.css">
<link rel="stylesheet" href="../css/navbar.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>


<body>
    <?PHP require('../navbar/navbar.php');
    ?>
    <?php if (!empty($message)): ?>
    <p><?= $message ?></p>
  <?php endif; ?>
    <div class="Login">

        <!--Resto del código de la página de inicio de sesión-->

        <div class='imagen'>
            <img src="https://queplan.mx/sites/default/files/inline-images/izzi-1.png" class="img-fluid" alt="Logo"
                width="320" height="206.5"></img>
        </div>
        <div class='texto'>
            En izzi, lo que más nos importa
            es tu conexión.
        </div>
        <form action="login.php" method="post">
            <div class="row">
                <div class="col-sm-4 offset-3 mt-5 mx-auto">
                    <div class="card pt=5">
                        <div class="card-header">
                            Inicia sesión con tus credenciales izzi
                            para extenderte tu factura
                        </div>
                        <div class="card-body">
                            <!--Botón de usuario-->
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="addon-wrapping">📧</span>
                                <input type="email" class="form-control" name='Email' placeholder="Correo electrónico"
                                    aria-label="Username" aria-describedby="addon-wrapping" />
                            </div>
                            <!--Botón de contraseña-->
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="addon-wrapping2">🔑</span>
                                <input type="password" name='password' class="form-control" placeholder="Contraseña"
                                    aria-label="password" aria-describedby="addon-wrapping" />
                            </div>
                            <div class="d-grid gap-2 mb-3">
                                <button class="btn btn-primary" type="submit" >Iniciar sesión</button>
                            </div>


                            <div class="card-footer">
                                <span class="cuenta">¿No tienes cuenta? </span><br><a href="./registro.php"> Regístrate</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>

</body>

</html>