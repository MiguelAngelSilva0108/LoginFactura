<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
}

require './database/database.php';

$records = $conn->prepare('SELECT id_users, email, password FROM users WHERE id_users = :id_users');
$records->bindParam(':id_users', $_SESSION['user_id']);
$records->execute();
$results = $records->fetch(PDO::FETCH_ASSOC);

$user = null;

if (count($results) > 0) {
    $user = $results;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Izzi México</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap">
</head>
<?PHP require('./navbar/navbar.php');
?>
<link rel="stylesheet" href="./css/bootstrap.min.css" />
<link rel="stylesheet" href="./css/navbar.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Dependencias de jQuery y Popper.js -->
<script src="./js/jquery-3.6.0.min.js"></script>
<script src="./js/popper.min.js"></script>

<!-- Scripts de Bootstrap -->
<script src="./js/bootstrap.min.js"></script>

<body>
    <div>

        <div class="img-container">
            <img class="img-fluid"
                src="https://izzi.telmov.mx/pub/media/amasty/webp/wysiwyg/Banners_Vtex_1290x480_1_-10.webp" alt="..." />
        </div>
        <?php if (!empty($user)): ?>
            <p>Bienvenido
                <?= $user['email'] ?>
            </p>
            <form action="/logout.php" method="POST">
                <input type="submit" value="Cerrar sesión">
            </form>
        <?php endif; ?>
    </div>
</body>

</html>