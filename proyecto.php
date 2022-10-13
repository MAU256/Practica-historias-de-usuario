<?php
session_start();
if(!isset($_SESSION["loggedin"])||$_SESSION["loggedin"]!==true ){
	header("location: index.php");
	exit;
}
/*$id_proyecto = $_SESSION['id_p'];*/
$_SESSION['id_p'] = $_GET['id'];
$_SESSION['nombre_p'] = $_GET['nombre'];

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
                <button id="btn-tarjetasCrc">Tarjetas CRC</button>
            </div>
            <div class="btn-footer-proyecto">
                <button id="btn-historiasUsuario">Historias de Usuario</button>
            </div>
            <div class="btn-footer-proyecto">
                <button id="btn-cerrarSesion">Cerrar Sesion</button>
            </div>
            <span class="nombre-proyecto"> <?php print $_SESSION['nombre_p']?></span>            
        </div>
        <div class="btn-opciones">
            <div class="btn-opcionesCrc">
                <button id="btn-crearCrc">Crear Tarjeta CRC</button>
            </div>
            <div class="btn-opcionesCrc">
                <button id="btn-mostrarCrc">Tarjetas CRC</button>
            </div>            
        </div>
        <div class="btn-historiaOpciones">
            <div class="btn-opcionesCrc">
                <button id="btn-crear-historiasUsuario">Crear Historias de Usuario</button>
            </div>
            <div class="btn-opcionesCrc">
                <button id="btn-mostrar-historiasUsuario">Historias de Usuario</button>
            </div> 
                    
        </div>
    </footer>
    <!---------------------------FIN FOOTER----------------------------->

    <!---------------------------INICIO SECTION CREAR HISTORIA DE USUARIO----------------------------->
    <section id="container">       
            <form action="./php/historia_usuario.php" id="form-historia" method="POST">
                <div class="div-historia">
                    <label for="">
                        HISTORIA DE USUARIO:
                        <input type="text" name="historia" id="historia-usuario">
                    </label>
                </div>
                <div class="div-informacion">
                    <label class="lbl-numero">NUMERO:</label>
                    <input type="number" name="numero" min="1" max="100">
                    <label class="lbl-1-1001">(1-100)</label>
                    <label class="lbl-prioridad">VALOR (Prioridad):</label>
                    <input type="number" name="valor" min="1" max="100">
                    <label class="lbl-1-1002">(1-100)</label>                    
                    
                    <label class="lbl-desarrollo">
                        Tiempo de desarrollo(costo):
                    </label>
                    <input type="number" name="desarrollo">
                    <select name="duracion" id="select-diasSemanas" class="dias-semanas">
                        <option value="Dias">Dias</option>
                        <option value="Semanas">Semanas</option>
                    </select>
                </div>
                <div class="div-descripcion">
                    <label for="" class="label-absolute">
                        Descripcion:

                    </label>
                    <textarea name="descripcion" id="descripcion" cols="30" rows="10"></textarea>
                </div>
                <div class="div-observaciones">
                    <label for="" class="label-absolute label-observaciones">
                        Observaciones:

                    </label>
                    <textarea name="observaciones" id="observaciones" cols="30" rows="10"></textarea>
                </div>
                <div class="crear">
                    <input type="submit" value="CREAR" id="btn-crear">
                </div>
            </form>       
    </section>
    <!---------------------------FIN SECTION CREAR HISTORIA DE USUARIO----------------------------->

    <!---------------------------INICIO SECTION HISTORIA DE USUARIO----------------------------->
    <section id="container-historiaU">
        <?php
            include './php/consultas.php';
            
            if((mysqli_num_rows($result_historiaU))){
                while ($fila = mysqli_fetch_array($result_historiaU)){
                            
        ?>      
        <div class="div-mostrarHistoria">            
           <a href="./historia-usuario.php?id=<?php print $_SESSION['id_p'];?>&idHistoria=<?php print $fila['id_historia'];?>&historia=<?php print $fila['historia']?>&nombre=<?php print $_SESSION['nombre_p']?>"><span class="span-HistoriaU"><?php print $fila['historia'];?></span></a> 
           <br><br>
           <p class="p-historia">
               <span class="span-historia">Numero:</span>
               <br>
               <span class="span-contentHistoria"><?php print $fila['numero'];?></span>
            </p>
            <p class="p-historia">
               <span class="span-historia">Prioridad:</span>
               <br>
               <span class="span-contentHistoria"><?php print $fila['prioridad'];?></span>
            </p>
           <br>
           <p class="p-historia">
               <span class="span-historia">Descripcion:</span>
               <br>
               <span class="span-contentHistoria"><?php print $fila['descripcion'];?></span>
            </p>
           <br>
           <p class="p-historia">
               <span class="span-historia">Fecha:</span>
               <br>
               <span class="span-contentHistoria"><?php print $fila['fecha'];?></span>
            </p>            
        </div>
        <?php
                }
            }else{
                echo "<h2>NO HAY HISTORIAS DE USUARIO TODAVIA</h2>";
            }   

        ?> 
       
        
    </section>
    <!---------------------------FIN SECTION HISTORIA DE USUARIO----------------------------->



    <!---------------------------INICIO SECTION CREAR TARJETAS CRC----------------------------->
    <section id="container-crearCrc">
        <form action="./php/tarjetas-crc.php" method="POST" id="form-crearCrc">
            <div class="crc-clase">
                <span class="clase-span">Clase:</span>
                <input type="text" name="clase">
            </div>
            <div class="crc-superClases">
                <span class="superclases-span">Lista de super clases:</span>
                <input type="text" name="superclase">
            </div>
            <div class="crc-subClases">
                <span class="sublases-span">Lista de subclases:</span>
                <input type="text" name="subclase">
            </div>
            <div class="crc-respoColabo">
                <div class="crc-responsabilidad">
                    <span class="responsabilidad-span">Responsabilidad</span>
                    <textarea name="responsabilidad1"></textarea>
                    <textarea name="responsabilidad2"></textarea> 
                    <textarea name="responsabilidad3"></textarea> 
                    <textarea name="responsabilidad4"></textarea> 
                    <textarea name="responsabilidad5"></textarea> 
                    <textarea name="responsabilidad6"></textarea>                  
                </div>
                <div class="crc-colaboracion">                    
                    <span class="colaboracion-span">Colaboracion</span>
                    <textarea name="colaboracion1"></textarea>
                    <textarea name="colaboracion2"></textarea>
                    <textarea name="colaboracion3"></textarea>
                    <textarea name="colaboracion4"></textarea>
                    <textarea name="colaboracion5"></textarea>
                    <textarea name="colaboracion6"></textarea>
                </div>
                <!--< div class="crc-cantidad">
                    <span class="cantidad-span">Cuantas colaboraciones quiere?</span>
                    <input type="number" name="cantidad" id="input-cantidad">
                   <button id="btn-colaboraciones">Colaboraciones</button>
                </div>-->
            </div>

            <div class="crc-btn">
                <input type="submit" value="Crear" name="crear">
            </div>
        </form>
    </section>    
    <!---------------------------FIN SECTION CREAR TARJETAS CRC----------------------------->

    <!---------------------------INICIO SECTION MOSTRAR TARJETAS CRC----------------------------->
    <section id="container-mostrarCrc">
        <?php
            include './php/consultas.php';
            
            if((mysqli_num_rows($result_crc))){
                while ($fila = mysqli_fetch_array($result_crc)){
                            
        ?>  
        <div class="mostrarCrc">
            <a href="tarjetas-crc.php?id=<?php print $_SESSION['id_p'];?>&idcrc=<?php print $fila['id_crc'];?>&clase=<?php print $fila['clase']?>&nombre=<?php print $_SESSION['nombre_p']?>"><span class="clase-span"><?php print $fila['clase'];?></span></a>
            <br><br>
            <p class="crc-p">
                Super clases:
                <br>
                <span class="crc-span"><?php print $fila['super_clases'];?></span>
            </p>
            <p class="crc-p">
                Subclases:
                <br>
                <span class="crc-span"><?php print $fila['sub_clases'];?></span>
            </p>
            <p class="crc-p">
                Fecha:
                <br>
                <span class="crc-span"><?php print $fila['fecha'];?></span>
            </p>
        </div>
        <?php
                }
            }else{
                echo "<h2>NO HAY TARJETAS CRC TODAVIA</h2>";
            }
        ?>
    </section>
    <!---------------------------FIN SECTION MOSTRAR TARJETAS CRC----------------------------->

    

</body>

</html>