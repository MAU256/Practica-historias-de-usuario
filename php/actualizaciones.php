<?php
session_start();
include 'conexiondb.php';

//$matricula=;
$id_proyecto=$_SESSION['id_p'];
$idHistoria=$_SESSION['idHistoria'];
$nombre_proyecto = $_SESSION['nombre_p'];
$historia=$_POST['historia'];
$numero=$_POST['numero'];
$valor=$_POST['valor'];
$fecha = date('Y-m-d');
$desarrollo=$_POST['desarrollo'];
$duracion = $_POST['duracion'];
$descripcion = $_POST['descripcion'];
$observaciones = $_POST['observaciones'];
$query="UPDATE historias_usuario set historia='$historia',numero='$numero',prioridad='$valor',fecha='$fecha',tiempo='$desarrollo',d_s='$duracion',descripcion='$descripcion',observaciones='$observaciones' where id_historia='$idHistoria'";
$ejecutar=mysqli_query($conexion,$query);
if($ejecutar){
    echo'
        <script>           
           alert("Se actualizaron los datos correctamente");
        </script>';
    header("Location: ../proyecto.php?id=$id_proyecto&nombre=$nombre_proyecto");  
}
else{
    echo'
        <script>           
           alert("Hubo un error en el registro, intentelo de nuevo");
        </script>';
        header("Location: ../proyecto.php?id=$id_proyecto&nombre=$nombre_proyecto"); 
}
mysqli_close($conexion);
?>