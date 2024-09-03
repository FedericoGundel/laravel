<div>
    <div class="input-group">
        <select class="select_options" style="min-width:200px;" wire:model="selectedRecord">
            <option value="">Seleccione una opción</option>
            @foreach($records as $record)
            <option value="{{ $record->id }}">{{ $record->nombre }}</option>
            @endforeach
        </select>

        <button class="btn btn-success input-group-text" data-bs-toggle="modal" data-bs-target="#addModal"
            id="basic-addon2"><i class="far fas fa-plus"></i></button>

        <button class="btn btn-info input-group-text" id="basic-addon2" data-bs-toggle="modal"
            data-bs-target="#editModal"><i class="fas fa-edit"></i></button>

        <button class="btn btn-danger input-group-text" id="basic-addon2" data-bs-toggle="modal"
            data-bs-target="#deleteModal"><i class="far fa-trash-alt"></i></button>
    </div>

    <!-- Add Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Agregar Registro</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="text" class="form-control" id="addName" placeholder="Nombre">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary"
                        wire:click="addRecord(document.getElementById('addName').value)"
                        data-bs-dismiss="modal">Guardar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Editar Registro</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="text" class="form-control" id="editName" placeholder="Nuevo Nombre">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary"
                        wire:click="editRecord(selectedRecord, document.getElementById('editName').value)"
                        data-bs-dismiss="modal">Guardar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Eliminar Registro</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ¿Está seguro de que desea eliminar este registro?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-danger" wire:click="deleteRecord(selectedRecord)"
                        data-bs-dismiss="modal">Eliminar</button>
                </div>
            </div>
        </div>
    </div>

</div>