<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesion - TicketSoporte</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="assets/css/style.css" rel="stylesheet">
</head>
<body>
    <div class="login-container d-flex align-items-center justify-content-center">
        <div class="card shadow border-0 rounded-4 w-100" style="max-width: 420px;">
            <div class="card-body p-4 text-center">
                <i class="fa-solid fa-headset fs-1 text-primary"></i>
                <h3 class="mt-3 fw-bold">TicketSoporte</h3>
                <p class="text-muted">Inicia sesion para continuar</p>

                <?php
                    if (isset($_SESSION['mensaje'])) {
                        $tipo = isset($_SESSION['tipo']) ? $_SESSION['tipo'] : 'danger';
                ?>
                <div class="alert alert-<?php echo $tipo; ?> alert-dismissible fade show text-start">
                    <?php echo $_SESSION['mensaje']; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
                <?php
                    unset($_SESSION['mensaje']);
                    unset($_SESSION['tipo']);
                    }
                ?>

                <form action="controllers/login.php" method="POST" class="text-start">
                    <div class="mb-3">
                        <label class="form-label">Correo</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                            <input type="email" name="usuario" class="form-control" placeholder="Ejem. correo@gmail.com" required autofocus>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Contraseña</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Tu contraseña" required>
                            <button type="button" class="btn btn-outline-secondary" onclick="mostrarPassword()">
                                <i class="fa-solid fa-eye" id="iconoPassword"></i>
                            </button>
                        </div>
                    </div>

                    <div class="d-grid mt-4">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa-solid fa-right-to-bracket"></i>
                            Iniciar Sesion
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="text-center text-white mt-3 small">
            Sistema de Tickets de Soporte Desarrollado por Programacion para Internet III
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function mostrarPassword() {
            const password = document.getElementById("password");
            const icono = document.getElementById("iconoPassword");

            if (password.type === "password") {
                password.type = "text";
                icono.classList.remove("fa-eye");
                icono.classList.add("fa-eye-slash");
            } else {
                password.type = "password";
                icono.classList.remove("fa-eye-slash");
                icono.classList.add("fa-eye");
            }
        }
    </script>
</body>
</html>
