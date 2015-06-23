
<HTML>
<HEAD>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <title><?php echo PROGRAMA.' '.VERSION.' - IDENTIFICACION'; ?></title>

    <link rel="stylesheet" type="text/css" href="./_css/_.css"/>
    <script languaje="javascript" src="_js/jquery.min.js" type="text/javascript"></script>
    <link rel="shortcut icon" href="./_img/favicon.gif">


</HEAD>

<?php
    
?>
<script src="_js/_.js"></script>
<script>
    $(document).ready(function(){
        <?php 
            if ($errLogin) {
                echo '
                    $("#user").val("'.$_POST["user"].'");
                    $("#pass").val("'.$_POST["pass"].'");
                    $("#er_login").toggle().html("'.$errLogin.'");
                ';
            }

        ?>
        $("#user").focus();

    });
</script>


<BODY>
<CENTER>
<div class=xx>

    <div id="dv_login">
        <br><br>
        <h1><?php echo PROGRAMA; ?></h1>
        <h2><?php echo DESCRIPCION; ?></h2>
        <br>
        <div class="form">
            <fieldset>
            <form name="login" action="./" method="post">
                <ul>
                    <li><label>Usuario:</label><input type="text" id="user" name="user" size="30" value=""></li>
                    <li>&nbsp;</li>
                    <li><label>Contraseña:</label><input type="password" id="pass" name="pass" size="30" value=""></li>
                    <li><input type="hidden" name="life" value="1"></li>                    
                    <li>&nbsp;</li>
                    <li><label></label><button id="submit" type="submit" class="btn"><span>Entrar</span></button></li>
                </ul>
            </form>
            </fieldset>
        </div>
        
        <div id="er_login"></div>
    </div>

</div>
</CENTER>
</BODY>
</HTML>

<?php
/*
   <script type='text/javascript'>$(document).ready(init);</script>
 
   <!--[if IE]><link rel="stylesheet" type="text/css" href="./_css/_ie.css"/><![endif]-->
   <script languaje="javascript" src="./_js/jquery.js" type="text/javascript"></script>
   <script languaje="javascript" src="./_js/login.js" type="text/javascript"></script>
   <script languaje="javascript" src="./_js/_msj.js" type="text/javascript"></script>
   <link rel="shortcut icon" href="./_img/favicon.gif">

//*/
?>
