<?php

include('conexion.php');
session_start();

if(isset($_POST["login"])){
    $usuario = $_POST["usuario"];
    $password = $_POST["password"];
    
    $conn = getConexion();
    $sql = "SELECT * FROM usuario WHERE usuario = '". $usuario ."' AND password = '" . $password ."'";
    $result = mysqli_query($conn, $sql);
    
    if(mysqli_num_rows($result) > 0){
        $_SESSION["logueado"] = true;
        $_SESSION["usuario"] = $usuario;

        header("location: index.php");
    } else {
        header("location: login.php?error=1");
    }
    
} else {
    session_destroy();
    header("location: index.php");
}
?>