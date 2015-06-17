
var persons = function() {
   // Variables privadas
   var debug = false;

   // Métodos privados
   // ****************************************************************
   function esValido()
   {
      var key = 1;
      $("#fFicha .bool").removeClass("er");

      if(!$("#cp_nombre").val()) {$("#cp_nombre").addClass("er"); key = 0};
      if(!$("#cp_apellido1").val()) {$("#cp_apellido1").addClass("er"); key = 0};
      if(!$("#cp_cod_departamento").val()) {$("#cp_cod_departamento").addClass("er"); key = 0};

      if($("#cp_acceso_web").attr("checked") == true)
         if(!$("#cp_usuario").val()) {$("#cp_usuario").addClass("er"); key = 0};

      if(!key) msj.mensaje("MSJ_ER0002", "ER")
      return key;
   }


    // Variables y Métodos públicos
   return {
      // -------------------------------------------------------------------------------------------------------
      x: function()
      {
         $("#persons tbody tr").each(function(index){
            
            // COMO SACAR LA INFORMACION DE UN OBJETO POR CONSOLA
            //console.log(this);

            $("#"+this.id).click(
               function (){
                  //$(this).find("td").eq(0).css("background-color", "#ECF8E0");
                  $(this).css("background-color", "#ECF8E0");
                  $(this).animate({height: "100"}, 500);
                  //alert("Esto:"+this.id);
            });
         });
      },


      // -------------------------------------------------------------------------------------------------------
      // .load([id]); => ...
      load: function(id)
      {
         $("#fFicha .bool").val("");
         $("#fFicha :checkbox").attr("checked",false);
         $("#fFicha .subform").addClass("h");
         $("#vFicha span.h3 span").addClass("h");
         $("#vFicha button:eq(0)").removeClass("h");
         $("#vFicha button:eq(1)").addClass("h");

         $.post("index.php",{ch: $$.outChorizo(), c_ajax: "load", cod_persona:id}, function(data) {
            if(msj.esMensaje(data))
            {
               msj.mensaje(data, msj.getTipo(data));
            } else {

               $("#fFicha h1").html("["+id+"] "+data.nombre+" "+data.apellido1+" "+data.apellido2);

               $("#cp_cod_persona").val(id);
               $("#cp_nombre").val(data.nombre);
               $("#cp_apellido1").val(data.apellido1);
               $("#cp_apellido2").val(data.apellido2);
               $("#cp_dni").val(data.dni);
               $("#cp_usuario").val(data.usuario);
               $("#cp_cod_departamento").val(data.cod_departamento);
               $("#cp_cod_centro").val(data.cod_centro);

               $("#emails ul").html('');
               if(typeof(data.emails)=='object')
                  if(data.emails.length)
                  {
                     for(i=0;i<data.emails.length;i++)
                     {
                        $("#emails ul").append("<li class=c></li>");
                        $("#cpb_cod_email").clone().appendTo("#emails li:eq("+i+")").removeClass("h");
                        
                        $("#emails li:eq("+i+") img").click(
                           function()
                           {
                              $("#emails ul li:eq("+i+")").addClass("er");
                           }
                        );
                        
                        $("#cp_cod_email"+i).val(data.emails[i]);
                        $("#emails select:eq("+(i+1)+")").val(data.emails[i]);
                     }
                     $("#fFicha .subform:eq(0)").removeClass("h");
                  }

               if(parseInt(data.acceso_web) && $$.c_user == 1)
               {
                  $("#cp_acceso_web").attr('checked',true);

                  /* ACTIVAR O DESACTIVAR CHECKBOX DE PERMISOS */
                  $("#fFicha .subform:eq(1)").removeClass("h");
                  if(data.permisos)
                     for(i=0;i<data.permisos.length;i++)
                     {
                        if(data.permisos.charAt(i) === '1')
                           $("#pu"+i).attr('checked',true);
                        else
                           $("#pu"+i).attr('checked',false);
                     }
                  /*********************************************/

               }

            }
         },'json');
      },


      // -------------------------------------------------------------------------------------------------------
      formFicha: function(id)
      {
         persons.load(id);
         $("#vFicha input.bool").attr({disabled: "disabled"});
         $("#vFicha select.bool").attr({disabled: "disabled"});
         //$("#vFicha .submit").addClass("h");
         $("#vFicha").toggle();
      },

      // -------------------------------------------------------------------------------------------------------
      alta: function()
      {
         this.editar();
         $("#vFicha h1").html('nueva persona');
         $("#cp_cod_persona").val(''); // Vaciamos el formulario
         $("#vFicha .bool").val(''); // Vaciamos el formulario
         $("#vFicha :checkbox").attr('checked',false); // Vaciamos el formulario
         $("#fFicha .subform").addClass("h");
         $("#fFicha .subform:eq(0)").removeClass("h");
         $("#emails ul").html(''); // Vaciamos el .subform de emails

         $("#vFicha").toggle();
         $("#cp_nombre").focus();

      },

      // -------------------------------------------------------------------------------------------------------
      editar: function()
      {
         $("#fFicha .bool").removeClass("er");
         $("#vFicha .bool").removeAttr("disabled");
         $("#vFicha span.h3 span").toggleClass("h"); // Mostrar o no el boton añadir email
         $("#vFicha button:eq(0)").addClass("h");
         $("#vFicha button:eq(1)").removeClass("h");

         $("#fFicha .subform:eq(0)").removeClass("h");

         for(i=0;i<($("#emails ul li").length);i++)
         {
            $("#emails ul li:eq("+i+")").append("&nbsp;<img class=bt src=./_img/ic-del.png onclick=\"$(this).parent('li').remove();\" />");
         }
         $("#cp_nombre").focus();
      },


      // -------------------------------------------------------------------------------------------------------
      addMail: function()
      {
         n = $("#emails ul li").length;
         $("#emails ul").append("<li class=c></li>");
         $("#cpb_cod_email").clone()
            .appendTo("#emails li:eq("+n+")")
            .attr({disabled: ""})
            .removeClass("h");
         $("#emails ul li:eq("+n+")").append("&nbsp;<img class=bt src=./_img/ic-del.png onclick=\"$(this).parent('li').remove();\" />");
      },


      // -------------------------------------------------------------------------------------------------------
      enviar: function()
      {
         var m = '';
         if(esValido())
         {
            for(i=1;i<$("#emails select").length;i++)
            {
               if($("#emails select:eq("+i+")").val() && $("#emails select:eq("+i+")").val() != 'undefined')
                  m += $("#emails select:eq("+i+")").val()+"|";
            }

            $.post("index.php",{ch: $$.outChorizo(), c_ajax: "envio",
                  cod_persona:$("#cp_cod_persona").val(),
                  nombre:$("#cp_nombre").val(),
                  apellido1:$("#cp_apellido1").val(),
                  apellido2:$("#cp_apellido2").val(),
                  dni:$("#cp_dni").val(),
                  cod_departamento:$("#cp_cod_departamento").val(),
                  cod_centro:$("#cp_cod_centro").val(),
                  usuario:$("#cp_usuario").val(),
                  acceso_web:(($("#cp_acceso_web").attr("checked")==true)?1:0),
                  mails:m,
                  permisos:this.user.pu_fmtoBBDD()

               }
               ,function(data)
               {
                  if(msj.esMensaje(data))
                  {
                     msj.mensaje(data, msj.getTipo(data));
                     if(msj.getTipo(data) == 'OK')
                     {
                        $("#vFicha").toggle();
                     }
                  } else alert(data);
               }
            );
         }
      },


      /*
      "baja": function(nombre, id){
      var respuesta = confirm("El siguiente usuario será dado de baja: \n\n- ["+nombre+"]\n ");

      if (respuesta== true) {
      $.post("index.php",{c_mod: c_mod, c_oper: "baja", cod_persona: id},
         function(data){
            alert(data);
      });
      } else {  } // Si la respuesta no es afirmativa, no hacer nada
      },
      */

      user: function(){
         var num_pu = 8; //Empieza en 0
         return {

            // Convertir los permisos de usuario a formato BBDD
            pu_fmtoBBDD: function(){
               var s='0';

               for(i=1;i<=$("#pu input:checkbox").length;i++){
                  if($("#pu"+i).attr("checked"))
                     s += '1';
                  else s += '0';
               }

               return s;
            },


            // Formulario para el cambio contraseña del usuario
            fccu: function(){
               if($("#user_pass").is(":visible")){ // CERRAMOS
                  $('#user_pass').toggle('fast');
                  $('#bt001').toggle();
               } else { // ABRIMOS
                  $('#bt001').toggle();
                  $('#user_pass input').val('');
                  $('#user_pass input').removeClass('er');
                  $('#user_pass').toggle('fast');
                  $("#user_pass input:eq(0)").focus();
               }
            },


            // Formulario para el cambio contraseña del usuario
            fccu_valid: function(){
               if($('#user_pass input:eq(0)').val() != '' && $('#user_pass input:eq(0)').val() == $('#user_pass input:eq(1)').val())
               {
                  $.post("index.php",{ch: $$.outChorizo()+'m01s01', c_ajax: "pass",
                        //cod_usuario: c_user,
                        pass: $("#user_pass input:eq(0)").val()
                     }
                     ,function(data) {
                        if(msj.esMensaje(data)) {
                           msj.mensaje(data, msj.getTipo(data));
                           if(msj.getTipo(data) == 'OK'){
                              persons.user.fccu();
                           }
                        } else alert(data);
                     }
                  );
               }
               else {
                  $('#user_pass input').addClass('er');
                  msj.mensaje("La nueva contraseña no coincide o esta vacía", "ER");
               }
            }
         }
      }()

   };
}();
