<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>


<style type="text/css" href = "http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.1/themes/base/jquery-ui.css">
body{
	text-align:center;
}
.zone_zoom{
	margin:20px auto;
	width:500px;
	height:400px;
	overflow:hidden;
	float:left;
	position:absolute;
}
.image{
	float:left;
	position:absolute;
}
.image1 {
	float:left;
	position:absolute;
	pointer-events:none;
}

.img{
  margin-top: 90px;
  margin-left: 300px;
  box-shadow: 8px 8px 0px #aaa; 
}

</style>

</head>

<body>

<!-- inclusion des librairies jQuery et jQuery UI (fichier principal et plugins) -->
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.12/jquery-ui.min.js"></script>
  <script type="text/javascript" src="jfunc.js"></script>


<?php

$x = 0;
$y = 0;

// On récupère les nouvelles coordonnées après le drag de la photo à l'aide d'un GET
if(isset($_GET['x'])){
      $x = $_GET['x'];
      //$x = -$x;
 }
 if(isset($_GET['y'])){
      $y = $_GET['y'];
 }


if($x!=0)
{
  $x = 250-$x;
}

//Cordonnées de départ de la nouvelle image
$dest_x = 0; 
$dest_y = 0; 

//Cordonnées de départ de l'image copiée
$src_departx = 105+$x; 
$src_departy = 90-$y; 

//On définit la largeur de la nouvelle image, en fonction de celle du cadre
$src_largeur = 150; 
$src_hauteur = 220; 

//On créé la nouvelle image recadrée  
$destination = imagecreatetruecolor($src_largeur,$src_hauteur);// on creer une image de la taille du cadre à copier
$source = imagecreatefromjpeg('fond.jpg'); // celle qui sera copiée 
imagecopy($destination, $source, $dest_x, $dest_y, $src_departx, $src_departy, $src_largeur, $src_hauteur);
 
//On l'enregistre dans le dossier courant, avec le nom "out.jpg"
imagejpeg($destination, "out.jpg");
 
?>

<div class='zone_zoom'>

    <img src='fond.jpg' class='image' />
    <img src='fondgris.png' class='image1' />

</div>

<input type='submit' value ='Générer' id="button" />

<div id="out">
 <img src='out.jpg' class='img' />
</div>

</body>
</html>
