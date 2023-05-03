<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="assets/css/bootstrap-5.0.0-alpha-2.min.css" />
    <link rel="stylesheet" href="assets/css/LineIcons.2.0.css"/>
    <link rel="stylesheet" href="assets/css/animate.css"/>
    <link rel="stylesheet" href="assets/css/lindy-uikit.css"/>
    <title>Inventaire MyDil</title>
</head>

<body>
     <header>
        <div class="logo">
            <img src="mydilogo.png" alt="">
        </div>
        <input type="checkbox" id="nav_check" hidden>
        <nav>
            <div class="logo">
                <img src="mydilogo.png" alt="">
            </div>
            <ul>
                <li>
                    <a href="home.php">Home</a>
                </li>
                <li>
                    <a href="villes.html">Villes</a>
                </li>
                <li>
                    <a href="formulaire.html">Formulaire demande de matériels</a>
                </li>
                <li>
                    <a href="index.php">Modifier Inventaire</a>
                </li>
                <li>
                    <a href="contactform.html">Contact</a>
                </li>
                <li>
                    <a href="index.html"class="active">Déconnexion</a>
                </li>
            </ul>
        </div>
        </nav>
        <label for="nav_check" class="hamburger">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
        </label>
</header>

<center>
    <h3>Voir l'équipement </h3>
    <br>
</center>

<div class="progress">
<div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
</div>
<div class="progress">
<div class="progress-bar bg-warning" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
</div>
<div class="progress">
<div class="progress-bar bg-danger" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
</div>
<br>
<br>



<?php

$ville=$_POST['ville'];
if(!isset($ville)){
	echo('Error:There is no database');
	exit;
}

$conn = mysqli_connect("localhost","root","","project");
if(mysqli_connect_errno())
{
	echo "Error:Couldnot connect the database";
	exit;
}

$find = "select * from liste where ville='".$ville."'";
$result = mysqli_query($conn,$find);
$rownum=mysqli_num_rows($result);

for($i=0;$i<$rownum;$i++){
	$rows=mysqli_fetch_assoc($result);
	
   
    echo "<font color=orange>Nous avons recherché les informations suivantes : <br/></font>";
	echo "L'identifiant de l'appareil est".": ".$rows['id']."<br/>";
	echo "Le nom de l'appareil est".": ".$rows['nom']."<br/>";
	echo "Lieu d'origine est".": ".$rows['ville']."<br/>";
	echo "Le numéro de cet équipement est".": ".$rows['quantite']."<br/>";
    echo "---------------------------------------------------------------------------------------------------<br/>";
}

mysqli_free_result($result);
mysqli_close($conn);











?>
