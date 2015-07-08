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
                $("body").append('<div class="nav"></div>');
                $(".nav").append('<ul></ul>');
                $(".nav ul").append('<li><div>Gestión</div></li>');
                $(".nav ul").append('<li class="active"><div>Incidencias</div></li>');
                $(".nav ul").append('<li><div>Contratos</div></li>');
                $(".nav ul").append('<li><div>Presupuesto</div></li>');
                $(".nav ul").append('<li><div>Salir</div></li>');
            }


            // #######################################################################################
            // Class PERSONS--------------------------------------------------------------------------
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

            }

        }; //#############################################################################
 
        return core;

    })();

    window.menu = window.M = menu;

})(window);