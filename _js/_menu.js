/*!
 * Libreria JavaSript itman v1
 * PATRON WEB (Gdiat) 
 *
 * Ricardo Bailón
 *
 * Date: Wed Aug 31 10:35:15 2011 -0400
 */
(function( window, undefined ) {

    var menu = (function(){

        var core = {
             c_mod:''


            // #######################################################################################
            ,start: function() {
                $("body").append('<div class="nav"><ul></ul></div>');
                $(".nav ul").append('<li class="active">'+globs.program+'</li>');
                $(".nav ul").append('<li id="ges">Gestión</li>');
                $(".nav ul").append('<li id="inc">Incidencias</li>');
                $(".nav ul").append('<li id="con">Contratos</li>');
                $(".nav ul").append('<li id="pre">Presupuesto</li>');
                $(".nav ul").append('<li id="out">Salir</li>');

                $("body").append('<div class="nav subnav"><ul></ul></div>');
                $(".subnav ul").append('<li>Personas</li>');
                $(".subnav ul").append('<li>Emails</li>');
                $(".subnav ul").append('<li>Ordenadores</li>');
                $(".subnav ul").append('<li>Impresoras</li>');
            }


            // #######################################################################################
            // Class PERSONS--------------------------------------------------------------------------
            /*
            ,persons: {

                 c_mod: "002"
                ,tit: "PERSONAS"

                // ==================================
                //Crear la tabla
                ,tabla: function()
                {
                    $(".panel-body").append("<table id=\"persons\" data-order='[[ 1, \"asc\" ]]' data-page-length=\"20\"></table>");
                    $("#persons").append("<thead><tr></tr></thead>");
                    $("#persons thead tr").append("<th class=\"c b tHead\" width=2%>ID</th>");
                    $("#persons thead tr").append("<th class=\"l b tHead\" width=>NOMBRE</th>");
                    $("#persons thead tr").append("<th class=\"c b tHead\" width=>USUARIO</th>");
                    $("#persons thead tr").append("<th class=\"c b tHead\" width=1%>DEPARTAMENTO</th>");
                    $("#persons thead tr").append("<th class=\"c b tHead\" width=5%>CENTRO</th>");
                }

            }//*/

        }; //#############################################################################
 
        return core;

    })();

    window.menu = window.M = menu;

})(window);