<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
</head>
<body>
<?PHP require('./navbar/navbar.php');
?>
<div class="Login">

            {/* Resto del código de la página de inicio de sesión */}

            <div class='imagen'>
                <img src="https://queplan.mx/sites/default/files/inline-images/izzi-1.png" class="img-fluid" alt="Logo" width="320" height="206.5"></img>
            </div>
            <div class='texto'>
                En izzi, lo que más nos importa
                es tu conexión.
            </div>
            <form >
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
                                    <input
                                        type="text"
                                        class="form-control"
                                        name='usuario'
                                        placeholder="Correo electrónico"
                                        aria-label="Username"
                                        aria-describedby="addon-wrapping"
                                        onChange={handleChange}
                                    />
                                </div>
                                <!--Botón de contraseña-->
                                <div class="input-group flex-nowrap">
                                    <span class="input-group-text" id="addon-wrapping2">🔑</span>
                                    <input
                                        type="password"
                                        name='password'
                                        class="form-control"
                                        placeholder="Contraseña"
                                        aria-label="password"
                                        aria-describedby="addon-wrapping"
                                        onChange={handleChange}
                                    />
                                </div>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <button type="submit" class="btn btn-primary" >Iniciar Sesión</button>
                                </div>
                                <div class="card-footer">
                                    <span>¿No tienes cuenta?</span> <Link to='/Registro'>Regístrese</Link>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </div>

</body>
</html>
