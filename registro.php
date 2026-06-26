<?php
include("conexion.php");

if($_POST){

    $email = $_POST['email'];
    $password = $_POST['password'];

    if(empty($email) || empty($password)){
        $error = "Completa todos los campos";
    } else {

        $check = mysqli_query($conn, "SELECT * FROM usuarios WHERE email='$email'");
        $exists = mysqli_fetch_assoc($check);

        if($exists){
            $error = "Este email ya está registrado";
        } else {

            $passwordHash = password_hash($password, PASSWORD_DEFAULT);

            mysqli_query($conn, "INSERT INTO usuarios(email,password)
            VALUES('$email','$passwordHash')");

            header("Location: login.php");
            exit();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
<meta charset="UTF-8">
<title>Registro | TicketFlow</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="styless.css">
</head>

<body>

<div class="fila-container">

    <div class="fila-card">

        <h2 class="fila-title">Registro</h2>
        <p class="fila-subtitle">Creá tu cuenta en TicketFlow</p>

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
                Crear cuenta
            </button>

        </form>

        <p class="mt-3 text-muted">
            ¿Ya tenés cuenta?
            <a href="login.php">Iniciá sesión</a>
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