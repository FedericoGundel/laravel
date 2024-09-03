@extends('layouts.master')



@section('title')Form Advanced Plugins @endsection



@section('css')







<!-- plugin css -->







<!-- One of the following themes -->



<link
    href="https://cdn.datatables.net/v/bs5/jszip-3.10.1/dt-2.0.3/af-2.7.0/b-3.0.1/b-colvis-3.0.1/b-html5-3.0.1/b-print-3.0.1/cr-2.0.0/date-1.5.2/fc-5.0.0/fh-4.0.1/kt-2.12.0/r-3.0.0/rg-1.5.0/rr-1.5.0/sc-2.4.1/sb-1.7.0/sp-2.3.0/sl-2.0.0/sr-1.4.0/datatables.min.css"
    rel="stylesheet">




@endsection



@section('content')



{{-- breadcrumbs  --}}



@section('breadcrumb')



@component('components.breadcrumb')



@slot('li_1') Forms @endslot



@slot('title') Form Advanced Plugins @endslot



@endcomponent



@endsection



<div class="row">



    <div class="col-12">



        <div class="justify-content-between d-flex align-items-center mt-3 mb-4">



            <h5 class="mb-0 pb-1 text-decoration-underline">Crear pedido</h5>



        </div>



    </div>



</div>

<div id="form-add-pedido" data-action="{{ route('add-pedidos')}}">

    @csrf

    <div class="row">



        <div class="col mb-4">



            <div class="card h-100 mb-0">







                <div class="card-body">



                    <div>



                        <div class="row">



                            <div class="col-md-4">



                                <div class="mb-3">



                                    <label for="choices-single-default"
                                        class="form-label font-size-13 text-muted">Número de

                                        pedido



                                    </label>



                                    <input class="form-control" type="text" value="" name="ean-producto"
                                        id="numero-pedido">



                                </div>



                            </div><!-- end col -->



                            <div class="col-md-4">



                                <div class="mb-3">



                                    <label for="choices-single-default" class="form-label font-size-13 text-muted">Fecha



                                    </label>



                                    <input class="form-control" type="date" value="" name="codigo-producto"
                                        id="fecha-pedido">



                                </div>



                            </div><!-- end col -->



                            <div class="col-md-4">



                                <div class="mb-3">



                                    <label for="choices-single-default"
                                        class="form-label font-size-13 text-muted">Estado



                                    </label>



                                    <livewire:multi-option-select tableName="estados" componentId="estados" />



                                </div>



                            </div><!-- end col -->







                        </div>



                        <!-- end row -->



                    </div>



                </div>



            </div>



        </div>







    </div>



    <div class="row">



        <div class="col mb-4">



            <div class="card h-100 mb-0">







                <div class="card-body">



                    <div>



                        <div class="row">





                            <div class="col-md-4">



                                <div class="mb-3">



                                    <label for="choices-single-default"
                                        class="form-label font-size-13 text-muted">Proveedor



                                    </label>
                                    <livewire:multi-option-select tableName="proveedores" componentId="proveedores" />





                                </div>



                            </div><!-- end col -->











                        </div>



                        <!-- end row -->



                    </div>



                </div>



            </div>



        </div>







    </div>

    <div class="row">



        <div class="col mb-4">



            <div class="card h-100 mb-0">







                <div class="card-body">



                    <div>



                        <div class="row">

                            <div class="col-md-4">



                                <div class="mb-3">



                                    <label for="choices-single-default"
                                        class="form-label font-size-13 text-muted">Pedido

                                        por



                                    </label>



                                    <livewire:multi-option-select tableName="emisores" componentId="emisores" />



                                </div>



                            </div><!-- end col -->

                            <div class="col-md-4">



                                <div class="mb-3">



                                    <label for="choices-single-default"
                                        class="form-label font-size-13 text-muted">Pedido a



                                    </label>




                                    <livewire:multi-option-select tableName="receptores" componentId="receptores" />


                                </div>



                            </div><!-- end col -->

                            <div class="col-md-4">



                                <div class="mb-3">



                                    <label for="choices-single-default"
                                        class="form-label font-size-13 text-muted">Número de

                                        albarán



                                    </label>



                                    <input class="form-control" type="text" value="" name="ean-producto"
                                        id="numero-albaran-pedido">



                                </div>



                            </div><!-- end col -->

                            <div class="col-12">



                                <div class="mb-3">



                                    <label for="choices-single-default"
                                        class="form-label font-size-13 text-muted">Observaciones



                                    </label>

                                    <textarea class="form-control" placeholder="" id="observaciones"
                                        style="height: 300px"></textarea>





                                </div>



                            </div><!-- end col -->













                        </div>



                        <!-- end row -->



                    </div>



                </div>



            </div>



        </div>







    </div>





</div>




<div class="row">

    <div class="col-lg-12">

        <div class="card">

            <div class="card-header justify-content-between d-flex align-items-center">

                <h4 class="card-title">Productos</h4>

            </div><!-- end card header -->

            <div class="card-body">
                <div class="row">





                    <div class="col-md-6">



                        <div class="mb-3">



                            <label for="choices-single-default" class="form-label font-size-13 text-muted">Producto



                            </label>

                            <div class="input-group" style="flex-wrap:nowrap;">
                                <select id="select_productos" class="form-control">
                                    <option value="No">Ninguno</option>
                                    @foreach($productos as $producto)
                                    <option value="{{ $producto->id }}">
                                        {{ $producto->ean }} - {{ $producto->nombre }}</option>
                                    @endforeach
                                </select>

                            </div>







                        </div>



                    </div><!-- end col -->
                    <div class="col-md-6">



                        <div class="mb-3">



                            <label for="choices-single-default" class="form-label font-size-13 text-muted">Cantidad
                            </label>



                            <input class="form-control" type="number" value=1 name="cantidad" id="cantidad-producto">



                        </div>



                    </div><!-- end col -->

                    <div class="col-12">



                        <div class="mb-4 text-end">



                            <button type="button" id="btn_add_producto_lista"
                                class="btn btn-primary w-md">Añadir</button>



                        </div>



                    </div>






                </div>

                <div class="table-responsive">

                    <table class="table w-100" id="tabla-productos">

                        <thead>

                            <tr>

                                <th>Artículo R.P</th>

                                <th>Código interno</th>

                                <th>EAN</th>

                                <th>Cantidades</th>

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

<div class="row">



    <div class="col-12">



        <div class="mb-4 text-end">



            <button type="button" id="btn_crear_pedido" class="btn btn-primary w-md">Crear</button>



        </div>



    </div>



</div>

</div>


<div class="modal fade modal-sm" id="modal-editar-producto" role="dialog" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title">Editar producto</h5>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                </button>

            </div>

            <div class="modal-body">
                <div class="form-group">
                    <label for="my-input">Nombre</label>
                    <input id="nombre-producto-editar" class="form-control" type="text" name="">
                </div>
                <div class="form-group">
                    <label for="my-input">Código</label>
                    <input id="codigo-producto-editar" class="form-control" type="text" name="">
                </div>
                <div class="form-group">
                    <label for="my-input">EAN</label>
                    <input id="ean-producto-editar" class="form-control" type="text" name="">
                </div>
                <div class="form-group">
                    <label for="my-input">Cantidad</label>
                    <input id="cantidad-producto-editar" class="form-control" type="text" name="">
                </div>

            </div>

            <div class="modal-footer">

                <button type="button" id="btn_editar_producto2" class="btn btn-success">Editar</button>



            </div>

        </div><!-- /.modal-content -->

    </div><!-- /.modal-dialog -->

</div>




@endsection



@section('script')


<script>
(function($) {
    'use strict';
    $("#select_productos").select2();

})(jQuery);
</script>
</script>




<!-- plugins -->



<script src="https://cdn.lordicon.com/ritcuqlt.js"></script>






<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>


<script
    src="https://cdn.datatables.net/v/bs5/jszip-3.10.1/dt-2.0.3/af-2.7.0/b-3.0.1/b-colvis-3.0.1/b-html5-3.0.1/b-print-3.0.1/cr-2.0.0/date-1.5.2/fc-5.0.0/fh-4.0.1/kt-2.12.0/rg-1.5.0/rr-1.5.0/sc-2.4.1/sb-1.7.0/sp-2.3.0/sl-2.0.0/sr-1.4.0/datatables.min.js">

</script>
<script src="https://cdn.datatables.net/responsive/3.0.0/js/dataTables.responsive.js"></script>

<script src="{{ URL::asset('assets/js/pages/crear-pedido/index.js') }}"></script>



@endsection