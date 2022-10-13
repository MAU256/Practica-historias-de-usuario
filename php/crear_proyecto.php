<?php
session_start();
include 'conexiondb.php';

//$matricula=;
do{
    $id_p = mt_rand(1,99999999);
    $verificar=mysqli_query($conexion,"SELECT * FROM proyectos  WHERE '$id_p'=id_proyecto");
    
}while(mysqli_num_rows($verificar)>0);
$id_u=$_SESSION['id'];
$nombre_p=$_POST['nombreProyecto'];
$objetivos_p=$_POST['objetivosProyecto'];
$tareas_p=$_POST['tareasRealizar'];
$fecha = date('Y-m-d');

$query="INSERT INTO proyectos(id_proyecto,nombre_proyecto,objetivos_proyecto,tareas_proyecto,id_usuario,fecha) VALUES('$id_p','$nombre_p','$objetivos_p','$tareas_p','$id_u','$fecha')";


$ejecutar=mysqli_query($conexion,$query);
if($ejecutar){
    echo'
        <script>
           window.location="../inicio.php";           
        </script>';   
}
else{
    echo'
        <script>           
            window.location="../inicio.php";
            alert("Hubo un error en el registro, intentelo de nuevo");
        </script>';
}
mysqli_close($conexion);
?>