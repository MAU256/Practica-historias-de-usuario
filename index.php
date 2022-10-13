<?php
require_once "./php/inicio_usuario.php";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/styles-login.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/login.js"></script>
    <script type="text/javascript" src="js/links.js"></script>
</head>
<body>
    <footer id="footer">
        <h1>PLANEACION AGIL</h1>
    </footer>
    <div id="btn-posicion">
        <div class="botones-login">
            <button id="btn-posicion-iniciar">
                Iniciar sesion
            </button>
        </div>
        <div id="btn-posicion-crear">
            <button id="btn-posicion-crear">
                Crear cuenta
            </button>            
        </div>
            
    </div>
    <section id="section">           
        <div id="iniciar-sesion">                   
            <span class="span-iniciarSesion">INICIAR SESION</span>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" id="form-iniciar">
                <input type="text" name="email" id="iniciar-email" placeholder="Ingresar Email:">
                <span class="span-error"><?php echo $correo_err?></span>
                <input type="password" name="password" id="iniciar-password" placeholder="Ingresar password:">
                <span class="span-error"><?php echo $password_err?></span>          
                <input type="submit" value="Iniciar" id="btn-iniciarSesion">                
            </form>            
        </div>

        <div id="crear-cuenta">
            <span class="span-crearCuenta">CREAR CUENTA</span>
            <form action="./php/registro_usuario.php" method="POST" id="form-crear">
                <input type="text" name="nombre" id="crear-nombre" placeholder="Nombre:">             
                <input type="text" name="email" id="crear-email" placeholder="Email:">               
                <input type="password" name="password" id="crear-password" placeholder="Password:">                
                <input type="submit" value="crear" id="btn-crearCuenta">
            </form>
        </div>
    </section>
    
</body>
</html>