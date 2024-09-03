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
<div class="row">
    <div class="col">

        <div class="card">
            <div class="card-body p-0">
                <div class="row row-cols-1">
                    <div class="col">

                        <div class="mt-md-0 py-3 px-4 mx-2">

                            <div class="d-flex flex-column align-items-center justify-content-center">
                                <lord-icon class="" src="https://cdn.lordicon.com/dgiidarp.json" trigger="hover"
                                    colors="primary:#4b9e44,secondary:#454340" style="width:65px;height:65px">
                                </lord-icon>

                                <h3 class="text-black mb-2 fw-bold">{{ count($usuarios) }}</h3>
                                <h5 class="text-black-50 fw-bold mb-0 text-truncate">Miembros
                                </h5>
                                <!-- <img src="{{ Storage::disk('profile_images')->url('default.svg') }}"
                                    alt="Imagen de perfil">-->
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
                <h4 class="card-title">Usuarios aceptados</h4>
            </div><!-- end card header -->
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table w-100" id="tabla-miembros" data-users-url="{{ route('get-users') }}">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Foto</th>
                                <th>Usuario</th>

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

@endsection
@section('script')

<!-- gridjs js -->
<script src="https://cdn.lordicon.com/ritcuqlt.js"></script>

<script src="{{ URL::asset('assets/libs/gridjs/gridjs.min.js') }}"></script>


<script src="{{ URL::asset('assets/js/app.js') }}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script
    src="https://cdn.datatables.net/v/bs5/jq-3.7.0/jszip-3.10.1/dt-2.0.3/af-2.7.0/b-3.0.1/b-colvis-3.0.1/b-html5-3.0.1/b-print-3.0.1/cr-2.0.0/date-1.5.2/fc-5.0.0/fh-4.0.1/kt-2.12.0/rg-1.5.0/rr-1.5.0/sc-2.4.1/sb-1.7.0/sp-2.3.0/sl-2.0.0/sr-1.4.0/datatables.min.js">

</script>
<script src="https://cdn.datatables.net/responsive/3.0.0/js/dataTables.responsive.js"></script>
<script src="{{ URL::asset('assets/js/pages/miembros/index.js') }}"></script>


@endsection