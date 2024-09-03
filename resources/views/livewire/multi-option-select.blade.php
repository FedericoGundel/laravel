<div x-data>
    <div class="input-group" style="flex-wrap:nowrap;" wire:ignore>
        <select id="select_{{ $componentId }}" class=" form-control" wire:model="selectedRecord">
            <option value="No">Ninguno</option>
            @foreach($records as $record)
            <option value="{{ $record->id }}"
                data-numero="{{ ($tableName === 'proveedores') ? $record->numero : null }}">{{ $record->nombre }}
            </option>
            @endforeach
        </select>

        <button class="btn btn-success input-group-text" data-bs-toggle="modal"
            data-bs-target="#addModal_{{ $componentId }}"><i class="far fas fa-plus"></i></button>
        <button class="btn btn-info input-group-text" id="editButton_{{ $componentId }}"
            data-component-id="{{ $componentId }}">
            <i class="fas fa-edit"></i>
        </button>
        <button class="btn btn-danger input-group-text" id="deleteButton_{{ $componentId }}"
            data-component-id="{{ $componentId }}">
            <i class="far fa-trash-alt"></i>
        </button>
    </div>

    <!-- Add Modal -->
    <div class="modal fade" id="addModal_{{ $componentId }}" wire:ignore>
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel_{{ $componentId }}">Agregar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="text" class="form-control" id="addName_{{ $componentId }}" placeholder="Nombre">
                    @if ($tableName === 'proveedores')
                    <input type="text" class="form-control mt-3" id="addNumber_{{ $componentId }}" placeholder="Número">
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" @click="$wire.addRecord(
        document.getElementById('addName_{{ $componentId }}').value,
        document.getElementById('addNumber_{{ $componentId }}') ? document.getElementById('addNumber_{{ $componentId }}').value : null
    )" data-bs-dismiss="modal">Guardar</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Modal -->
    <div class="modal fade" id="editModal_{{ $componentId }}" wire:ignore>
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel_{{ $componentId }}">Editar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="text" class="form-control" id="editName_{{ $componentId }}" placeholder="Nuevo nombre">
                    @if ($tableName === 'proveedores')
                    <input type="text" class="form-control mt-3" id="editNumber_{{ $componentId }}"
                        placeholder="Nuevo número">
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" @click="$wire.editRecord(
                            $wire.get('selectedRecord'), 
                            document.getElementById('editName_{{ $componentId }}').value,
                            document.getElementById('editNumber_{{ $componentId }}') ? document.getElementById('editNumber_{{ $componentId }}').value : null
                        )" data-bs-dismiss="modal">Guardar</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Modal -->
    <div class="modal fade" id="deleteModal_{{ $componentId }}" wire:ignore>
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel_{{ $componentId }}">Eliminar Registro</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <lord-icon class="mb-2" src="https://cdn.lordicon.com/drxwpfop.json" trigger="loop"
                        style="width:200px;height:200px" colors="primary:#383c40,secondary:#383c40" delay="1000">
                    </lord-icon>
                    <p class="mb-0">Estás seguro de eliminar este elemento?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger"
                        @click="$wire.deleteRecord($wire.get('selectedRecord'))"
                        data-bs-dismiss="modal">Eliminar</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Select2 Initialization -->

@script

<script>
(function($) {
    'use strict';

    function openModalIfNotNo(modalId, componentId) {
        var selectedValue = $('#select_' + componentId).val();

        if (selectedValue != 'No') {
            const modal = document.getElementById(modalId);
            const bsModal = bootstrap.Modal.getInstance(modal);

            if (bsModal) {
                bsModal.show();
            }
        }
    }

    $(window).on('InitialLoadOptions', function(event) {
        var componentId = event.detail.componentId;

        $('#select_' + componentId).select2();

        new bootstrap.Modal("#addModal_" + componentId);
        new bootstrap.Modal("#editModal_" + componentId);
        new bootstrap.Modal("#deleteModal_" + componentId);

        $('#select_' + componentId).on('select2:select', function(e) {

            var data = $(this).val();


            Livewire.dispatch('setSelectedRecord', {
                id: data,
                componentId: componentId
            });
        });
    });
    $(window).on('setSelectedRecord', function(event) {
        var componentId = event.detail.componentId;
        console.log(componentId);


    });
    $(window).on("ValidationSuccess_{{ $componentId }}", function(event) {
        var message = event.detail.message;

        iziToast.show({
            title: "Exitoso!",
            titleSize: "",
            titleLineHeight: "",
            titleColor: "#ffffff",
            message: "Elemento agregado exitosamente.",
            messageSize: "",
            messageLineHeight: "",
            messageColor: "#ffffff",
            backgroundColor: "#6dcba3",
            theme: "light", // dark
            color: "", // blue, red, green, yellow
            icon: "fa fa-check icono-toast",
            iconColor: "#ffffff",
            timeout: 7000,
            position: "topRight", // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter, center
            transitionIn: "fadeInUp",
            transitionOut: "fadeOut",
            transitionInMobile: "fadeInUp",
            transitionOutMobile: "fadeOutDown",
            layout: 2,
            maxWidth: "400px",
            onOpening: function(instance, toast) {
                toast.querySelector(
                    ".icono-toast"
                ).style.fontSize = "20px"; // Cambiar el tamaño del icono
            },
            onClosed: function() {},
        });

    });
    $(window).on("ValidationSuccessEdit_{{ $componentId }}", function(event) {
        var message = event.detail.message;

        iziToast.show({
            title: "Exitoso!",
            titleSize: "",
            titleLineHeight: "",
            titleColor: "#ffffff",
            message: "Elemento editado exitosamente.",
            messageSize: "",
            messageLineHeight: "",
            messageColor: "#ffffff",
            backgroundColor: "#6dcba3",
            theme: "light", // dark
            color: "", // blue, red, green, yellow
            icon: "fa fa-check icono-toast",
            iconColor: "#ffffff",
            timeout: 7000,
            position: "topRight", // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter, center
            transitionIn: "fadeInUp",
            transitionOut: "fadeOut",
            transitionInMobile: "fadeInUp",
            transitionOutMobile: "fadeOutDown",
            layout: 2,
            maxWidth: "400px",
            onOpening: function(instance, toast) {
                toast.querySelector(
                    ".icono-toast"
                ).style.fontSize = "20px"; // Cambiar el tamaño del icono
            },
            onClosed: function() {},
        });

    });
    $(window).on("ValidationSuccessDelete_{{ $componentId }}", function(event) {
        var message = event.detail.message;

        iziToast.show({
            title: "Exitoso!",
            titleSize: "",
            titleLineHeight: "",
            titleColor: "#ffffff",
            message: "Elemento eliminado exitosamente.",
            messageSize: "",
            messageLineHeight: "",
            messageColor: "#ffffff",
            backgroundColor: "#6dcba3",
            theme: "light", // dark
            color: "", // blue, red, green, yellow
            icon: "fa fa-check icono-toast",
            iconColor: "#ffffff",
            timeout: 7000,
            position: "topRight", // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter, center
            transitionIn: "fadeInUp",
            transitionOut: "fadeOut",
            transitionInMobile: "fadeInUp",
            transitionOutMobile: "fadeOutDown",
            layout: 2,
            maxWidth: "400px",
            onOpening: function(instance, toast) {
                toast.querySelector(
                    ".icono-toast"
                ).style.fontSize = "20px"; // Cambiar el tamaño del icono
            },
            onClosed: function() {},
        });

    });
    $(window).on("ValidationError_{{ $componentId }}", function(event) {
        var message = event.detail.message;

        iziToast.show({
            title: "Problema de validación!",
            titleSize: "",
            titleLineHeight: "",
            titleColor: "#ffffff",
            message: message,
            messageSize: "",
            messageLineHeight: "",
            messageColor: "#ffffff",
            backgroundColor: "#e1665d",
            theme: "light", // dark
            color: "", // blue, red, green, yellow
            icon: "fas fa-times-circle icono-toast",
            iconColor: "#ffffff",
            timeout: 7000,
            position: "topRight", // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter, center
            transitionIn: "fadeInUp",
            transitionOut: "fadeOut",
            transitionInMobile: "fadeInUp",
            transitionOutMobile: "fadeOutDown",
            layout: 2,
            maxWidth: "400px",
            onOpening: function(
                instance,
                toast
            ) {
                toast.querySelector(
                    ".icono-toast"
                ).style.fontSize = "20px"; // Cambiar el tamaño del icono
            },
            onClosed: function() {},
        });


    });
    $('[id^=editButton_]').on('click', function() {
        var componentId = $(this).data('component-id');
        var data = $("#select_" + componentId).val();
        $("#editName_" + componentId).val($("#select_" + componentId).select2("data")[0].text);

        if ("{{ $tableName }}" === 'proveedores') {
            console.log($("#select_" + componentId).find(":selected").data('numero'));

            var numberValue = $("#select_" + componentId).find(":selected").data('numero');
            $("#editNumber_" + componentId).val(numberValue);
        }

        Livewire.dispatch('setSelectedRecord', {
            id: data,
            componentId: componentId
        });
        openModalIfNotNo('editModal_' + componentId, componentId);
    });

    $('[id^=deleteButton_]').on('click', function() {
        var componentId = $(this).data('component-id');
        var data = $("#select_" + componentId).val()
        Livewire.dispatch('setSelectedRecord', {
            id: data,
            componentId: componentId
        });
        openModalIfNotNo('deleteModal_' + componentId, componentId);
    });

    window.addEventListener('LoadOptions', event => {
        var componentId = event.detail.componentId;


        var data = event.detail.records.map(function(item) {
            return {
                id: item.id,
                text: item.nombre,
                numero: ("{{ $tableName }}" === 'proveedores') ? item.numero : false,
                selected: (event.detail.selectedRecord == item.id) ? true : false
            };
        });
        console.log(data);
        data.unshift({
            id: 'No',
            text: 'Ninguno',
            selected: (event.detail.selectedRecord == "No") ? true : false
        });

        $('#select_' + componentId).empty();
        $('#select_' + componentId).select2({
            data: data
        }).trigger("change");
    });
})(jQuery);
</script>
@endscript