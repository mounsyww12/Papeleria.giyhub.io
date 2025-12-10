<?php
session_start();

if (isset($_POST["metodo"])) {
    $_SESSION["pago"] = $_POST["metodo"];
    header("Location: ticket.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Método de Pago - MonWen</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<h1 class="titulo">Selecciona un Método de Pago</h1>

<nav>
    <a href="index.php">Inicio</a>
</nav>

<form method="post" class="pago-form">
    <label><input type="radio" name="metodo" value="Efectivo" required> Efectivo</label><br>
    <label><input type="radio" name="metodo" value="Tarjeta"> Tarjeta</label><br>
    <label><input type="radio" name="metodo" value="Transferencia"> Transferencia</label><br>
    <label><input type="radio" name="metodo" value="QR"> Pago con QR</label><br>

    <button type="submit">Confirmar</button>
</form>

</body>
</html>