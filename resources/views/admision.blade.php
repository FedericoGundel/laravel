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

                                <lord-icon class="mb-2" src="https://cdn.lordicon.com/bqzyzccf.json" trigger="hover"
                                    colors="primary:#4b9e44,secondary:#454340" style="width:50px;height:50px">

                                </lord-icon>



                                <h3 id="solicitudes_count" class="text-black mb-2"></h3>

                                <p class="text-black-50 mb-0 text-truncate">Solicitudes de admisión

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

                <h3 class="card-title">Solicitudes pedientes</h3>

            </div><!-- end card header -->

            <div class="card-body">

                <div class="table-responsive">

                    <table class="table w-100" id="tabla-solicitudes" data-url="{{ route('get-solicitud-admision') }}">

                        <thead>

                            <tr>

                                <th>ID</th>

                                <th>Nombre de usuario</th>
                                s


                                <th>Fecha</th>

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
<div class="modal fade modal-sm" id="modal-aceptar-solicitud" tabindex="-1" role="dialog" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title">Aceptar solicitud</h5>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                </button>

            </div>

            <div class="modal-body text-center text-center">

                <lord-icon class="mb-2" src="https://cdn.lordicon.com/dswyqtqa.json" trigger="loop"
                    style="width:150px;height:150px" colors="primary:#4b9e44,secondary:#454340" delay="1000">

                </lord-icon>
                <p class="mb-0">Estás seguro de aceptar la solicitud?</p>
            </div>

            <div class="modal-footer">
                <form method="PUT" id="form-aceptar-solicitud" action="aceptar-solicitud-admision">
                    @csrf
                    <button type="submit" class="btn btn-success">Aceptar</button>

                </form><!-- end form -->

            </div>

        </div><!-- /.modal-content -->

    </div><!-- /.modal-dialog -->

</div>

<!-- end row -->
<div class="modal fade" id="modal-asignar-rol" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
    aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title">Asignar rol</h5>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                </button>



            </div>

            <div class="modal-body">

                <select class="form-select" name="tipo-unidad-producto" id="tipo-unidad-producto">

                    <option>Administrador</option>

                    <option>Usuario</option>



                </select>

            </div>

            <div class="modal-footer">
                <button class="btn btn-success" data-bs-dismiss="modal">Verificar</button>
                <button class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>

            </div>

        </div><!-- /.modal-content -->

    </div><!-- /.modal-dialog -->

</div><!-- /.modal -->

<div class="modal fade modal-sm" id="modal-eliminar-solicitud" tabindex="-1" role="dialog" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title">Eliminar</h5>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                </button>

            </div>

            <div class="modal-body text-center text-center">

                <lord-icon class="mb-2" src="https://cdn.lordicon.com/rmkpgtpt.json" trigger="loop"
                    style="width:150px;height:150px" colors="primary:#4b9e44,secondary:#454340" delay="1000">

                </lord-icon>
                <p class="mb-0">Estás seguro de eliminar este elemento?</p>
            </div>

            <div class="modal-footer">
                <form method="POST" id="form-eliminar-solicitud" action="delete-solicitud-admision">
                    @csrf
                    <button type="submit" class="btn btn-danger">Eliminar</button>

                </form><!-- end form -->

            </div>

        </div><!-- /.modal-content -->

    </div><!-- /.modal-dialog -->

</div>


@endsection

@section('script')



<!-- gridjs js -->

<script src="https://cdn.lordicon.com/ritcuqlt.js"></script>



<script src="{{ URL::asset('assets/libs/gridjs/gridjs.min.js') }}"></script>





<script src="{{ URL::asset('assets/js/app.js') }}"></script>

<script src="https://cdn-script.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>

<script
    src="https://cdn.datatables.net/v/bs5/jq-3.7.0/jszip-3.10.1/dt-2.0.3/af-2.7.0/b-3.0.1/b-colvis-3.0.1/b-html5-3.0.1/b-print-3.0.1/cr-2.0.0/date-1.5.2/fc-5.0.0/fh-4.0.1/kt-2.12.0/rg-1.5.0/rr-1.5.0/sc-2.4.1/sb-1.7.0/sp-2.3.0/sl-2.0.0/sr-1.4.0/datatables.min.js">

</script>
<script src="https://cdn.datatables.net/responsive/3.0.0/js/dataTables.responsive.js"></script>

<script src="{{ URL::asset('assets/js/pages/admision/index.js') }}"></script>



@endsection