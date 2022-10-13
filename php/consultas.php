<?php
include 'conexiondb.php';
//include 'buscar.php';
$id_user=$_SESSION['id'];
$query_nombre_p="SELECT proyectos.id_proyecto,proyectos.nombre_proyecto,proyectos.objetivos_proyecto,proyectos.fecha FROM proyectos,usuarios  WHERE proyectos.id_usuario='$id_user' AND usuarios.id='$id_user'ORDER BY fecha asc";
$result_proyecto=mysqli_query($conexion,$query_nombre_p);


$id_proyecto = $_SESSION['id_p'];
$query_historiaU="SELECT historias_usuario.id_historia,historias_usuario.historia,historias_usuario.numero,historias_usuario.prioridad,historias_usuario.descripcion,historias_usuario.fecha FROM historias_usuario,proyectos  WHERE historias_usuario.id_proyecto='$id_proyecto' AND proyectos.id_proyecto='$id_proyecto' ORDER BY prioridad asc";
$result_historiaU=mysqli_query($conexion,$query_historiaU);

$id_proyecto = $_SESSION['id_p'];
$query_crc="SELECT * FROM tarjetas_crc,proyectos  WHERE tarjetas_crc.id_proyecto='$id_proyecto' AND proyectos.id_proyecto='$id_proyecto' ORDER BY tarjetas_crc.fecha asc";
$result_crc=mysqli_query($conexion,$query_crc);

?>