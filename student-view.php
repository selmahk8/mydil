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

    <title>View</title>
</head>
<body>

    <div class="container mt-5">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>View Details
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
                                
                                    <div class="mb-3">
                                        <label>ID</label>
                                        <p class="form-control">
                                            <?=$student['id'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Nom</label>
                                        <p class="form-control">
                                            <?=$student['nom'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Ville</label>
                                        <p class="form-control">
                                            <?=$student['ville'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Quantité</label>
                                        <p class="form-control">
                                            <?=$student['quantite'];?>
                                        </p>
                                    </div>

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

