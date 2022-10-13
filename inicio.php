<?php
session_start();
if(!isset($_SESSION["loggedin"])||$_SESSION["loggedin"]!==true ){
	header("location: index.php");
	exit;
}
$_SESSION['id_p']=0;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyectos</title>
    <link rel="stylesheet" href="css/styles.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/proyectos.js"></script>
    <script type="text/javascript" src="js/links.js"></script>
    <script src="https://kit.fontawesome.com/96a69e7eef.js" crossorigin="anonymous"></script>

</head>
<body>
    <footer id="footer">
       <div class="botones-proyecto">
           <div class="btn-footer-proyecto">
               <button id="btn-nuevoProyecto">Nuevo proyecto</button>
           </div>
           <div class="btn-footer-proyecto">
               <button id="btn-Proyectos">Proyectos</button>
           </div>
           <div class="btn-footer-proyecto">
               <button id="btn-cerrarSesion">Cerrar Sesion</button>
           </div>
           <?php
						
						$nombre=$_SESSION['nombre'];		
						echo"</span><br/>";
						echo"<span style= 'color:wheat'>";
						echo 'Usuario: '.$nombre;
                        echo"&nbsp";
                        echo"&nbsp";                        							
            ?>
           
       </div>
    </footer>
    <section id="inicio-container">
        <div id="div-crearProyecto">
            <form action="./php/crear_proyecto.php" method="POST" id="form-crearProyecto">
                <span class="span-crearProyecto nombre-proyecto" >Nombre del proyecto:</span>
                <input type="text" name="nombreProyecto">
                <span class="span-crearProyecto objetivos-proyecto" >Objetivos del proyecto:</span>
                <textarea name="objetivosProyecto" id="textarea-proyecto" cols="30" rows="10"></textarea>
                <span class="span-crearProyecto tareas-proyecto" >Tareas a realizar:</span>
                <textarea name="tareasRealizar" id="tareas-proyecto" cols="30" rows="10"></textarea>
                
                <div id="div-btn-crearProyecto">
                    <input type="submit" value="Crear Proyecto" id="btn-crearProyecto">
                    <div id="div-efecto-btnCrear"></div>
                </div>              
            </form>
        </div>
        <div id="div-proyectos-vinculados">  
                <?php
                    include './php/consultas.php';
                    
                    if((mysqli_num_rows($result_proyecto))){
                        while ($fila = mysqli_fetch_array($result_proyecto)){
                            
                ?>                 
                   
                
                <div class="div-proyecto">
                    <span class='span-fecha'><?php print $fila['fecha'];?></span>
                    <br><br>
                                                 
    
                    <a href='./proyecto.php?id=<?php print $fila['id_proyecto'];?>&nombre=<?php print $fila['nombre_proyecto']?>'>
                <?php                
                            echo '<span class="span-proyecto">';
                                echo $fila['nombre_proyecto'];                                        
                            echo"</span>";
                        echo '</a>';                 
                        echo '<p>';
                            echo $fila['objetivos_proyecto'];
                        echo"</p>";                               
                    echo '</div>';
                           

                        }
                    }else{
                        echo "<h2>NO HAY PROYECTOS AUN</h2>";
                    }   

                ?> 
               
                            
        </div>
    </section>

</body>
</html>