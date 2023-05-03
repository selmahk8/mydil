
<?php

require_once 'dbcon.php';

$username=$_POST['username'];
$password=$_POST['password'];

$sql="select id,username,password from login where username='$username' AND password='$password';";
$result=mysqli_query($con,$sql);
$row=mysqli_num_rows($result);
 
if(!$row){
 
        echo "<script>alert('Compte ou mot de passe erroné');location='index.html'</script>";
 
    }
    else{
 
        echo "<script>alert('Bienvenue chez MY DIL');location='home.php'</script>";
    };
