<?php
session_start();
if(!isset($_SESSION["loggedin"])||$_SESSION["loggedin"]!==true ){
	header("location: index.php");
	exit;
}
/*$id_proyecto = $_SESSION['id_p'];*/
$_SESSION['id_p'] = $_GET['id'];
$_SESSION['nombre_p'] = $_GET['nombre'];
$_SESSION['idcrc'] = $_GET['idcrc'];
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyectos</title>
    <link rel="stylesheet" href="css/styles.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/proyectos.js"></script>
    <script type="text/javascript" src="js/links.js"></script>
</head>

<body>
    <!---------------------------INICIO FOOTER----------------------------->
    <footer id="footer">      
        <div class="botones-proyecto">
            <div class="btn-footer-proyecto">
                <button id="btn-inicio">Inicio</button>
            </div>       
            <div class="btn-footer-proyecto">
                <button id="btn-tarjetasCrc"><a href="./proyecto.php?id=<?php print $_SESSION['id_p'];?>&nombre=<?php print $_SESSION['nombre_p']?>">Proyectos</a></button>
            </div>           
            <div class="btn-footer-proyecto">
                <button id="btn-cerrarSesion">Cerrar Sesion</button>
            </div>
            <span class="nombre-proyecto"> <?php print $_SESSION['nombre_p']?></span>            
        </div>        
    </footer>
    <!---------------------------FIN FOOTER----------------------------->

    <!---------------------------INICIO SECTION CREAR TARJETAS CRC----------------------------->
    <section id="containerCrc">
        <form action="#" method="POST" id="form-crearCrc">
            <?php
                include './php/consultas.php';
                $idcrc = $_SESSION['idcrc'];
                $query_crc="SELECT * FROM tarjetas_crc  WHERE id_crc='$idcrc'";            
                $result_crc=mysqli_query($conexion,$query_crc);
                if((mysqli_num_rows($result_crc))){
                    while ($fila = mysqli_fetch_array($result_crc)){
                            
            ?> 
            <div class="crc-clase">
                <span class="clase-span">Clase:</span>
                <input type="text" name="clase" value="<?php print $fila['clase']?>">
            </div>
            <div class="crc-superClases">
                <span class="superclases-span">Lista de super clases:</span>
                <input type="text" name="superclase" value="<?php print $fila['super_clases']?>">
            </div>
            <div class="crc-subClases">
                <span class="sublases-span">Lista de subclases:</span>
                <input type="text" name="subclase" value="<?php print $fila['sub_clases']?>">
            </div>
            <?php
                        }
                    }else{
                        echo "<h2>HUBO UN ERROR!!</h2>";
                    }   

            ?> 
            <div class="crc-respoColabo">
            <?php
                include './php/consultas.php';
                $idcrc = $_SESSION['idcrc'];
                $query_colaboracion="SELECT * FROM colaboracion  WHERE id_crc='$idcrc'";
                $result_colaboracion=mysqli_query($conexion,$query_colaboracion);
                if((mysqli_num_rows($result_colaboracion))){
                    
                    while ($fila1 = mysqli_fetch_array($result_colaboracion)){
                            
            ?> 
                <div class="crc-responsabilidad">
                    <span class="responsabilidad-span">Responsabilidad</span>
                    <?php
                    echo "<textarea name='responsabilidad1'>";
                    echo print $fila1['responsabilidad'];
                    echo "</textarea>";
                    
                    
                    ?>
                    
                                     
                </div>
                <div class="crc-colaboracion">                    
                    <span class="colaboracion-span">Colaboracion</span>
                    <?php
                    echo "<textarea name='colaboracion'>";
                    echo print $fila1['colaboracion'];
                    echo "</textarea>";                                     
                    
                    ?>
                   
                </div>
                <?php
                        }
                    }

            ?>     
                <!--< div class="crc-cantidad">
                    <span class="cantidad-span">Cuantas colaboraciones quiere?</span>
                    <input type="number" name="cantidad" id="input-cantidad">
                   <button id="btn-colaboraciones">Colaboraciones</button>
                </div>-->
            </div>
                       
        </form>
    </section>    
    <!---------------------------FIN SECTION CREAR TARJETAS CRC----------------------------->   

</body>

</html>