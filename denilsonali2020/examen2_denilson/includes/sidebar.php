<div class="sidebar bg-dark text-white">

    <div class="border-bottom border-secondary p-3 text-center">
        <h4 class="mb-0">
            <i class="fa-solid fa-headset me-2"></i>
            TicketSoporte
        </h4>
    </div>

    <div class="d-flex align-items-center gap-3 p-3 border-bottom border-secondary">
        <div class="rounded-circle bg-primary d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
            <i class="fa-solid fa-user"></i>
        </div>

        <div>
            <strong><?php echo $_SESSION['nombre']; ?></strong>
            <br>
            <small class="text-white-50"><?php echo $_SESSION['nombre_rol']; ?></small>
        </div>
    </div>

    <ul class="list-unstyled mt-2">
        <li>
            <a href="dashboard.php" class="d-block text-white text-decoration-none px-3 py-2">
                <i class="fa-solid fa-gauge me-2"></i>
                Dashboard
            </a>
        </li>

        <li class="px-3 py-2 text-uppercase small text-secondary">
            Tickets
        </li>

        <li>
            <a href="nuevoTicket.php" class="d-block text-white text-decoration-none px-3 py-2">
                <i class="fa-solid fa-plus me-2"></i>
                Nuevo Ticket
            </a>
        </li>

        <li>
            <a href="tickets.php" class="d-block text-white text-decoration-none px-3 py-2">
                <i class="fa-solid fa-list me-2"></i>
                Ver Tickets
            </a>
        </li>

        <li class="px-3 py-2 text-uppercase small text-secondary">
            Configuración
        </li>

        <li>
            <a href="logout.php" class="d-block text-white text-decoration-none px-3 py-2">
                <i class="fa-solid fa-right-from-bracket me-2"></i>
                Cerrar Sesión
            </a>
        </li>
    </ul>

</div>
