<!-- Modal registrar doumento -->
<div class="modal fade" id="registroDocumentoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
    <form id="form_document">
    <input type="hidden" class="form-control" name="opc" value="insert">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registro de documento</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
            <div class="mb-3">
                <label for="titulo" class="form-label">Titulo <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="title" id="titulo" placeholder="Escriba un titulo" required>
            </div>
            <div class="mb-3">
                <label for="type" class="form-label">Tipo de documento <span class="text-danger">*</span></label>
                <select class="form-select" id="type" name="type" required>
                    <option selected>Seleccionar</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="shape" class="form-label">Forma de documento <span class="text-danger">*</span> </label>
                <select class="form-select" id="shape" name="shape" required>
                    <option selected>Seleccionar</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="date" class="form-label">Fecha</label>
                <input type="date" class="form-control" name="date" id="date">
            </div>
            <div class="form-group">
                <label for="commentario">Comentario</label>
                <textarea class="form-control" name="comment" id="commentario" rows="3"></textarea>
            </div>
            <div class="mb-3">
                <label for="file" class="form-label">Documento <span class="text-danger">*</span> </label>
                <input type="file" class="form-control" name="document" id="file" accept="image/jpeg,image/png,application/pdf" required>
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

<!-- Modal editar doumento -->
<div class="modal fade" id="editarDocumentoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
    <form id="form_edit_document">
    <input type="hidden" name="opc" value="edit">
    <input type="hidden" name="id" id="identificador">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar documento</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
            <div class="mb-3">
                <label for="titulo_edit" class="form-label">Titulo <span class="text-danger">*</span> </label>
                <input type="text" class="form-control" name="title" id="titulo_edit" placeholder="Escriba un titulo" required>
            </div>
            <div class="mb-3">
                <label for="type_edit" class="form-label">Tipo de documento <span class="text-danger">*</span> </label>
                <select class="form-select" id="type_edit" name="type" required>
                    <option selected>Seleccionar</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="shape_edit" class="form-label">Forma de documento <span class="text-danger">*</span> </label>
                <select class="form-select" id="shape_edit" name="shape" required>
                    <option selected>Seleccionar</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="date_edit" class="form-label">Fecha</label>
                <input type="date" class="form-control" name="date" id="date_edit">
            </div>
            <div class="form-group">
                <label for="comment_edit">Comentario</label>
                <textarea class="form-control" name="comment" id="comment_edit" rows="3"></textarea>
            </div>
            <!-- <div class="mb-3">
                <label for="file" class="form-label">Documento <span class="text-danger">*</span></label>
                <input type="file" class="form-control" name="document" id="file" accept="image/jpeg,image/png,application/pdf">
            </div> -->
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-success">Guardar</button>
    </div>
    </form>
    </div>
</div>
</div>

<!-- Modal visualizar doumento -->
<div class="modal fade" id="visualizarDocumentoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Visualizar documento</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">

        <h3><b>Titulo</b>: <span id="title_watch"></span></h3>
        <div id="preview_document"></div>
        <div class="form-group mt-2">
            <label>Comentario:</label>
            <textarea class="form-control" id="comment_watch" rows="3" disabled></textarea>
        </div>

    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
    </div>
    </div>
</div>
</div>