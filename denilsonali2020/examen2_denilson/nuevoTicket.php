<?php
require "includes/session.php";
require "config/db.php";

include "includes/header.php";
?>

<div class="card">
    <div class="card-header">
        <strong>Registrar Nuevo Ticket</strong>
    </div>
    <div class="card-body">
        <form action="controllers/guardarTicket.php" method="POST" onsubmit="return validarFormulario();">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Título</label>
                    <input type="text" name="titulo" id="titulo" class="form-control" autocomplete="off">
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Prioridad</label>
                    <select name="prioridad" id="prioridad" class="form-select">
                        <option value="">Seleccione</option>
                        <option value="Baja">Baja</option>
                        <option value="Media">Media</option>
                        <option value="Alta">Alta</option>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Departamento</label>
                    <input type="text" name="departamento" id="departamento" class="form-control" autocomplete="off">
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Estado</label>
                    <select name="estado" class="form-select">
                        <option value="Pendiente">Pendiente</option>
                    </select>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Descripción</label>
                <textarea name="descripcion" id="descripcion" class="form-control" rows="5" autocomplete="off"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">
                <i class="fa-solid fa-save"></i>
                Guardar Ticket
            </button>
        </form>
    </div>
</div>

<?php include "includes/footer.php"; ?>