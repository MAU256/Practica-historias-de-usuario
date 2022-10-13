<?php
session_start();
include 'conexiondb.php';


do{
    $id = mt_rand(1,99999);
    $verificar=mysqli_query($conexion,"SELECT * FROM tarjetas_crc  WHERE '$id'=id_crc");    
}while(mysqli_num_rows($verificar)>0);


$id_proyecto=$_SESSION['id_p'];
$nombre_proyecto = $_SESSION['nombre_p'];
$clase=$_POST['clase'];
$super_clases=$_POST['superclase'];
$sub_clases=$_POST['subclase'];
$fecha = date('Y-m-d');



$colaboraciones = array();
for($i=1; $i <= 6; $i++){
    $colaboraciones["responsabilidad$i"]=$_POST["responsabilidad$i"];
    $colaboraciones["colaboracion$i"]=$_POST["colaboracion$i"];
}


//$hash=md5(rand(0,100));
$query="INSERT INTO tarjetas_crc(id_crc,clase,super_clases,sub_clases,fecha,id_proyecto) VALUES('$id','$clase','$super_clases','$sub_clases','$fecha',$id_proyecto)";
if(mysqli_query($conexion,$query)){
    for($i=1; $i <= 6; $i++){    
        $respo=$colaboraciones["responsabilidad$i"];
        $colabo=$colaboraciones["colaboracion$i"];
        $query="INSERT INTO colaboracion(responsabilidad,colaboracion,id_crc) VALUES('$respo','$colabo','$id')";
        mysqli_query($conexion,$query);                       
    }
    
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

