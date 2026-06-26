<?php
session_start();
include("conexion.php");

if($_POST){

    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = mysqli_query($conn, "SELECT * FROM usuarios WHERE email='$email'");
    $user = mysqli_fetch_assoc($sql);

    if($user){

        if(password_verify($password, $user['password'])){

            $_SESSION['id_usuario'] = $user['id_usuario'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['rol'] = $user['rol'];

            header("Location: index.php");
            exit();

        } else {
            $error = "Contraseña incorrecta";
        }

    } else {
        $error = "Usuario no encontrado";
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Login | TicketFlow</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="styless.css">
</head>

<body>

<div class="fila-container">

    <div class="fila-card">

        <h2 class="fila-title">Iniciar Sesión</h2>
        <p class="fila-subtitle">Accedé a TicketFlow</p>

        <?php if(isset($error)): ?>
            <div class="alert alert-danger py-2">
                <?php echo $error; ?>
            </div>
        <?php endif; ?>

        <form method="POST">

            <input 
                type="email" 
                name="email" 
                class="form-control mb-3" 
                placeholder="Email"
                required
            >

            <input 
                type="password" 
                name="password" 
                class="form-control mb-3" 
                placeholder="Contraseña"
                required
            >

            <button type="submit" class="btn btn-primary w-100">
                Entrar
            </button>

        </form>

        <p class="mt-3 text-muted">
            ¿No tenés cuenta?
            <a href="registro.php">Registrate</a>
        </p>
        <div class="text-center mt-3">

    <a href="index.php" class="btn btn-outline-primary w-100 mb-2">
        Volver al inicio
    </a>

</div>    
    </div>

</div>

</body>
</html>