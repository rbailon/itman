/*

	Copyright (C) 2015

	This program is free software: you can redistribute it and/or modify
	it under the terms of the GNU General Public License as published by
	the Free Software Foundation, either version 3 of the License, or
	(at your option) any later version.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with this program.  If not, see <http://www.gnu.org/licenses/>.

*/

var EX_FECHA = /^([0][1-9]|[12][0-9]|3[01])(-)(0[1-9]|1[012])\2(\d{4})$/;

function ini() {
	$$.inChorizo(ch);

	if($$.c_mod) $("#"+$$.c_mod).addClass("on");
	if($$.c_sec) $("#"+$$.c_sec).addClass("on");

	$$.start();
	$$.kerbero();

	/*$.sticky('Hola caracola');*/
	switch($$.c_sec)
	{
		case 's01':
			$$.iniEsq1("personas",function(){ persona.x(); });
			break;

		case 's02':
			$$.iniEsq1("emails",function(){ email.x(); });
			break;

		case 's03':
			$$.iniEsq1("consumible",function(){ consumible.x(); });
			break;

		case 's04':
			$$.iniEsq1("incidencias",function(){ incidencia.x(); });
			break;

		case 's05':
			$$.iniEsq1("impresoras",function(){ impresora.x(); });
			break;

		case 's06':
			$$.iniEsq1("modelos",function(){ modelo.x(); });
			break;

		case 's07':
			$$.iniEsq1("tareas",function(){ tarea.x(); });
			break;

		default: console.error("c_sec = "+$$.c_sec+" - No contemplada");
	}
	//nt.mensaje('aaaaaaaaaa');
}



/*!
 * Libreria JavaSript itman v1
 * PATRON WEB (Gdiat)
 *
 * Ricardo Bailón
 *
 * Date: Wed Aug 31 10:35:15 2011 -0400
 */
(function( window, undefined ) {

	var itman = (function(){

		var core = {
			 c_mod:''
			,oper:''
			,c_deps:''

			/* A BORRAR INI *///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			,c_lg:''
			,c_user:''
			,c_sec:''

			//###########################################################
			,inChorizo: function(ch)
			{// Separa
				var ch;
				this.c_lg = ch.substr(0,2);
				this.c_user = parseInt(ch.substr(2,3));
				this.c_mod = ch.substr(5,3);
				this.c_sec = ch.substr(8,3);
			}
			//#############################################################################
			,outChorizo: function()
			{//
				return this.c_lg+"00"+this.c_user+this.c_mod+this.c_sec;
			}
			//#############################################################################
			,iniEsq1: function() // ([lit_regs],[fn])
			{// Esqueleto 1: con tabla 'tb2'
				if(arguments.length)
				{
					lit_regs = arguments[0];
					fn       = arguments[1];
				}

				if(fn) $('#fFicha').load('index.php/?ch='+this.outChorizo()+'&c_ajax=form', function() { fn(); });

				$('#tb2').dataTable( {
					 "bPaginate":false
					,"bFilter":true
					,"bInfo":false
					,"bAutoWidth":false
					,"oLanguage": {"sSearch": Literal("Busqueda"), "sZeroRecords": Literal("NoResult")}
					,"fnInitComplete": function()
					{
						$("#lista .dataTables_filter input").focus();
						$("#tb2_wrapper").append("<div class=regs>Total "+lit_regs+":<b> "+$("#tb2 tbody tr.fila").length+"</b><div>");
					}
					,"fnDrawCallback": function()
					{
						$("#tb2_wrapper div.regs").html("Total "+lit_regs+":<b> "+$("#tb2 tbody tr.fila").length+"</b>");
						$("#tb2_filter :input:eq(0)").focus();
					}
				});


				$("#tb2 tr.fila").hover(
					 function () { $(this).addClass("hv"); }
					,function () { $(this).removeClass("hv"); }
				);
			}
			/* A BORRAR FIN *///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////











			// ##########################################################
			,start: function() {
				// this.menu();
				// this.department.getIDs();
				// this.centre.getIDs();
				// $$.makePanel(this.tit);
				$("#page").append('<div class="panel panel-default"><div class="panel-heading"></div></div>');
				$(".panel").append('<div class="panel-form"></div>');
				$(".panel").append('<div class="panel-body"></div>');

				//$('.panel-form').load('index.php/?ajax='+true+'&kn=00101');


			}


			// ##########################################################
			,kerbero: function(oper)
			{// Cadena numero con la informacion para operar

				if (oper) {
					return this.c_mod+this.oper;
				} else {

					this.clas = globs.kn.substr(0,3);
					this.oper = globs.kn.substr(3,2); // 00: getIDs, 01: getAll, 02: alta, 03: cons, 04: modi...

				};
			}


			// ##########################################################
			,menu: function()
			{
				$('#user').click(function(){
					$$.persons.get();
				});
				$("#navPersons").click(function(){
					$$.persons.getAll();
				});
			}


			// ##########################################################
			,makePanel: function(tit)
			{
				$("#page").append('<div class="panel panel-default"><div class="panel-heading">'+tit+'</div></div>');
				$(".panel").append('<div class="panel-form"></div>');
				$(".panel").append('<div class="panel-body"></div>');
			}


			,iTable: function(id)
			{
				$("#"+id).DataTable({
					"lengthChange": false
					,"language": {
						"emptyTable":        "No hay datos disponibles",
						"info":              "Mostrando _START_ a _END_ de _TOTAL_ registros",
						"infoEmpty":         "Mostrando 0 a 0 de 0 registros",
						"infoFiltered":      "(filtered from _MAX_ total entries)",
						"infoPostFix":       "",
						"thousands":         ",",
						"lengthMenu":        "Show _MENU_ entries",
						"loadingRecords":    "Cargando...",
						"processing":        "Procesando...",
						"search":            "Buscar:",
						"zeroRecords":       "No coincide ningún registro",
						"paginate": {
							"first":        "Primero",
							"last":         "Ultimo",
							"next":         "Siguiente",
							"previous":     "Anterior"
						},
					}
					,"initComplete": function( settings, json ) {
						$("div.dataTables_filter input").attr({"placeholder":"buscar..."});
						$("div.dataTables_filter input").focus();
					}
				});
			}


			// #######################################################################################
			// Class PERSONS--------------------------------------------------------------------------
			,persons: {

				 clas: '002' // ID de la clase
				,tit: "PERSONAS"


				// ==================================
				// Crear la tabla
				,tabla: function()
				{
					$(".panel-body").append("<table id=\"persons\" data-order='[[ 1, \"asc\" ]]' data-page-length=\"20\"></table>");
					$("#persons").append("<thead><tr></tr></thead>");
					$("#persons thead tr").append("<th class=\"c b tHead\" width=2%>ID</th>");
					$("#persons thead tr").append("<th class=\"l b \" width=>NOMBRE</th>");
					$("#persons thead tr").append("<th class=\"c b tHead\" width=>USUARIO</th>");
					$("#persons thead tr").append("<th class=\"c b tHead\" width=1%>DEPARTAMENTO</th>");
					$("#persons thead tr").append("<th class=\"c b tHead\" width=5%>CENTRO</th>");
				}


				// ==================================
				// MOSTRAR TABLA REGISTRO
				,getAll: function(){

					oper = "01";

					//$("#page").empty();

					$.getJSON( "index.php", {
						"ajax":    "true"
						,"kn":      this.clas+oper
					}).done(function( data, textStatus, jqXHR ) {

						$$.persons.tabla();

						$.each(data, function(i, obj){
							$("#persons").append("<tr id=\""+obj.id+"\"></tr>");
							$("#persons #"+obj.id).append("<td class=\"c\">"+obj.id+"</td>");
							$("#persons #"+obj.id).append("<td class=\"l b\">"+obj.apellido1+" "+obj.apellido2+", "+obj.nombre+"</td>");
							$("#persons #"+obj.id).append("<td class=\"c b\">"+((obj.usuario)?obj.usuario:'')+"</td>");
							$("#persons #"+obj.id).append("<td class=\"l\">"+globs.depart[obj.departamento]+"</td>");
							$("#persons #"+obj.id).append("<td class=\"l\"><nobr>"+globs.centro[obj.centro]+"</nobr></td>");
							$("#persons #"+obj.id).click(function(){$$.persons.open(this.id);});
						});

						$$.iTable("persons");

					}).fail(function( jqXHR, textStatus, errorThrown ) {

						console.log( "ERROR persons.getAll: " +  jqXHR );
						console.log( "ERROR persons.getAll: " +  textStatus );
						console.log( "ERROR persons.getAll: " +  errorThrown );

					});
				}


				// ==================================
				// MOSTRAR PERSONA
				,get: function(ID){

					oper = "02";

					$("#page").empty();
					$$.makePanel(this.tit);

					$.getJSON( "index.php", {
						"ajax":    "true"
						,"kn":      this.clas+oper
						,"id":      ID
					}).done(function( data, textStatus, jqXHR ) {

						console.log(data);

					}).fail(function( jqXHR, textStatus, errorThrown ) {

						console.log( "ERROR persons.getAll: " +  jqXHR );
						console.log( "ERROR persons.getAll: " +  textStatus );
						console.log( "ERROR persons.getAll: " +  errorThrown );

					});
				}


				// ==================================
				// MOSTRAR PERSONA
				,form: function(ID){

					$('.panel').append('<div class="panel-form">dsfagfd</div>');

				}

/*
				// ==================================
				// Abrir una persona para consultar o modifciar
				,open: function(obj)
				{
					console.log(obj);

					$("body").append("<div class='cloud'/>");

					//$(this).find("td").eq(0).css("background-color", "#ECF8E0");
					//$(this).css("background-color", "#ECF8E0");
					//$(this).animate({height: "100"}, 500);
					//var pos = $(this).position();
					var pos = $(this).offset();
					//alert(pos.toSource());
					$("body").append("<div class='foo'/>");
					$(".foo").css({
					"left":     pos.left,
					"top":      pos.top,
					"width":    $(this).width(),
					"height":   $(this).height()
					});

					$(".foo").html("<span>"+$(this).html()+"</span>");

					$(".cloud").show("slow");
					$(".foo").animate({top: "45"}, 500);

					$(".foo").click(function (){
					$(".cloud").remove();
					$(".foo").remove();
					});
				}
*/
			}




			// #######################################################################################
			// Class MAILS ---------------------------------------------------------------------------
			,mails: {

				clas: '003' // ID de la clase


				// ==================================
				// Crear la tabla
				,tabla: function()
				{
					$(".panel-body").append("<table id=\"mails\" data-order='[[ 1, \"asc\" ]]' data-page-length=\"20\"></table>");
					$("#mails").append("<thead><tr></tr></thead>");
					$("#mails thead tr").append("<th class=\"c b tHead\" width=2%>ID</th>");
					$("#mails thead tr").append("<th class=\"l b tHead\" width=>MAIL</th>");
					$("#mails thead tr").append("<th class=\"c b tHead\" width=>USUARIO</th>");
					$("#mails thead tr").append("<th class=\"c b tHead\" width=1%>PASSWD</th>");
				}


				// ==================================
				// MOSTRAR TABLA REGISTRO
				,getAll: function(){

					oper = "01";

					//$("#page").empty();

					$.getJSON( "index.php", {
						"ajax":    "true"
						,"kn":      this.clas+oper
					}).done(function( data, textStatus, jqXHR ) {

						$$.mails.tabla();

						$.each(data, function(i, obj){
							$("#mails").append("<tr id=\""+obj.cod_email+"\" class=\"row\"></tr>");
							$("#mails #"+obj.cod_email).append("<td class=\"c \">"+obj.cod_email+"</td>");
							$("#mails #"+obj.cod_email).append("<td class=\"l \">"+obj.email+"</td>");
							$("#mails #"+obj.cod_email).append("<td class=\"c \">"+obj.id_email+"</td>");
							$("#mails #"+obj.cod_email).append("<td class=\"c \">"+obj.pass_email+"</td>");
						});

						$$.iTable("mails");

					}).fail(function( jqXHR, textStatus, errorThrown ) {

						console.log( "ERROR mails.getAll: " +  jqXHR );
						console.log( "ERROR mails.getAll: " +  textStatus );
						console.log( "ERROR mails.getAll: " +  errorThrown );

					});
				}
			}




			// #######################################################################################
			// Class DEPARTMENT --------------------------------------------------------------------
			,department: {

				c_mod: "011"
				,tit: "DEPARTAMENTOS"

				// ==================================
				,getIDs: function()
				{
					oper = "00";

					$.getJSON( "index.php", { "ajax": "true", "kn": this.c_mod+oper})
					.done(function( data, textStatus, jqXHR ) {

						window.globs.depart = data;

					}).fail(function( jqXHR, textStatus, errorThrown ) {

						console.log( "ERROR departament.getIDs: " +  textStatus );

					});
				}
			}




			// #######################################################################################
			// Class CENTRE --------------------------------------------------------------------
			,centre: {

				c_mod: "012"
				,tit: "CENTROS"

				// ==================================
				,getIDs: function()
				{
					oper = "00";

					$.getJSON( "index.php", { "ajax": "true", "kn": this.c_mod+oper})
					.done(function( data, textStatus, jqXHR ) {

						window.globs.centro = data;

					}).fail(function( jqXHR, textStatus, errorThrown ) {

						console.log( "ERROR centre.getIDs: " +  textStatus );

					});
				}
			}


		}; //#############################################################################

		return core;

	})();

	window.itman = window.$$ = itman;

})(window);


// Añade al objeto String la función [trim]:(Devuleve el string sin espacios al principio y final)
String.prototype.trim = function(){ return this.replace(/^\s+|\s+$/g,''); }
