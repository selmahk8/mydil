<?php

$nom = $_POST["nom"];
$mail = $_POST["mail"];
$ville = $_POST["ville"];
$phone = $_POST["phone"];
$demander = $_POST["demander"];

$host ="localhost";
$dbname = "project";
$username = "root";
$password = "";

$conn = mysqli_connect($host, $username, $password, $dbname);

if (mysqli_connect_errno()) {
    die("connection error: " . mysqli_connect_error());
}

$sql = "INSERT INTO demander (nom, mail, ville, phone, demander)
        VALUES ('$nom', '$mail', '$ville', '$phone', '$demander')";

$stmt = mysqli_stmt_init($conn);

if (! mysqli_stmt_prepare($stmt, $sql)) {
    die(mysqli_error($conn));
}
else{
    echo "<script>alert('Vos données ont été téléchargées dans la base de données pour examen.');location='formulaire.html'</script>";
}

mysqli_stmt_execute($stmt);

