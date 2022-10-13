<?php
session_start();
//include 'conexiondb.php';
if(isset($_SESSION["loggedin"])&& $_SESSION["loggedin"]=== true){
    header("location: ./inicio.php");
    exit;
}
require_once "conexiondb.php";
$correo=$password="";
$correo_err=$password_err="";
if($_SERVER["REQUEST_METHOD"]==="POST"){
    if(empty(trim($_POST["email"]))){
        $correo_err="Ingrese un email";
    }else{
        $correo=trim($_POST["email"]);
    }
    if(empty(trim($_POST["password"]))){
        $password_err="Ingrese una contraseña";
    }else{
        $password=trim($_POST["password"]);
    }
    //activo=1 and
    //validar campos
    if(empty($correo_err)&& empty($password_err)){
        $sql="SELECT id,nombre,email,contraseña FROM usuarios WHERE email = ?";
        if($stmt= mysqli_prepare($conexion,$sql)){
            mysqli_stmt_bind_param($stmt,"s",$param_correo);
            $param_correo=$correo;
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
            }
            if(mysqli_stmt_num_rows($stmt)==1){
                mysqli_stmt_bind_result($stmt,$id,$nombre,$email,$contraseña);
               
                //echo $password;
                if(mysqli_stmt_fetch($stmt)){
                    echo $contraseña;
                    echo $password;
                    if(strcmp($password,$contraseña)==0){
                        session_start();
                        $_SESSION['loggedin']=true;
                        $_SESSION['nombre']=$nombre;
                        $_SESSION['id']=$id;                     
                        $_SESSION['correo']=$correo;
                        header("location: ./inicio.php");                    
                    }else{
                       $password_err="Error, la contraseña es incorrecta"; 
                    }
                }
            }else{
                $correo_err="Error, el email es incorrecto";
            }
        }else{
            echo '<script>alert("Hubo un error, intente de nuevo"</script>';
        }
    }


    mysqli_close($conexion);
}



?>