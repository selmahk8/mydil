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
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Edit Equipment</title>
</head>
<body>
  
    <div class="container mt-5">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit 
                            <a href="index.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if(isset($_GET['id']))
                        {
                            $student_id = mysqli_real_escape_string($con, $_GET['id']);
                            $query = "SELECT * FROM liste WHERE id='$student_id' ";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $student = mysqli_fetch_array($query_run);
                                ?>
                                <form action="code.php" method="POST">
                                    <input type="hidden" name="student_id" value="<?= $student['id']; ?>">

                                    <div class="mb-3">
                                        <label>ID</label>
                                        <input type="text" name="id" value="<?=$student['id'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Nom</label>
                                        <input type="text" name="nom" value="<?=$student['nom'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Ville</label>
                                        <input type="text" name="ville" value="<?=$student['ville'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Quantité</label>
                                        <input type="number" name="quantite" value="<?=$student['quantite'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" name="update_student" class="btn btn-primary">
                                            Update
                                        </button>
                                    </div>

                                </form>
                                <?php
                            }
                            else
                            {
                                echo "<h4>No Such Id Found</h4>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

