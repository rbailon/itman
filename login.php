
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
						$("#er_login").html("'.$errLogin.'").show("slow");
					';
				}

		  ?>
		  $("#user").focus();

	 });
</script>


<BODY>
<CENTER>
<div class="login">

	 <div>
		  <br><br>
		  <h1><?php echo PROGRAMA; ?></h1>
		  <h2><?php echo DESCRIPCION; ?></h2>
		  <br>
		  <div class="form">
				<fieldset>
				<form name="login" action="./" method="post">
					 <ul>
						  <li><label>Usuario:</label><input type="text" id="user" name="user" size="20" value=""></li>
						  <li>&nbsp;</li>
						  <li><label>Contraseña:</label><input type="password" id="pass" name="pass" size="20" value=""></li>
						  <li><input type="hidden" name="life" value="1"></li>
						  <li>&nbsp;</li>
						  <li><label></label><button id="submit" type="submit" class="bt"><span>Entrar</span></button></li>
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
/*
	if(!isset($oEnt)) {
		require_once('./_cl/cl_entorno.php');
		require_once('_VARS&CONST.php');
		require_once('_FUNCIONS.php');

		$oEnt = new Entorno ($_GET, $_POST);

		//Conectamos a la base de datos
		$db = new DB ($globs);
		$link = $db->link;

		if(strstr($oEnt->dato['user'], '@'))
			$u = $oEnt->dato['user'];
		else
			$u = $oEnt->dato['user'].'@ayuntamientodetias.es';

		$qdb = new Qdb ($link ," SELECT * FROM tb_personas WHERE usuario = '".$u."' AND pass = password('".$oEnt->dato['ident']."') ");

		if($qdb->num_registros) {
			$tab_campos = $qdb->db_fetch_registro();

			Header("Set-Cookie:".$globs['name_cookie']."=".$tab_campos['cod_persona']."|email|;");
			echo "200";
		}
		else { echo "MSJ_ER0009"; }
	} else {
?>

<HTML>
<HEAD>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
	<meta name="keywords" content="">
	<meta name="description" content="">
	<title><?php echo $globs['programa'].' '.$globs['version'].' - IDENTIFICACION'; ?></title>

	<link rel="stylesheet" type="text/css" href="./_css/login.css"/>
	<!--[if IE]><link rel="stylesheet" type="text/css" href="./_css/_ie.css"/><![endif]-->
	<script languaje="javascript" src="./_js/jquery.min.js" type="text/javascript"></script>
	<script languaje="javascript" src="./_js/login.js" type="text/javascript"></script>
	<script languaje="javascript" src="./_js/_msj.js" type="text/javascript"></script>
	<link rel="shortcut icon" href="./_img/favicon.gif">

	<script type='text/javascript'>$(document).ready(init);</script>

</HEAD>


<BODY onload="document.forms.identificacion.user.focus()" id="idlogin">

<div class=xx>
	<div id="dv_login">
		<!--<h1>gdiat</h1>-->
		<img src="./_img/fo-portada.png" />
		<br><br>
		<h1>Ayuntamiento de Tías</h1>
		<h2>Departamento Informática</h2>
		<br>
		<div class="form">
			<fieldset>
			<form name="identificacion" action="javascript:validarLogin()">
			<ul>
				<li><label>Usuario:</label><input type="text" id="user" size="30" value=""></li>
				<li>&nbsp;</li>
				<li><label>Contraseña:</label><input type="password" id="ident" size="30" value=""></li>
				<li>&nbsp;</li>
				<li><label></label><button id="submit" type="submit"><span>Entrar</span></button></li>
			</ul>
			</form>
			</fieldset>
		</div>
		<div id="er_login"></div>
	</div>
</div>

</BODY>
</HTML>

<?php }
//*/
?>
