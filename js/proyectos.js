'use strict';
$(document).ready(function(){
    let btn_nuevoProyecto = $('#btn-nuevoProyecto');
    let btn_proyectos = $('#btn-Proyectos');
    let div_proyecto = $('.div-proyecto');    
    let btn_crc = $('#btn-tarjetasCrc');
    let btn_historiaUsuario = $('#btn-historiasUsuario');
    let btn_crearHU = $('#btn-crear-historiasUsuario');
    let btn_mostrarHU = $('#btn-mostrar-historiasUsuario');
    let btn_crearCrc = $('#btn-crearCrc');
    let btn_mostrarCrc = $('#btn-mostrarCrc');
    let ban_nuevoP = 0, ban_P = 0, ban_opcionesCrc = 0, ban_opcHistoria = 0, ban_crearHU = 0, ban_mostrarHU = 0, ban_crearCrc = 0, ban_mostrarCrc = 0;

    /*-------------------EVENTOS-------------------*/
    //eventos inicio.html
    btn_nuevoProyecto.click(function(){
        if(ban_nuevoP==0){
            mostrarCrearProyecto();            
            ocultarProyectos();
            ban_P=0;
            ban_nuevoP=1;
        }else{
            ocultarCrearProyecto();
            ocultarProyectos();
            ban_P=0;
            ban_nuevoP=0;
        }
        
                    
    });
    btn_proyectos.click(function(){
        if(ban_P==0){
            mostrarProyectos();                        
            ocultarCrearProyecto();
            ban_P=1;
            ban_nuevoP=0;
        }else{         
            ocultarProyectos();            
            ocultarCrearProyecto();            
            ban_P=0;
            ban_nuevoP=0;
        }                   
    });
    //-----------------------------------------

    //eventos proyecto.html
    btn_crc.click(function(){
        if(ban_opcionesCrc == 0){
            mostrarBtnOpcCrc(); 
            ocultarBtnOpcHistorias();
            ocultarCrearHistoriaU();
            ocultarHistoriaU();
            ocultarCrearCrc();
            ocultarCrc();
            ban_opcionesCrc = 1;
            ban_opcHistoria = 0;          
            ban_crearHU = 0;
            ban_mostrarHU = 0;
            ban_crearCrc = 0;
            ban_mostrarCrc = 0;
        }else{
            ocultarBtnOpcCrc();
            ocultarBtnOpcHistorias();
            ocultarCrearHistoriaU()
            ocultarHistoriaU();
            ocultarCrearCrc();
            ocultarCrc();
            ban_opcionesCrc = 0;
            ban_opcHistoria = 0;
            ban_crearHU = 0;
            ban_mostrarHU = 0;
            ban_crearCrc = 0;
            ban_mostrarCrc = 0;
        }
    });

    btn_historiaUsuario.click(function(){
        if(ban_opcHistoria == 0){
            mostrarBtnOpcHistorias();
            ocultarBtnOpcCrc();
            ocultarCrearHistoriaU();
            ocultarHistoriaU();
            ocultarCrearCrc();
            ocultarCrc();
            ban_opcHistoria = 1;
            ban_opcionesCrc = 0;
            ban_crearHU = 0;
            ban_mostrarHU = 0;
            ban_crearCrc = 0;
            ban_mostrarCrc = 0;
        }else{
            ocultarBtnOpcHistorias();
            ocultarBtnOpcCrc();
            ocultarCrearHistoriaU();
            ocultarHistoriaU();
            ocultarCrearCrc();
            ocultarCrc();
            ban_opcHistoria = 0;
            ban_opcionesCrc = 0;
            ban_crearHU = 0;
            ban_mostrarHU = 0;
            ban_crearCrc = 0;
            ban_mostrarCrc = 0;
        }
    });
    btn_crearHU.click(function(){
        if(ban_crearHU == 0){
            mostrarCrearHistoriaU();
            ocultarHistoriaU();
            ocultarCrearCrc();
            ocultarCrc();
            ban_mostrarHU = 0;           
            ban_crearHU = 1; 
            ban_crearCrc = 0; 
            ban_mostrarCrc = 0;          
        }else{
            ocultarCrearHistoriaU();
            ocultarHistoriaU();
            ocultarCrearCrc();
            ocultarCrc();
            ban_crearHU = 0;
            ban_mostrarHU = 0; 
            ban_crearCrc = 0;   
            ban_mostrarCrc = 0;
        }
    });

    btn_mostrarHU.click(function(){
        if(ban_mostrarHU == 0){
            mostrarHistoriaU();
            ocultarCrearHistoriaU();
            ocultarCrearCrc();
            ocultarCrc();
            ban_mostrarHU = 1;
            ban_crearHU = 0;
            ban_crearCrc = 0;
            ban_mostrarCrc = 0;
        }else{
            ocultarHistoriaU();
            ocultarCrearHistoriaU();
            ocultarCrearCrc();
            ocultarCrc();
            ban_mostrarHU = 0;
            ban_crearHU = 0;
            ban_crearCrc = 0;
            ban_mostrarCrc = 0;
        }
    });

    btn_crearCrc.click(function(){
       if(ban_crearCrc == 0){
            mostrarCrearCrc();
            ocultarCrc();
            ban_crearCrc = 1;
            ban_mostrarHU = 0;
            ban_crearHU = 0;
            ban_mostrarCrc = 0;
       }else{
            ocultarCrearCrc();
            ocultarCrc();
            ban_crearCrc = 0;
            ban_mostrarHU = 0;
            ban_crearHU = 0;
            ban_mostrarCrc = 0;
       }
    });
    btn_mostrarCrc.click(function(){
        if(ban_mostrarCrc == 0){
            mostrarCrc();
            ocultarCrearCrc();
            ban_mostrarCrc = 1;
            ban_crearCrc = 0;
        }else{
            ocultarCrc();
            ocultarCrearCrc();
            ban_mostrarCrc = 0;
            ban_crearCrc = 0;
        }
    });
    //-----------------------------------------

   
    /*------------------- FIN EVENTOS-------------------*/


    /*-----------EFECTO HOVER-------------*/ 
    div_proyecto.hover(divProyectoHoverZoom,divProyectoHoverNormal);

    /*----------- FIN EFECTO HOVER-------------*/ 


    /*-------------------FUNCIONES-------------------*/
    //funcion para mostrar caja de crear proyecto
    function mostrarCrearProyecto(){
        let div_crearProyecto = $('#div-crearProyecto').css('transform','scale(.2,.2)')
                                                        .css('display','block');
        div_crearProyecto.animate({
                opacity: '1',
                top: '30%'
                
        },400, function(){
            div_crearProyecto.css('transform','scale(1,1)')
        });
        btn_nuevoProyecto.css('color','red')
        .css('borderBottom','1px solid red');
           
    }
    //funcion para ocultar caja de crear proyecto    
    function ocultarCrearProyecto(){
        let div_crearProyecto = $('#div-crearProyecto').css('transform','scale(.2,.2)');
        div_crearProyecto.animate(
            {
                opacity: '0',
                top: '-60%',
            },400,function(){
                div_crearProyecto.css('display','none');
            });
            btn_nuevoProyecto.css('color','white')
                .css('borderBottom','none');        
                
    }
    //funciones inicio.html--------------------------------------
    //funcion para mostrar caja de proyectos
    function mostrarProyectos(){
        let div_proyectos = $('#div-proyectos-vinculados').css('display','flex')
                                                        .css('transform','scale(.2,.2)')
        div_proyectos.animate({
            opacity: '1',
            top: '25%'
            
        },300, function(){
        div_proyectos.css('transform','scale(1,1)');
                    
        });
        btn_proyectos.css('color','red')
                .css('borderBottom','1px solid red');
    }
    //funcion para ocultar caja de proyectos
    function ocultarProyectos(){
        let div_proyectos = $('#div-proyectos-vinculados').css('transform','scale(.2,.2)');
        div_proyectos.animate(
            {
                opacity: '0',
                top: '-60%',
            },300,function(){
                div_proyectos.css('display','none');
            });
        btn_proyectos.css('color','white')
                    .css('borderBottom','none');
                
    }    
    //funcion hover para hacer zoom al div proyecto
    function divProyectoHoverZoom(){
        $(this).css('transform','scale(1.2,1.2)');
    }
    //funcion hover para hacer normal al div proyecto
    function divProyectoHoverNormal(){
        $(this).css('transform','scale(1,1)');
    }
    //--------------------------------------------------------------------------------

    //funciones proyecto.html---------------------------------------------------------
    function mostrarBtnOpcCrc(){
        let opciones_crc = $('.btn-opciones').css('display', 'flex');
        opciones_crc.animate(
            {
                opacity: '1',
                top: '25%',
                columnGap: '8%',
                width: '400px',
                left: '27%',
            },100,function()
                {
                    btn_crc.css('color','red')
                }
            );           
    }

    function ocultarBtnOpcCrc(){
        let opciones_crc = $('.btn-opciones');
        opciones_crc.animate(
            {
                opacity: '0',
                top: '18%',
                columnGap: '-100%',
                width: '200px',
                left: '35%',
            },100,function()
                {
                    opciones_crc.css('display', 'none');
                    btn_crc.css('color', 'white')
                }
            ); 
    }
    function mostrarBtnOpcHistorias(){
        let opciones_historia = $('.btn-historiaOpciones').css('display', 'flex');
        opciones_historia.animate(
            {
                opacity: '1',
                top: '25%',
                columnGap: '8%',
                width: '600px',
                left: '35%',
            },100,function()
                {
                    btn_historiaUsuario.css('color','red')
                }
            );           
    }
    

    function ocultarBtnOpcHistorias(){
        let opciones_historia = $('.btn-historiaOpciones');
        opciones_historia.animate(
            {
                opacity: '0',
                top: '18%',
                columnGap: '-100%',
                width: '200px',
                left: '52%',
            },100,function()
                {
                    opciones_historia.css('display', 'none');
                    btn_historiaUsuario.css('color', 'white')
                }
            ); 
    }

    function mostrarCrearHistoriaU(){
        let div_crearHU = $('#container').css('display', 'flex');
        div_crearHU.animate(
            {
                opacity: '1',
                left: '0%',
            },300,function()
                {
                    btn_crearHU.css('color','rgb(148, 203, 253)');
                }
            );           
    }
    

    function ocultarCrearHistoriaU(){
        let div_crearHU = $('#container');
        div_crearHU.animate(
            {
                opacity: '0',
                left: '-90%',
            },200,function()
                {
                    div_crearHU.css('display', 'none');
                    btn_crearHU.css('color', 'white')
                }
            ); 
    }
    
    function mostrarHistoriaU(){
        
        let div_historiaHU = $('#container-historiaU').css('display','flex');
        div_historiaHU.animate(
            {
                opacity: '1',                
                top: '30%',
            },200,function(){
                btn_mostrarHU.css('color','rgb(148, 203, 253)');
            });
            
            
    }
    function ocultarHistoriaU(){
        let div_historiaHU = $('#container-historiaU');
        div_historiaHU.animate(
            {
                opacity: '0',
                top: '100%',
            },200,function()
                {
                    div_historiaHU.css('display', 'none');
                    btn_mostrarHU.css('color', 'white')
                }

        );

    }


    function mostrarCrearCrc(){
        let div_crearCrc = $('#container-crearCrc').css('display', 'block');
        div_crearCrc.animate(
            {
                opacity: '1',
                left: '0%',
            },300,function()
                {
                    btn_crearCrc.css('color','rgb(148, 203, 253)');
                }
            );           
    }
    

    function ocultarCrearCrc(){
        let div_crearCrc = $('#container-crearCrc');
        div_crearCrc.animate(
            {
                opacity: '0',
                left: '-90%',
            },300,function()
                {
                    div_crearCrc.css('display', 'none');
                    btn_crearCrc.css('color', 'white')
                }
            ); 
    }


    function mostrarCrc(){
        
        let div_crc = $('#container-mostrarCrc').css('display','block');
        div_crc.animate(
            {
                opacity: '1',                
                marginTop: '50px',
            },500,function(){
                btn_mostrarCrc.css('color','rgb(148, 203, 253)');
            });
            
            
    }
    function ocultarCrc(){
        let div_crc = $('#container-mostrarCrc');
        div_crc.animate(
            {
                opacity: '0',
                marginTop: '100%',
            },400,function()
                {
                    div_crc.css('display', 'none');
                    btn_mostrarCrc.css('color', 'white')
                }

        );

    }
    //    --------------------------------------------------------------------------------
    /*------------------- FIN FUNCIONES-------------------*/
});
