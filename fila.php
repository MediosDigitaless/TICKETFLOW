<?php
session_start();
include("conexion.php");

if(!isset($_SESSION['id_usuario'])){
    header("Location: login.php");
    exit();
}

$id = $_SESSION['id_usuario'];
$evento = $_GET['evento'] ?? 'general';

/* =========================
   BUSCAR SI YA ESTÁ EN FILA
========================= */
$check = mysqli_query($conn, "SELECT * FROM fila_virtual WHERE id_usuario=$id AND evento='$evento'");
$fila = mysqli_fetch_assoc($check);

/* =========================
   SI NO ESTÁ → INSERTAR
========================= */
if(!$fila){

    $max = mysqli_query($conn, "SELECT MAX(numero_fila) as maximo FROM fila_virtual WHERE evento='$evento'");
    $row = mysqli_fetch_assoc($max);

    $numero = ($row['maximo'] ?? 0) + 1;

    $token = bin2hex(random_bytes(16));
    $fecha_ingreso = date("Y-m-d H:i:s");
    $fecha_expira = date("Y-m-d H:i:s", strtotime("+10 minutes"));

    mysqli_query($conn, "
        INSERT INTO fila_virtual
        (id_usuario, evento, numero_fila, estado, token, fecha_ingreso, fecha_expira)
        VALUES
        ($id, '$evento', $numero, 'esperando', '$token', '$fecha_ingreso', '$fecha_expira')
    ");

    $fila = [
        "numero_fila" => $numero,
        "estado" => "esperando",
        "token" => $token,
        "fecha_expira" => $fecha_expira
    ];
}

/* =========================
   POSICIÓN EN LA FILA
========================= */
$numero = $fila['numero_fila'];

$delante = mysqli_query($conn, "
    SELECT COUNT(*) as total 
    FROM fila_virtual 
    WHERE evento='$evento' 
    AND numero_fila < $numero
");

$data = mysqli_fetch_assoc($delante);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Fila Virtual - TicketFlow</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

   <link rel="stylesheet" href="styless.css">
</head>

<body>

<!-- NAV -->
<nav class="navbar navbar-expand-lg navbar-dark" style="background:#004E98;">
    <div class="container">

        <a class="navbar-brand fw-bold" href="index.php">
            TicketFlow
        </a>

        <div>
            <a href="index.php" class="btn btn-light btn-sm me-2">Inicio</a>
            <a href="logout.php" class="btn btn-danger btn-sm">Cerrar sesión</a>
        </div>

    </div>
</nav>

<!-- Fila -->
<div class="fila-container">

    <div class="fila-card">

        <h2 class="fila-title">Fila Virtual</h2>

        <p class="fila-subtitle">
            Evento: <?php echo htmlspecialchars($evento); ?>
        </p>

        <div class="fila-numero">
            <?php echo $numero; ?>
        </div>

        <p class="fila-label">Tu posición en la fila</p>

        <div class="fila-info">

    <div class="fila-item">
        <span>Delante</span>
        <strong><?php echo $data['total']; ?></strong>
    </div>

    <div class="fila-item">
        <span>Estado</span>
        <strong><?php echo $fila['estado']; ?></strong>
    </div>

    <div class="fila-item">
        <span>Evento</span>
        <strong><?php echo $evento; ?></strong>
    </div>

</div>

<!-- 👇 TOKEN ABAJO CENTRADO -->
<div class="fila-token">
    <span>Tu token de acceso</span><br>
    <code><?php echo $fila['token']; ?></code>
</div>

    </div>

</div>

</body>
</html>