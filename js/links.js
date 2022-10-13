 'use strict'
 $(document).ready(function(){
    let btn_inicio = $('#btn-inicio');
    let btn_cerrarSesion = $('#btn-cerrarSesion');
    let msg =  $('.span-error').css('color','white')
                                .css('marginTop','-20px')
                                .css('marginLeft','-190px');
    /*-------------------DIRECCION A OTRAS WEB-------------------*/    
   
    btn_inicio.click(function(){
       $(location).attr('href','./inicio.php');
   });
   
   btn_cerrarSesion.click(function(){
    $(location).attr('href','./php/cerrar_sesion.php');    
   });

   /*------------------- FIN DIRECCION A OTRAS WEB-------------------*/

 });
