<?php
session_start();
include 'conexiondb.php';
$id_proyecto=$_GET['id'];
$query_borrar_p="DELETE FROM proyectos WHERE id_proyecto='$id_proyecto'";
mysqli_query($conexion,$query_borrar_p);

mysqli_close($conexion);
echo'
<script>
   window.location="../inicio.php";   
</script>';


?>
