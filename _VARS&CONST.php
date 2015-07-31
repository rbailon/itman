<?php
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


   //@@@@@@@@@@@@@@@@@@@@@@@@@@@
   // GLOBALES
   //@@@@@@@@@@@@@@@@@@@@@@@@@@@
   global

       $DB
      ,$oEnt
      ,$oUser
      ,$sal
   ;

   //@@@@@@@@@@@@@@@@@@@@@@@@@@@
   // VARIABLES BBDD
   //@@@@@@@@@@@@@@@@@@@@@@@@@@@
   define('DATABASE_HOST', 'localhost');
   define('DATABASE_USER', 'gdiat');
   define('DATABASE_PASS', 'gdiat.pass');
   define('DATABASE_NAME', 'gdiat');

   //@@@@@@@@@@@@@@@@@@@@@@@@@@@
   // CONSTANTES
   //@@@@@@@@@@@@@@@@@@@@@@@@@@@
   // D A T O S   G E N E R A L E S   D E L   P R O G R A M A
   define('PROGRAMA', 'ITMAN');
   define('DESCRIPCION', 'Gestor IT');
   define('VERSION', '0.1');

   // E X P R E S I O N E S   R E G U L A R E S
   define("EXPR_EMAIL","^[a-z0-9]+([_\\.-][a-z0-9]+)*@([a-z0-9]+([\\.-][a-z0-9]+)*)+\\.[a-z]{2,}$|^$");
   define("EXPR_NOMBRE_PROPIO",  ".{2,}");
   define("EXPR_NUM","^[0-9]*$");
   define("EXPR_NUM_OBLIGADO","^[0-9]{1,}$");
   define("EXPR_NUM_DECIMALES","^[0-9][0-9]*(\,[0-9][0-9])$");
   define("EXPR_IP","^[0-9][0-9][0-9].[0-9][0-9][0-9].[0-9][0-9][0-9].[0-9][0-9][0-9]$");
   define("EXPR_FECHA_DD_MM_AAAA","^ *[0-9]{1,2}[-|/|\.]*[0-9]{1,2}[-|/|\.]*[0-9]{4}$");

   // P E R M I S O S   U S U A R I O S (Posición en el campo ["PERMISO"])
   define("PU_LOGIN","0"); // Para si activo o no

   define("PU_ALTA_PERSONA","1");
   define("PU_BAJA_PERSONA","2");
   define("PU_MODI_PERSONA","3");
   define("PU_CONS_PERSONA","4");

   define("PU_ALTA_EMAIL","5");
   define("PU_BAJA_EMAIL","6");
   define("PU_MODI_EMAIL","7");
   define("PU_CONS_EMAIL","8");

   define("PU_ALTA_CONSUMIBLE","9");
   define("PU_BAJA_CONSUMIBLE","10");
   define("PU_MODI_CONSUMIBLE","11");
   define("PU_CONS_CONSUMIBLE","12");

   define("PU_ALTA_INCIDENCIA","13");
   define("PU_BAJA_INCIDENCIA","14");
   define("PU_MODI_INCIDENCIA","15");
   define("PU_CONS_INCIDENCIA","16");

   define("PU_ALTA_IMPRESORA","17");
   define("PU_BAJA_IMPRESORA","18");
   define("PU_MODI_IMPRESORA","19");
   define("PU_CONS_IMPRESORA","20");

   define("PU_ALTA_MODELO","21");
   define("PU_BAJA_MODELO","22");
   define("PU_MODI_MODELO","23");
   define("PU_CONS_MODELO","24");

   define("PU_ALTA_TAREA","25");
   define("PU_BAJA_TAREA","26");
   define("PU_MODI_TAREA","27");
   define("PU_CONS_TAREA","28");


   define("PU_CONS_DEPARTAMENTO","99");
   define("PU_CONS_CENTRO","99");
   define("PU_CONS_PROVEEDOR","99");

/*


    $globs['name_cookie']         = 'ckgdiat';


    //*/
    //@@@@@@@@@@@@@@@@@@@@@@@@@@@
    // VARIABLES GENERALES
    //@@@@@@@@@@@@@@@@@@@@@@@@@@@
   //
   //  $globs['regs_x_pagina']         = '25';
    //
   //  $cods_dias_semana = array('0'=>'Domingo','1'=>'Lunes','2'=>'Martes','3'=>'Miercoles','4'=>'Jueves','5'=>'Viernes','6'=>'Sabado');
   //  $cods_meses = array('01'=>'Enero','02'=>'Febrero','03'=>'Marzo','04'=>'Abril','05'=>'Mayo','06'=>'Junio','07'=>'Julio','08'=>'Agosto','09'=>'Septiembre','10'=>'Octubre','11'=>'Noviembre','12'=>'Diciembre');
   //  $cods_localidades = array(''=>'','1'=>'Conil','2'=>'La Asomada','3'=>'Masdache','4'=>'Mácher','5'=>'Puerto del Carmen','6'=>'Tegoyo','7'=>'Tías');

    /*
    $tab_localidades->size = 7;
    $tab_localidades->key_ = array ('1','2','3','4','5','6','7');
    $tab_localidades->value_ = array ('1'=>'Conil','2'=>'La Asomada','3'=>'Masdache','4'=>'Mácher','5'=>'Puerto del Carmen','6'=>'Tegoyo','7'=>'Tías');
    */

?>
