<div class="input-group">

    <select class="form-control select-dinamico mb-0" data-url="{{$ruta}}" data-table="{{$table}}" name="{{$name}}"
        id="{{$id}}">



    </select>

    <button class="btn btn-success input-group-text" data-bs-toggle='modal' data-bs-target='#modal-agregar-{{$ruta}}'
        id="basic-addon2"><i class="far fas fa-plus"></i></button>

    <button class="btn btn-info input-group-text" id="basic-addon2" data-bs-toggle='modal'
        data-bs-target='#modal-editar-{{$ruta}}'><i class="fas fa-edit"></i></button>

    <button class="btn btn-danger input-group-text" id="basic-addon2" data-bs-toggle='modal'
        data-bs-target='#modal-eliminar-{{$ruta}}'><i class="far fa-trash-alt"></i></button>

</div>

<div class="modal fade" id="modal-agregar-{{$ruta}}" tabindex="-1" role="dialog" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title">Agregar</h5>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                </button>

            </div>
            <form method="POST" data-select="{{$id}}" id="form-add-{{$ruta}}" action="add-{{$ruta}}"
                class="form-dinamico-add">
                @csrf
                <div class="modal-body">


                    <label for="">Nombre</label>

                    <input class="form-control" type="text" id="" name="nombre" placeholder="">






                </div>

                <div class="modal-footer">

                    <button class="btn btn-success" type="submit">Agregar</button>



                </div>
            </form><!-- end form -->
        </div><!-- /.modal-content -->

    </div><!-- /.modal-dialog -->

</div><!-- /.modal -->
<div class="modal fade" id="modal-editar-{{$ruta}}" tabindex="-1" role="dialog" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title">Editar</h5>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                </button>

            </div>
            <form method="PUT" data-select="{{$id}}" id="form-edit-{{$ruta}}" action="edit-{{$ruta}}"
                class="form-dinamico-edit">
                @csrf
                <div class="modal-body">


                    <label for="">Nombre</label>

                    <input class="form-control" type="text" id="" name="nombre" placeholder="">






                </div>

                <div class="modal-footer">

                    <button class="btn btn-success" type="submit">Editar</button>



                </div>
            </form><!-- end form -->
        </div><!-- /.modal-content -->

    </div><!-- /.modal-dialog -->

</div><!-- /.modal -->
<div class="modal fade modal-sm" id="modal-eliminar-{{$ruta}}" tabindex="-1" role="dialog" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title">Eliminar</h5>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                </button>

            </div>

            <div class="modal-body text-center text-center">

                <lord-icon class="mb-2" src="https://cdn.lordicon.com/rmkpgtpt.json" trigger="loop"
                    style="width:150px;height:150px" colors="primary:#008bcd,secondary:#454340" delay="1000">

                </lord-icon>
                <p class="mb-0">Estás seguro de eliminar este elemento?</p>
            </div>

            <div class="modal-footer">
                <form method="POST" data-select="{{$id}}" id="form-delete-{{$ruta}}" action="delete-{{$ruta}}"
                    class="form-dinamico-delete">
                    @csrf
                    <button type="submit" class="btn btn-danger">Eliminar</button>

                </form><!-- end form -->

            </div>

        </div><!-- /.modal-content -->

    </div><!-- /.modal-dialog -->

</div><!-- /.modal -->