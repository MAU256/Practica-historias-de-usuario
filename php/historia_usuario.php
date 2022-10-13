<?php
session_start();
include 'conexiondb.php';


do{
    $id = mt_rand(1,999);
    $verificar=mysqli_query($conexion,"SELECT * FROM historias_usuario  WHERE '$id'=id_historia");    
}while(mysqli_num_rows($verificar)>0);


$id_proyecto=$_SESSION['id_p'];
$nombre_proyecto = $_SESSION['nombre_p'];
$historia=$_POST['historia'];
$numero=$_POST['numero'];
$valor=$_POST['valor'];
$fecha = date('Y-m-d');
$desarrollo=$_POST['desarrollo'];
$duracion = $_POST['duracion'];
$descripcion = $_POST['descripcion'];
$observaciones = $_POST['observaciones'];

$query="INSERT INTO historias_usuario(id_historia,historia,numero,prioridad,fecha,tiempo,d_s,descripcion,observaciones,id_proyecto) VALUES('$id','$historia','$numero','$valor','$fecha','$desarrollo','$duracion','$descripcion','$observaciones','$id_proyecto')";


//$hash=md5(rand(0,100));

if(mysqli_query($conexion,$query)){
   echo'
    <script>       
       alert("El registro ha sido exitoso!");
    </script>';
    header("Location: ../proyecto.php?id=$id_proyecto&nombre=$nombre_proyecto");    
}
else{
    
    echo'
    <script>       
       alert("Hubo un error con el registro, intente nuevamente!");
    </script>';
    header("Location: ../proyecto.php?id=$id_proyecto&nombre=$nombre_proyecto"); 
}

mysqli_close($conexion);
?>

