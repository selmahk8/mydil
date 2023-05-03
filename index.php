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

    <title>Liste du matériels</title>
</head>
<body>
  
    <div class="container mt-4">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Liste du matériels
                            <a href="student-create.php" class="btn btn-primary float-end">Ajouter</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nom</th>
                                    <th>Ville</th>
                                    <th>Quantité</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $query = "SELECT * FROM liste";
                                    $query_run = mysqli_query($con, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $liste)
                                        {
                                            ?>
                                            <tr>
                                                <td><?= $liste['id']; ?></td>
                                                <td><?= $liste['nom']; ?></td>
                                                <td><?= $liste['ville']; ?></td>
                                                <td><?= $liste['quantite']; ?></td>
                                                <td>
                                                    <a href="student-view.php?id=<?= $liste['id']; ?>" class="btn btn-info btn-sm">View</a>
                                                    <a href="student-edit.php?id=<?= $liste['id']; ?>" class="btn btn-success btn-sm">Edit</a>
                                                    <form action="code.php" method="POST" class="d-inline">
                                                        <button type="submit" name="delete_student" value="<?=$liste['id'];?>" class="btn btn-danger btn-sm">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "<h5> No Record Found </h5>";
                                    }
                                ?>
                                
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

