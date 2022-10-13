<?php
include 'conexiondb.php';
do{
    $id = mt_rand(1,9999);
    $verificar=mysqli_query($conexion,"SELECT * FROM usuarios WHERE '$id'=id");
    
}while(mysqli_num_rows($verificar)>0);

$nombreC=$_POST['nombre'];
$email=$_POST['email'];
$password=$_POST['password'];
$query="INSERT INTO usuarios(id,nombre,email,contraseña) VALUES('$id','$nombreC','$email','$password')";
//$hash=md5(rand(0,100));
$verificar=mysqli_query($conexion,"SELECT * FROM usuarios WHERE email='$email' ");
if(mysqli_num_rows($verificar)>0){
    echo' 
    <script>
        window.location="../index.php";
       alert("Error, correo ya registrado")
    </script>
    ';
    exit();
}
if(mysqli_query($conexion,$query)){
    echo'
    <script>
       window.location="../index.php";
       alert("El registro ha sido exitoso!");
    </script>';
}
else{
    echo'
        <script>
           window.location="../index.php";
           alert("Hubo un error en el registro, intentelo de nuevo");
        </script>';
}

mysqli_close($conexion);
?>