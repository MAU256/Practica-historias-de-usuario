<?php
session_start();
if(!isset($_SESSION["loggedin"])||$_SESSION["loggedin"]!==true ){
	header("location: index.php");
	exit;
}
/*$id_proyecto = $_SESSION['id_p'];*/
$_SESSION['id_p'] = $_GET['id'];
$_SESSION['nombre_p'] = $_GET['nombre'];
$_SESSION['idHistoria'] = $_GET['idHistoria'];

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

    <!---------------------------INICIO SECTION CREAR HISTORIA DE USUARIO----------------------------->
    <section id="crearHistoriaU">       
            <form action="./php/actualizaciones.php" id="form-historia" method="POST">
            <?php
                include './php/consultas.php';
                $idHistoria = $_SESSION['idHistoria'];
                $query_Historia="SELECT * FROM historias_usuario  WHERE id_historia='$idHistoria'";
                $result_Historia=mysqli_query($conexion,$query_Historia);
                if((mysqli_num_rows($result_Historia))){
                    while ($fila = mysqli_fetch_array($result_Historia)){
                            
            ?> 
                <div class="div-historia">
                    <label for="">
                        HISTORIA DE USUARIO:
                        <input type="text" name="historia" id="historia-usuario" value="<?php print $fila['historia']?>">
                    </label>
                </div>
                <div class="div-informacion">
                    <label class="lbl-numero">NUMERO:</label>
                    <input type="number" name="numero" min="1" max="100" value="<?php print $fila['numero']?>">
                    <label class="lbl-1-1001">(1-100)</label>
                    <label class="lbl-prioridad">VALOR (Prioridad):</label>
                    <input type="number" name="valor" min="1" max="100" value="<?php print $fila['prioridad']?>">
                    <label class="lbl-1-1002">(1-100)</label>                    
                    
                    <label class="lbl-desarrollo">
                        Tiempo de desarrollo(costo):
                    </label>
                    <input type="number" name="desarrollo" value="<?php print $fila['tiempo']?>">
                    <select name="duracion" id="select-diasSemanas" class="dias-semanas" value="">
                        <option value="<?php print $fila['d_s']?>"><?php print $fila['d_s']?></option>
                        <option value="Dias">Dias</option>
                        <option value="Semanas">Semanas</option>
                    </select>
                </div>
                <div class="div-descripcion">
                    <label for="" class="label-absolute">
                        Descripcion:

                    </label>
                    <textarea name="descripcion" id="descripcion" cols="30" rows="10" ><?php print $fila['descripcion']?></textarea>
                </div>
                <div class="div-observaciones">
                    <label for="" class="label-absolute label-observaciones">
                        Observaciones:

                    </label>
                    <textarea name="observaciones" id="observaciones" cols="30" rows="10" ><?php print $fila['observaciones']?></textarea>
                </div>
                <?php
                        }
                    }else{
                        echo "<h2>HUBO UN ERROR!!</h2>";
                    }   

                ?>    
                <div class="crear">
                    <input type="submit" value="Modificar" id="btn-modificar">
                </div>                
            </form>       
    </section>
    <!---------------------------FIN SECTION CREAR HISTORIA DE USUARIO----------------------------->   

</body>

</html>