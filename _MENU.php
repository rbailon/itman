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
    _MENU.php
    ===================
    Crea el menu del sistema según los permisos del usuario activo

    Version: 0.1
    Creado: 20150225
    Autor: rbailonf@gmail.com
    Ultima Modificacion: 20150225
    /////////////////////////////////////////////////////////////////////////

*/


    
?>

        <!-- INI MENU -->
        <div id="menu">
            <ul id="nav">
                <li><a href="#"><?php echo PROGRAMA; ?></a></li>
                <li>|</li>
                <li>Gestión
                    <ul id="subnav">
                        <li><a href="?ch=es002">Personas</a></li>
                        <li><a href="?ch=es003">Emails</a></li>
                        <li><a href="?ch=es004">Ordenadores</a></li>
                        <li><a href="?ch=es005">Impresoras</a></li>
                    </ul>
                </li>
                <li>|</li>
                <li><a href="?ch=es006">Incidencias</a>
                    <ul id="subnav">
                        <li><a href="#">Nueva</a></li>
                        <li><a href="#">Pendientes</a></li>
                        <li><a href="#">Resuletas</a></li>
                    </ul>
                </li>
                <li>|</li>
                <li><a href="#">Contratos</a>
                    <ul id="subnav">
                        <li><a href="#">Mantenimientos</a></li>
                        <li><a href="#">Dominios</a></li>
                    </ul>
                </li>
                <li>|</li>
                <li><a href="">Presupuesto</a></li>
                <li>-</li>
                <li><a href="./?out=1">Salir</a></li>
            </ul>
        </div>
        <!-- FIN MENU -->