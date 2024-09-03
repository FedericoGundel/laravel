@extends('layouts.master')
@section('title')Advance Tables @endsection
@section('css')
<link
    href="https://cdn.datatables.net/v/bs5/jszip-3.10.1/dt-2.0.3/af-2.7.0/b-3.0.1/b-colvis-3.0.1/b-html5-3.0.1/b-print-3.0.1/cr-2.0.0/date-1.5.2/fc-5.0.0/fh-4.0.1/kt-2.12.0/r-3.0.0/rg-1.5.0/rr-1.5.0/sc-2.4.1/sb-1.7.0/sp-2.3.0/sl-2.0.0/sr-1.4.0/datatables.min.css"
    rel="stylesheet">
@endsection
@section('content')
{{-- breadcrumbs  --}}
@section('breadcrumb')
@component('components.breadcrumb')
@slot('li_1') Tables @endslot
@slot('title') Advance Tables @endslot
@endcomponent
@endsection

<div class="row">
    <div class="col">

        <div class="card">
            <div class="card-body p-0">
                <div class="row row-cols-1">
                    <div class="col">

                        <div class="mt-md-0 py-3 px-4 mx-2">

                            <div class="d-flex flex-column align-items-center justify-content-center">
                                <lord-icon class="mb-2" src="https://cdn.lordicon.com/taymdfsf.json" trigger="hover"
                                    colors="primary:#4b9e44,secondary:#454340" style="width:50px;height:50px">
                                </lord-icon>

                                <h3 id="pedidos_count" class="text-black mb-2"></h3>
                                <p class="text-black-50 mb-0 text-truncate">Pedidos
                                </p>
                            </div>
                        </div>
                    </div><!-- end col -->



                </div><!-- end row -->

            </div>

        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header justify-content-between d-flex align-items-center">
                <a href="./crear-pedido" class="btn btn-success">Agregar pedido</a>
            </div><!-- end card header -->
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table w-100" id="tabla-pedidos" data-url="{{ route('get-pedidos') }}">
                        <thead>
                            <tr>
                                <th>Productos</th>
                                <th>Cantidades</th>
                                <th>Transportista</th>
                                <th>Nº pedido</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Aquí puedes agregar filas de datos si deseas, pero no es necesario para DataTables -->
                        </tbody>
                    </table>
                </div>

            </div>
            <!-- end card body -->
        </div>
        <!-- end card -->
    </div>
    <!-- end col -->
</div>
<!-- end row -->
<div class="modal fade" id="modal-scanner" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Empieza a realizar las verificaciones</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body d-flex justify-content-center">
                <lord-icon src="https://cdn.lordicon.com/uttrirxf.json" trigger="loop"
                    colors="primary:#454340,secondary:#4b9e44" style="width:350px;height:350px">
                </lord-icon>

            </div>
            <div class="modal-footer">
                <!-- Toogle to second dialog -->

                <button class="w-100 btn btn-success" data-bs-target="#modal-escanear-productos" data-bs-toggle="modal"
                    data-bs-dismiss="modal">Escanear</button>

                <button class="w-100 btn btn-info" data-bs-target="#modal-ver-productos" data-bs-toggle="modal"
                    data-bs-dismiss="modal">Ver productos</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<div class="modal fade" id="modal-buscar-productos" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Buscar</h5>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">

                <div class="table-responsive">
                    <table class="table w-100" id="tabla-buscar-productos">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Código</th>
                                <th>EAN</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>

                            <!-- Aquí puedes agregar filas de datos si deseas, pero no es necesario para DataTables -->
                        </tbody>

                    </table>
                </div>
            </div>
            <div class="modal-footer">

                <button class="w-100 btn btn-danger" data-bs-target="#modal-scanner" data-bs-toggle="modal"
                    data-bs-dismiss="modal">Volver</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<div class="modal fade" id="modal-escanear-productos" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Escanear</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <div id="quagga-scanner" class="viewport"></div>
            </div>
            <div class="modal-footer">
                <button class="w-100 btn btn-success" id="btn-escanear">Escanear</button>
                <button class="w-100 btn btn-danger" data-bs-target="#modal-scanner" data-bs-toggle="modal"
                    data-bs-dismiss="modal">Volver</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<div class="modal fade" id="modal-ver-productos" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ver productos</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table w-100" id="tabla-ver-productos">
                        <thead>
                            <tr>
                                <th>Foto</th>
                                <th>Nombre</th>
                                <th>EAN</th>

                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Aquí puedes agregar filas de datos si deseas, pero no es necesario para DataTables -->
                        </tbody>

                    </table>
                </div>
            </div>
            <div class="modal-footer">

                <button class="w-100 btn btn-danger" data-bs-target="#modal-scanner" data-bs-toggle="modal"
                    data-bs-dismiss="modal">Volver</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<div class="modal fade" id="modal-ver-producto" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Producto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <img id="ver_imagen_producto" src="assets/images/pattern-bg.jpg"
                    style="object-fit: contain;max-height: 200px;" class="mb-4 w-100 profile-img profile-foreground-img"
                    style="height: 150px;" alt="">
                <div>
                    <ul class="list-unstyled mb-0 text-muted">
                        <li>
                            <div class="d-flex align-items-center py-2">
                                <div class="flex-grow-1">
                                    <i class="uil uil-shopping-basket font-size-16 text-reset me-1"></i> Producto
                                </div>
                                <div class="flex-shrink-0">

                                    <div id="ver_nombre_producto"></div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="d-flex align-items-center py-2">
                                <div class="flex-grow-1">
                                    <i class="uil uil-tag-alt font-size-16 text-info me-1"></i> Cantidad
                                </div>
                                <div class="flex-shrink-0">
                                    <input class="form-control" id="ver_cantidad_producto" type="number">

                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="d-flex align-items-center py-2">
                                <div class="flex-grow-1">
                                    <i class="uil uil-subject font-size-16 text-primary me-1"></i> EAN
                                </div>
                                <div class="flex-shrink-0">
                                    <div id="ver_ean_producto"></div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="d-flex align-items-center pt-2 pb-1">
                                <div class="flex-grow-1">
                                    <i class="uil uil-table font-size-16 text-danger me-1"></i> Almacen
                                </div>
                                <div class="flex-shrink-0">
                                    <select id="select_almacenes" class=" form-control">
                                        <option value="No">Ninguno</option>
                                    </select>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="d-flex align-items-center pt-2 pb-1">
                                <div class="flex-grow-1">
                                    <i class="uil uil-th font-size-16 text-danger me-1"></i> Rack
                                </div>
                                <div class="flex-shrink-0">
                                    <select id="select_racks" class=" form-control">
                                        <option value="No">Ninguno</option>
                                    </select>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="d-flex align-items-center pt-2 pb-1">
                                <div class="flex-grow-1">
                                    <i class="uil uil-wall font-size-16 text-danger me-1"></i> Estante
                                </div>
                                <div class="flex-shrink-0">
                                    <select id="select_estantes" class=" form-control">
                                        <option value="No">Ninguno</option>
                                    </select>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="modal-footer">
                <button id="btn-modificar-producto" class="w-100 btn btn-success">Modificar</button>
                <button class="w-100 btn btn-danger" data-bs-target="#modal-scanner" data-bs-toggle="modal"
                    data-bs-dismiss="modal">Volver</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<div class="modal fade" id="modal-anomalia" tabindex="-1" role="dialog" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title">Verificar el producto</h5>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                </button>

            </div>

            <div class="modal-body text-center text-center">
                <h5>Anomalías:</h5>
                <ul id="anomalias_producto">

                </ul>

                <p class="mb-0">Si verificas el producto se modificará el inventario del pedido y de
                    generará una
                    registro de las anomalías encontradas,
                    estás seguro de verificar este producto?</p>
            </div>

            <div class="modal-footer">

                <button type="button" class="btn_confirmar_verificacion btn btn-success">Verificar</button>
                <button type="button" data-bs-dismiss="modal" class="btn btn-danger">Cancelar</button>


            </div>

        </div><!-- /.modal-content -->

    </div><!-- /.modal-dialog -->

</div><!-- /.modal -->
<div class="modal fade" id="modal-confirmar-verificacion" tabindex="-1" role="dialog" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title">Verificar el producto</h5>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                </button>

            </div>

            <div class="modal-body text-center text-center">


                <p class="mb-0">Si verificas el producto se modificará el inventario del pedido y se guardará en la
                    ubicación especificada,
                    estás seguro de verificar este producto?</p>
            </div>

            <div class="modal-footer">

                <button type="button" class="btn_confirmar_verificacion btn btn-success">Verificar</button>
                <button type="button" data-bs-dismiss="modal" class="btn btn-danger">Cancelar</button>


            </div>

        </div><!-- /.modal-content -->

    </div><!-- /.modal-dialog -->

</div><!-- /.modal -->
<div class="modal fade" id="modal-sacar-foto" tabindex="-1" role="dialog" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title">Sacar foto del EAN</h5>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                </button>

            </div>

            <div class="modal-body text-center text-center">
                <!-- <img class="w-75 mb-3" src="{{ URL::asset('assets/images/barcode.svg') }}" alt=""> -->
                <div class="row">
                    <div class="col-12">
                        <div id="video-container" style="height: 400px;">

                        </div>
                    </div>


                </div>
            </div>

            <div class="modal-footer">
                <button type="button" id="vaciar-camara" class=" btn btn-danger">Vaciar</button>
                <button type="button" id="capturar-foto" class=" btn btn-success">Sacar foto</button>

            </div>

        </div><!-- /.modal-content -->

    </div><!-- /.modal-dialog -->

</div><!-- /.modal -->
<style>
#quagga-scanner video {
    width: 100%;
    border-radius: 0.25rem
}

#quagga-scanner canvas {
    position: absolute;
    z-index: 1000;
    right: 0;
    width: 100%;
}

#video-container video {
    width: 100%;
    height: 100%;
}

.select2.select2-container {
    width: 200px !important;
}
</style>
@endsection
@section('script')
<script>
(function($) {
    'use strict';
    $("#select_almacenes").select2();

    function getRacks(id_almacenes = "No") {
        fetch("get-almacenes")
            .then((response) => response.json())
            .then((data) => {

                data = data
                    .map(function(item) {

                        return {
                            id: item.id,
                            text: item.nombre,
                            nombre: item.nombre,
                            selected: (id_almacenes == item.id) ? true : false
                        };

                    })
                    .filter(function(item) {
                        return item !== null;
                    });

                data.unshift({
                    id: 'No',
                    text: 'Ninguno',
                    selected: (id_almacenes == "No") ? true : false
                });


                $('#select_almacenes').empty();
                $('#select_almacenes').select2({
                    data: data
                }).trigger("change");
            })

    }
    getRacks()

})(jQuery);
</script>
<script>
(function($) {
    'use strict';
    $("#select_estantes").select2();

    function getRacks(id_racks, id_estantes = "No") {
        fetch("get-estantes")
            .then((response) => response.json())
            .then((data) => {

                data = data
                    .map(function(item) {
                        if (item.id_racks == id_racks) {
                            return {
                                id: item.id,
                                text: item.nombre,
                                nombre: item.nombre,
                                selected: (id_estantes == item.id) ? true : false
                            };
                        } else {
                            return null;
                        }
                    })
                    .filter(function(item) {
                        return item !== null;
                    });

                data.unshift({
                    id: 'No',
                    text: 'Ninguno',
                    selected: (id_estantes == "No") ? true : false
                });


                $('#select_estantes').empty();
                $('#select_estantes').select2({
                    data: data
                }).trigger("change");
            })

    }

    $("#select_racks").change(function() {
        var id_racks = $(this).val()
        getRacks(id_racks)
    })
})(jQuery);
</script>
<script>
(function($) {
    'use strict';
    $("#select_racks").select2();

    function getRacks(id_almacenes, id_racks = "No") {
        fetch("get-racks")
            .then((response) => response.json())
            .then((data) => {

                data = data
                    .map(function(item) {
                        if (item.id_almacenes == id_almacenes) {
                            return {
                                id: item.id,
                                text: item.nombre,
                                nombre: item.nombre,
                                selected: (id_racks == item.id) ? true : false
                            };
                        } else {
                            return null;
                        }
                    })
                    .filter(function(item) {
                        return item !== null;
                    });

                data.unshift({
                    id: 'No',
                    text: 'Ninguno',
                    selected: (id_racks == "No") ? true : false
                });


                $('#select_racks').empty();
                $('#select_racks').select2({
                    data: data
                }).trigger("change");
            })

    }

    $("#select_almacenes").change(function() {
        var id_almacenes = $(this).val()
        getRacks(id_almacenes)
    })
})(jQuery);
</script>
<!-- gridjs js -->
<script src="https://cdn.lordicon.com/ritcuqlt.js"></script>
<script src="{{ URL::asset('assets/libs/quagga/dist/quagga.min.js') }}"></script>
<script src="{{ URL::asset('assets/libs/gridjs/gridjs.min.js') }}"></script>
<script src="https://cdn-script.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script
    src="https://cdn.datatables.net/v/bs5/jq-3.7.0/jszip-3.10.1/dt-2.0.3/af-2.7.0/b-3.0.1/b-colvis-3.0.1/b-html5-3.0.1/b-print-3.0.1/cr-2.0.0/date-1.5.2/fc-5.0.0/fh-4.0.1/kt-2.12.0/rg-1.5.0/rr-1.5.0/sc-2.4.1/sb-1.7.0/sp-2.3.0/sl-2.0.0/sr-1.4.0/datatables.min.js">

</script>
<script src="https://cdn.datatables.net/responsive/3.0.0/js/dataTables.responsive.js"></script>
<script src="{{ URL::asset('assets/js/pages/pedidos/index.js') }}"></script>

@endsection