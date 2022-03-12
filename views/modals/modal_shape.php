<!-- Modal registrar tipo -->
<div class="modal fade" id="registroFormaModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
        <form id="form_shape">
            <input type="hidden" value="insert" name="opc">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Registrar forma de documento</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                    <div class="mb-3">
                        <label for="name_shape" class="form-label">Nombre <span class="text-danger">*</span> </label>
                        <input type="text" class="form-control" name="name" id="name_shape" placeholder="Escriba un nombre" required>
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

<!-- Modal editar tipo -->
<div class="modal fade" id="editarFormaModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
        <form id="form_edit_shape">
            <input type="hidden" value="edit" name="opc">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar de forma de documento</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre <span class="text-danger">*</span> </label>
                        <input type="hidden" name="id" id="id_shape_edit">
                        <input type="text" class="form-control" name="name" id="name_shape_edit" placeholder="Escriba un nombre" required>
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