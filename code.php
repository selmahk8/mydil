<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demande de matériels</title>
    <link rel="stylesheet" href="home.css">
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
                    <a href="modifierinventaire.php">Modifier Inventaire</a>
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


</body>
</html>



<?php
session_start();
require 'dbcon.php';

if(isset($_POST['delete_student']))
{
    $student_id = mysqli_real_escape_string($con, $_POST['delete_student']);

    $query = "DELETE FROM liste WHERE id='$student_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Equipment Deleted Successfully";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Equipment Not Deleted";
        header("Location: index.php");
        exit(0);
    }
}

if(isset($_POST['update_student']))
{
    $student_id = mysqli_real_escape_string($con, $_POST['student_id']);

    $id = mysqli_real_escape_string($con, $_POST['id']);
    $nom = mysqli_real_escape_string($con, $_POST['nom']);
    $ville = mysqli_real_escape_string($con, $_POST['ville']);
    $quantite = mysqli_real_escape_string($con, $_POST['quantite']);

    $query = "UPDATE liste SET id='$id', nom='$nom', ville='$ville', quantite='$quantite' WHERE id='$student_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Equipment Updated Successfully";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Equipment Not Updated";
        header("Location: index.php");
        exit(0);
    }

}


if(isset($_POST['save_student']))
{
    $id = mysqli_real_escape_string($con, $_POST['id']);
    $nom = mysqli_real_escape_string($con, $_POST['nom']);
    $ville = mysqli_real_escape_string($con, $_POST['ville']);
    $quantite = mysqli_real_escape_string($con, $_POST['quantite']);

    $query = "INSERT INTO liste (id,nom,ville,quantite) VALUES ('$id','$nom','$ville','$quantite')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Equipment Created Successfully";
        header("Location: student-create.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Equipment Not Created";
        header("Location: student-create.php");
        exit(0);
    }
}

?>

