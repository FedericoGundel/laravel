@extends('layouts.master')
@section('title')Advance Tables @endsection
@section('css')
<link href="{{ URL::asset('assets/libs/gridjs/gridjs.min.css') }}" rel="stylesheet" type="text/css" />
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
<div class="row row-cols-md-2 row-cols-1">
    <div class="col">
        <div class="card border-0">
            <div class="card-body p-0">
                <div class="row">
                    <div class="col">
                        <div class="mt-md-0 py-3 px-4 mx-2">

                            <div class="d-flex flex-column align-items-center justify-content-center">
                                <lord-icon class="mb-2" src="https://cdn.lordicon.com/fesehxev.json" trigger="hover"
                                    colors="primary:#4b9e44,secondary:#454340" style="width:50px;height:50px">
                                </lord-icon>

                                <h3 class="text-black mb-2">50</h3>
                                <p class="text-black-50 mb-0 text-truncate">Productos pendientes
                                </p>
                            </div>

                        </div>
                    </div><!-- end col -->



                </div><!-- end row -->
            </div><!-- end card body -->
        </div><!-- end card -->
    </div><!-- end col -->

    <div class="col">
        <div class="card border-0">
            <div class="card-body p-0">
                <div class="row">

                    <div class="col">
                        <div class="mt-md-0 py-3 px-4 mx-2">
                            <div class="d-flex flex-column align-items-center justify-content-center">
                                <lord-icon class="mb-2" src="https://cdn.lordicon.com/wvizcxne.json" trigger="hover"
                                    colors="primary:#4b9e44,secondary:#454340" style="width:50px;height:50px">
                                </lord-icon>

                                <h3 class="text-black mb-2">25</h3>
                                <p class="text-black-50 mb-0 text-truncate">Productos recibidos
                                </p>
                            </div>
                        </div>
                    </div><!-- end col -->


                </div><!-- end row -->
            </div><!-- end card body -->
        </div><!-- end card -->
    </div><!-- end col -->

</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header justify-content-between d-flex align-items-center">
                <h4 class="card-title">Productos</h4>
            </div><!-- end card header -->
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table w-100" id="tabla-productos-recibidos" data-url="{{ route('get-productos') }}">
                        <thead>
                            <tr>
                                <th>Producto</th>
                                <th>Cantidades</th>

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
                <lord-icon src="https://cdn.lordicon.com/erfrtzuy.json" trigger="hover"
                    style="width:350px;height:350px">
                </lord-icon>

            </div>
            <div class="modal-footer">
                <!-- Toogle to second dialog -->
                <button class="w-100 btn btn-success" data-bs-target="#modal-escanear-productos" data-bs-toggle="modal"
                    data-bs-dismiss="modal">Escanear</button>
                <button class="w-100 btn btn-primary" data-bs-target="#modal-buscar-productos" data-bs-toggle="modal"
                    data-bs-dismiss="modal">Buscar productos</button>
                <button class="w-100 btn btn-info" data-bs-target="#modal-ver-productos" data-bs-toggle="modal"
                    data-bs-dismiss="modal">Ver productos</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->




@endsection
@section('script')

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
<script src="{{ URL::asset('assets/js/pages/productos-recibidos/index.js') }}"></script>
<script src="{{ URL::asset('assets/js/app.js') }}"></script>


@endsection