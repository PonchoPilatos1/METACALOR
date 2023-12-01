<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include "Auth.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["user"];
    $password = $_POST["password"];

    $auth = new Auth();
    $resultado = $auth->verificarCredenciales($username, $password);

    if ($resultado === "0") {
        echo "<script>alert('Contraseña incorrecta');</script>";
        echo "<script>window.location.href = 'login.html';</script>";
    } elseif ($resultado === "3") {
        echo "<script>alert('Correo no encontrado');</script>";
        echo "<script>window.location.href = 'login.html';</script>";
    } else {
        list($id, $nombreUsuario) = $resultado;
        $_SESSION["user_id"] = $id;
        $_SESSION["username"] = $nombreUsuario;
        echo "<script>window.location.href = 'pagina_inicio_usuario.php';</script>";
        exit();
    }
}
?>