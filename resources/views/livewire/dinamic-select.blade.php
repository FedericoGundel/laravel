<div>
    <div class="input-group">
        <select id="{{ $selectId }}" class="form-control mb-0 p-0">


        </select>


        <button class="btn btn-success input-group-text" data-bs-toggle="modal"
            data-bs-target="#modal-agregar-{{$tableName}}">
            <i class="far fas fa-plus"></i>
        </button>

        <button class="btn btn-info input-group-text"><i class="fas fa-edit"></i></button>

        <button class="btn btn-danger input-group-text"><i class="far fa-trash-alt"></i></button>
    </div>

    <div class="modal fade" id="modal-agregar-{{$tableName}}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Agregar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form wire:submit.prevent="addElement">
                    <div class="modal-body">
                        <label for="nombre">Nombre</label>
                        <input class="form-control" type="text" id="nombre" wire:model.defer="newElementName"
                            placeholder="">
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-success" type="submit">Agregar</button>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    @script
    <script>
    /*  const select = document.getElementById('{{ $selectId }}');
    window.choices_select = new Choices(select, {
        searchEnabled: true,
        shouldSort: false,
        renderChoiceLimit: -1,
        itemSelectText: "",
    });*/
    /* document.getElementById('select_id2').value = "No"
    document.getElementById('select_id2').dispatchEvent(new Event("change"))
*/
    window.addEventListener('InitialLoadOptions', event => {

        const options = event.detail.options;

        var data = []

        options.forEach(option => {
            data.push({
                value: option.id,
                label: option.nombre
            });
        });

        VirtualSelect.init({
            ele: '#{{ $selectId }}'
        });



        document.querySelector('#{{ $selectId }}').setOptions(data);



    });






    window.addEventListener('loadOptions', event => {
        const options = event.detail.options;
        const selected = event.detail.selected;
        var data = []

        options.forEach(option => {
            data.push({
                value: option.id,
                label: option.nombre
            });
        });
        console.log("h");
        document.querySelector('#{{ $selectId }}').setOptions(data);
        document.querySelector('#{{ $selectId }}').setValue(selected)

    });



    Livewire.afterDomUpdate.afterDomUpdate(() => {
        console.log("h2");
    });

    window.addEventListener('closeModal', event => {
        const modalId = event.detail.id;
        const modal = document.getElementById(modalId);
        const bsModal = bootstrap.Modal.getInstance(modal);
        if (bsModal) {
            bsModal.hide();
        }
    });
    </script>
    @endscript
</div>