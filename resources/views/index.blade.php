@section('css')



<!-- plugin css -->



<link href="{{ URL::asset('assets/libs/flatpickr/flatpickr.min.css') }}" rel="stylesheet">
<link
    href="https://cdn.datatables.net/v/bs5/jszip-3.10.1/dt-2.0.3/af-2.7.0/b-3.0.1/b-colvis-3.0.1/b-html5-3.0.1/b-print-3.0.1/cr-2.0.0/date-1.5.2/fc-5.0.0/fh-4.0.1/kt-2.12.0/r-3.0.0/rg-1.5.0/rr-1.5.0/sc-2.4.1/sb-1.7.0/sp-2.3.0/sl-2.0.0/sr-1.4.0/datatables.min.css"
    rel="stylesheet">


<!-- One of the following themes -->

<link href="{{ URL::asset('assets/libs/@simonwep/@simonwep.min.css') }}" rel="stylesheet">





@endsection



@extends('layouts.master')

@section('title')

Dashboard

@endsection

@section('content')

{{-- breadcrumbs  --}}

@section('breadcrumb')

@component('components.breadcrumb')

@slot('li_1')

Dashboard

@endslot

@slot('title')

Welcome !

@endslot

@endcomponent

@endsection

<div class="row">

    <div class="col">

        <div class="card">

            <div class="card-body ">

                <div class="row">

                    <div class="col-xl-12">



                        <label class="form-label">Rango de fechas</label>

                        <form id="form_dates" class="row gx-3 gy-2 align-items-center">

                            <div class="col">

                                <input type="text" class="form-control flatpickr-input" id="rango-fechas-inicio"
                                    readonly="readonly">

                            </div>



                            <!-- end col -->

                            <div class="col-auto">

                                <button type="submit" class="btn btn-primary">Aplicar</button>

                            </div>
                            @csrf
                            <!-- end col -->

                        </form>

                    </div><!-- end card body -->

                </div><!-- end card -->

            </div><!-- end col -->

        </div>





    </div>

</div>



<div class="row row-cols-md-2 row-cols-1">

    <div class="col">

        <div class="card">

            <div class="card-body p-0">

                <div class="row">

                    <div class="col">

                        <div class="mt-md-0 py-3 px-4 mx-2">



                            <div class="d-flex flex-column align-items-center justify-content-center">

                                <lord-icon class="mb-2" src="https://cdn.lordicon.com/qduwaows.json" trigger="hover"
                                    colors="primary:#4b9e44,secondary:#454340" style="width:50px;height:50px">

                                </lord-icon>



                                <h3 id="entradas" class="text-black mb-2"></h3>

                                <p class="text-black-50 mb-0 text-truncate">Entradas pendientes por

                                    revisar

                                </p>

                            </div>



                        </div>

                    </div><!-- end col -->







                </div><!-- end row -->

            </div><!-- end card body -->

        </div><!-- end card -->

    </div><!-- end col -->



    <div class="col">

        <div class="card">

            <div class="card-body p-0">

                <div class="row">



                    <div class="col">

                        <div class="mt-md-0 py-3 px-4 mx-2">

                            <div class="d-flex flex-column align-items-center justify-content-center">

                                <lord-icon class="mb-2" src="https://cdn.lordicon.com/wzwygmng.json" trigger="hover"
                                    colors="primary:#4b9e44,secondary:#454340" style="width:50px;height:50px">

                                </lord-icon>



                                <h3 id="referencias" class="text-black mb-2"></h3>

                                <p class="text-black-50 mb-0 text-truncate">Número de referencias

                                    actuales

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

    <div class="col-xl-8 mb-4">

        <div class="card h-100 mb-0">

            <div class="card-header justify-content-between d-flex align-items-center">

                <h4 class="card-title">Entradas y números de referencias</h4>

            </div>

            <div class="card-body pb-2">





                <div class="row align-items-center">



                    <div class="col">

                        <div>

                            <div id="grafico-entradas-referencias" data-colors='["--bs-primary", "--bs-success"]'
                                class="apex-charts" dir="ltr"></div>

                        </div>

                    </div>

                </div>



            </div>



        </div>

    </div>



    <div class="col-xl-4 mb-4">

        <div class="row h-100 row-cols-1">

            <div class="col pb-4">

                <div class="card h-100 mb-0">

                    <div class="card-body p-0 d-flex justify-content-center align-items-center">



                        <div class="mt-md-0 py-3 px-4 mx-2">



                            <div class="d-flex flex-column align-items-center justify-content-center">

                                <lord-icon class="mb-2" src="https://cdn.lordicon.com/qduwaows.json" trigger="hover"
                                    colors="primary:#4b9e44,secondary:#454340" style="width:50px;height:50px">

                                </lord-icon>



                                <h3 id="entradas_hoy" class="text-black mb-2"></h3>

                                <p class="text-black-50 mb-0 text-truncate">Entradas hoy

                                </p>

                            </div>



                        </div>

                    </div><!-- end col -->







                </div><!-- end card -->

            </div><!-- end col -->



            <div class="col">

                <div class="card h-100 mb-0">

                    <div class="card-body p-0 d-flex justify-content-center align-items-center">



                        <div class="mt-md-0 py-3 px-4 mx-2">

                            <div class="d-flex flex-column align-items-center justify-content-center">

                                <lord-icon class="mb-2" src="https://cdn.lordicon.com/wzwygmng.json" trigger="hover"
                                    colors="primary:#4b9e44,secondary:#454340" style="width:50px;height:50px">

                                </lord-icon>

                                <h3 id="referencias_hoy" class="text-black mb-2"></h3>

                                <p class="text-black-50 mb-0 text-truncate">Referencias

                                    nuevas hoy

                                </p>



                            </div>

                        </div>



                    </div><!-- end card body -->

                </div><!-- end card -->

            </div><!-- end col -->



        </div>

    </div>

</div><!-- end row-->







<div class="row">





    <div class="col-xxl-4 mb-4">

        <div class="card h-100 mb-0">

            <div class="card-header justify-content-between d-flex align-items-center">

                <h4 class="card-title">Operarios</h4>

            </div>

            <div class="card-body pb-3">





                <div class="">

                    <div class="table-responsive">

                        <table class="table w-100" id="tabla-usuarios">
                            <thead>
                                <tr>
                                    <th>Foto</th>
                                    <th>Nombre</th>
                                    <th>Referencias</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Aquí puedes agregar filas de datos si deseas, pero no es necesario para DataTables -->
                            </tbody>

                        </table>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <div class="col-xxl-8 mb-4">

        <div class="card h-100 mb-0">

            <div class="card-header justify-content-between d-flex align-items-center">

                <h4 class="card-title">Referencias por operario</h4>

            </div>

            <div class="card-body pb-2">





                <div class="row align-items-center">



                    <div class="col">

                        <div>

                            <div id="grafico-operarios" data-colors='["--bs-primary", "--bs-success"]'
                                class="apex-charts" dir="ltr"></div>

                        </div>

                    </div>

                </div>



            </div>



        </div>

    </div>

</div> <!-- end row -->



@endsection



@section('script')

<!-- apexcharts -->

<script src="{{ URL::asset('assets/libs/flatpickr/flatpickr.min.js') }}"></script>
<script src="{{ URL::asset('assets/libs/flatpickr/l10n/es.js') }}"></script>
<script src="{{ URL::asset('assets/libs/apexcharts/apexcharts.min.js') }}"></script>

<!-- Vector map-->

<script src="{{ URL::asset('assets/libs/jsvectormap/jsvectormap.min.js') }}"></script>

<script src="{{ URL::asset('assets/libs/jsvectormap/maps/world-merc.js') }}"></script>

<!-- swiper js -->

<script src="{{ URL::asset('https://apexcharts.com/samples/assets/stock-prices.js') }}"></script>

<!-- for github style chart -->

<script src="{{ URL::asset('https://apexcharts.com/samples/assets/github-data.js') }}"></script>

<!-- for irregular timeseries chart -->

<script src="{{ URL::asset('https://apexcharts.com/samples/assets/irregular-data-series.js') }}"></script>

<script src="{{ URL::asset('assets/libs/swiper/swiper-bundle.min.js') }}"></script>


<script
    src="https://cdn.datatables.net/v/bs5/jq-3.7.0/jszip-3.10.1/dt-2.0.3/af-2.7.0/b-3.0.1/b-colvis-3.0.1/b-html5-3.0.1/b-print-3.0.1/cr-2.0.0/date-1.5.2/fc-5.0.0/fh-4.0.1/kt-2.12.0/rg-1.5.0/rr-1.5.0/sc-2.4.1/sb-1.7.0/sp-2.3.0/sl-2.0.0/sr-1.4.0/datatables.min.js">

</script>
<script src="https://cdn.datatables.net/responsive/3.0.0/js/dataTables.responsive.js"></script>


<script src="{{ URL::asset('assets/libs/moment/moment.min.js') }}"></script>



<script src="{{ URL::asset('assets/js/pages/inicio/graficos-inicio.js') }}"></script>

<script src="{{ URL::asset('assets/js/app.js') }}"></script>



<script src="https://cdn.lordicon.com/ritcuqlt.js"></script>



















@endsection