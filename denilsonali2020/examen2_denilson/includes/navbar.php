<nav class="navbar navbar-light bg-white border-bottom px-3 py-3 shadow-sm">
    <div class="d-flex justify-content-between align-items-center w-100">
        <div>
            <i class="fa-solid fa-headset me-2 text-primary"></i>
            <strong>Sistema de Tickets de Soporte</strong>
        </div>

        <div class="d-flex align-items-center gap-3">
            <span class="badge bg-primary">
                <?php echo $_SESSION['nombre_rol']; ?>
            </span>
            <a href="logout.php" class="btn btn-outline-secondary btn-sm">
                <i class="fa-solid fa-right-from-bracket"></i>
                Cerrar Sesión
            </a>
        </div>
    </div>
</nav>
