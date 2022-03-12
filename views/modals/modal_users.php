<!-- Modal registrar usuario -->
<div class="modal fade" id="registroUsuarioModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
        <form id="form_users">
            <input type="hidden" value="insert" name="opc">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Registro de usuario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username <span class="text-danger">*</span> </label>
                        <input type="text" class="form-control" name="username" id="username" placeholder="Escriba un nombre de usuario" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Clave <span class="text-danger">*</span> </label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Escriba una clave" required>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-success">Guardar</button>
            </div>
        </form>
    </div>
</div>
</div>

<!-- Modal editar usuario -->
<div class="modal fade" id="editarUsuarioModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
        <form id="form_edit_users">
            <input type="hidden" value="insert" name="opc">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar de usuario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username <span class="text-danger">*</span> </label>
                        <input type="hidden" name="opc" id="opc_edit" value="edit">
                        <input type="hidden" name="id" id="id_edit">
                        <input type="text" class="form-control" name="username" id="username_edit" placeholder="Escriba un nombre de usuario" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Clave <span class="text-danger">*</span> </label>
                        <input type="password" class="form-control" name="password" id="password_edit" placeholder="Escriba una clave" required>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-success">Guardar</button>
            </div>
        </form>
    </div>
</div>
</div>