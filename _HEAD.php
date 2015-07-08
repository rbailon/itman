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

    /////////////////////////////////////////////////////////////////////////
    _HEAD.php
    ===================
    Cabecera

    Version: 0.1
    Creado: 20150222
    Autor: rbailonf@gmail.com
    Ultima Modificacion: 20150222
    /////////////////////////////////////////////////////////////////////////

*/

    $sal .= '<!DOCTYPE html>
    <HTML lang="es">
        <HEAD>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta name="keywords" content="" />
            <meta name="description" content="" />
            <title>'.PROGRAMA.' '.VERSION.'</title>

            <link rel="shortcut icon" href="./_img/favicon.gif" />

            <!-- jQuery -->
            <script type="text/javascript" language="javascript" src="_js/jquery.min.js"></script>
            <script type="text/javascript" language="javascript" src="_js/jquery.dataTables.min.js"></script>     
            <link rel="stylesheet" type="text/css" href="_css/jquery.dataTables.min.css">

            <!-- Bootstrap -->
            <script type="text/javascript" language="javascript" src="bootstrap/js/bootstrap.min.js"></script>
            <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />

            <!-- ITman -->
            <script type="text/javascript" language="javascript" src="_js/_.js"></script>
            <script type="text/javascript" language="javascript" src="_js/_menu.js"></script>
            <link rel="stylesheet" type="text/css" href="./_css/_.css" />

            <script type="text/javascript" language="javascript" class="init">
                var globs = {};
                globs.kn = "'.$_GET["ch"].'";
                
                $(document).ready(function(){
                    $$.kerbero();
                    $$.menu();                    
                    $$.start();
                    M.start();
                });
            </script>
            
        </HEAD>

        <BODY>

    ';
?>






