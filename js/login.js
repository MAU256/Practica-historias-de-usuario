'use strict';
$(document).ready(function(){
    let btn_iniciarSesion=$('#btn-posicion-iniciar');
    let btn_crearCuenta=$('#btn-posicion-crear');
    
    
    btn_iniciarSesion.click(function(){
        let  iniciarSesion=$('#iniciar-sesion');
        let  crearCuenta=$('#crear-cuenta')
        crearCuenta.hide();
        iniciarSesion.slideToggle(400);
        

    });
    btn_crearCuenta.click(function(){
        let  iniciarSesion=$('#iniciar-sesion');
        let  crearCuenta=$('#crear-cuenta');
        crearCuenta.slideToggle(400);
        iniciarSesion.hide();
    });
    
            

    
});