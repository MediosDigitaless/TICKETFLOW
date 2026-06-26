<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>TicketFlow</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS -->
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

            <?php if(isset($_SESSION['id_usuario'])): ?>

                <span class="text-white me-3">
                    Hola <?php echo $_SESSION['email'] ?? 'usuario'; ?>
                </span>

                <a href="logout.php" class="btn btn-light btn-sm">
                    Cerrar sesión
                </a>

            <?php else: ?>

                <a href="login.php" class="btn btn-light btn-sm me-2">
                    Login
                </a>

                <a href="registro.php" class="btn btn-outline-light btn-sm">
                    Registro
                </a>

            <?php endif; ?>

        </div>

    </div>
</nav>

<!-- HERO -->
<div class="container py-5 text-center">

    <h1 class="fw-bold mb-3">
        TicketFlow
    </h1>

    <p class="text-muted mb-4">
        Elegí un concierto y entrá a la fila virtual
    </p>

</div>

<!-- CONCIERTOS -->
<div class="container">

    <h3 class="mb-3">Conciertos disponibles</h3>

    <div class="row g-3">

        <div class="col-md-4">
            <div class="card p-3 shadow-sm">
                <h5>Coldplay</h5>
                <a href="fila.php?evento=coldplay" class="btn btn-primary mt-2">
                    Entrar a la fila
                </a>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card p-3 shadow-sm">
                <h5>Duki</h5>
                <a href="fila.php?evento=duki" class="btn btn-primary mt-2">
                    Entrar a la fila
                </a>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card p-3 shadow-sm">
                <h5>Taylor Swift</h5>
                <a href="fila.php?evento=taylor" class="btn btn-primary mt-2">
                    Entrar a la fila
                </a>
            </div>
        </div>

    </div>

</div>

</body>
</html>