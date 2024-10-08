@extends('layouts.master')
@section('title')Form Advanced Plugins @endsection
@section('css')

<!-- plugin css -->
<link href="{{ URL::asset('assets/libs/choices.js/choices.js.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/libs/flatpickr/flatpickr.min.css') }}" rel="stylesheet">

<!-- One of the following themes -->
<link href="{{ URL::asset('assets/libs/@simonwep/@simonwep.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/libs/@simonwep/@simonwep.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/libs/@simonwep/@simonwep.min.css') }}" rel="stylesheet">

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
    <div class="col-xl-6">
        <div class="card">
            <div class="card-header justify-content-between d-flex align-items-center">
                <h4 class="card-title">Css Switch</h4>
            </div><!-- end card header -->
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-6">
                        <h5 class="font-size-14 mb-3">Example Switch</h5>
                        <div class="d-flex flex-wrap gap-2">
                            <input type="checkbox" id="switch1" switch="none" checked />
                            <label for="switch1" data-on-label="On" data-off-label="Off" class="mb-0"></label>

                            <input type="checkbox" id="switch2" switch="default" checked />
                            <label for="switch2" data-on-label="" data-off-label="" class="mb-0"></label>

                            <input type="checkbox" id="switch3" switch="bool" checked />
                            <label for="switch3" data-on-label="Yes" data-off-label="No" class="mb-0"></label>

                            <input type="checkbox" id="switch6" switch="primary" checked />
                            <label for="switch6" data-on-label="Yes" data-off-label="No" class="mb-0"></label>

                            <input type="checkbox" id="switch4" switch="success" checked />
                            <label for="switch4" data-on-label="Yes" data-off-label="No" class="mb-0"></label>

                            <input type="checkbox" id="switch7" switch="info" checked />
                            <label for="switch7" data-on-label="Yes" data-off-label="No" class="mb-0"></label>

                            <input type="checkbox" id="switch5" switch="warning" checked />
                            <label for="switch5" data-on-label="Yes" data-off-label="No" class="mb-0"></label>

                            <input type="checkbox" id="switch8" switch="danger" checked />
                            <label for="switch8" data-on-label="Yes" data-off-label="No" class="mb-0"></label>

                            <input type="checkbox" id="switch9" switch="dark" checked />
                            <label for="switch9" data-on-label="Yes" data-off-label="No" class="mb-0"></label>
                        </div>
                    </div><!-- end col -->

                    <div class="col-xl-6">
                        <div class="mt-4 mt-xl-0">
                            <h5 class="font-size-14 mb-3">Square Switch</h5>
                            <div class="d-flex flex-wrap gap-2">
                                <div class="square-switch">
                                    <input type="checkbox" id="square-switch1" switch="none" checked />
                                    <label for="square-switch1" data-on-label="On" data-off-label="Off"
                                        class="mb-0"></label>
                                </div>
                                <div class="square-switch">
                                    <input type="checkbox" id="square-switch2" switch="info" checked />
                                    <label for="square-switch2" data-on-label="Yes" data-off-label="No"
                                        class="mb-0"></label>
                                </div>
                                <div class="square-switch">
                                    <input type="checkbox" id="square-switch3" switch="bool" checked />
                                    <label for="square-switch3" data-on-label="Yes" data-off-label="No"
                                        class="mb-0"></label>
                                </div>
                            </div>
                        </div>
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end card body -->
        </div><!-- end card -->
    </div><!-- end col -->

    <div class="col-xl-6">
        <div class="card">
            <div class="card-header justify-content-between d-flex align-items-center">
                <h4 class="card-title">Colorpicker</h4>
            </div><!-- end card header -->
            <div class="card-body">
                <div class="text-center">
                    <div class="row">
                        <div class="col-4">
                            <div>
                                <h5 class="font-size-14">Classic Demo</h5>
                                <div class="classic-colorpicker"></div>
                            </div>
                        </div><!-- end col -->
                        <div class="col-4">
                            <div>
                                <h5 class="font-size-14">Monolith Demo</h5>
                                <div class="monolith-colorpicker"></div>
                            </div>
                        </div><!-- end col -->
                        <div class="col-4">
                            <div>
                                <h5 class="font-size-14">Nano Demo</h5>
                                <div class="nano-colorpicker"></div>
                            </div>
                        </div><!-- end col -->
                    </div><!-- end row -->
                </div>
            </div><!-- end card body-->
        </div><!-- end card -->
    </div><!-- end col -->
</div><!-- end row -->

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header justify-content-between d-flex align-items-center">
                <h4 class="card-title">Choices</h4>
            </div><!-- end card header -->
            <div class="card-body">
                <div>
                    <h5 class="font-size-14 mb-3">Single select input Example</h5>

                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <div class="mb-3">
                                <label for="choices-single-default"
                                    class="form-label font-size-13 text-muted">Default</label>
                                <select class="form-control" data-trigger name="choices-single-default"
                                    id="choices-single-default">
                                    <option value="">This is a placeholder</option>
                                    <option value="Choice 1">Choice 1</option>
                                    <option value="Choice 2">Choice 2</option>
                                    <option value="Choice 3">Choice 3</option>
                                </select>
                            </div>
                        </div><!-- end col -->
                        <div class="col-lg-4 col-md-6">
                            <div class="mb-3">
                                <label for="choices-single-groups" class="form-label font-size-13 text-muted">Option
                                    groups</label>
                                <select class="form-control" data-trigger name="choices-single-groups"
                                    id="choices-single-groups">
                                    <option value="">Choose a city</option>
                                    <optgroup label="UK">
                                        <option value="London">London</option>
                                        <option value="Manchester">Manchester</option>
                                        <option value="Liverpool">Liverpool</option>
                                    </optgroup>
                                    <optgroup label="FR">
                                        <option value="Paris">Paris</option>
                                        <option value="Lyon">Lyon</option>
                                        <option value="Marseille">Marseille</option>
                                    </optgroup>
                                    <optgroup label="DE" disabled>
                                        <option value="Hamburg">Hamburg</option>
                                        <option value="Munich">Munich</option>
                                        <option value="Berlin">Berlin</option>
                                    </optgroup>
                                    <optgroup label="US">
                                        <option value="New York">New York</option>
                                        <option value="Washington" disabled>Washington</option>
                                        <option value="Michigan">Michigan</option>
                                    </optgroup>
                                    <optgroup label="SP">
                                        <option value="Madrid">Madrid</option>
                                        <option value="Barcelona">Barcelona</option>
                                        <option value="Malaga">Malaga</option>
                                    </optgroup>
                                    <optgroup label="CA">
                                        <option value="Montreal">Montreal</option>
                                        <option value="Toronto">Toronto</option>
                                        <option value="Vancouver">Vancouver</option>
                                    </optgroup>
                                </select>
                            </div>
                        </div><!-- end col -->
                        <div class="col-lg-4 col-md-6">
                            <div class="mb-3">
                                <label for="choices-single-no-search" class="form-label font-size-13 text-muted">Options
                                    added
                                    via config with no search</label>
                                <select class="form-control" name="choices-single-no-search"
                                    id="choices-single-no-search">
                                    <option value="0">Zero</option>
                                </select>
                            </div>
                        </div><!-- end col -->
                        <div class="col-lg-4 col-md-6">
                            <div class="mb-3">
                                <label for="choices-single-no-sorting"
                                    class="form-label font-size-13 text-muted">Options added
                                    via config with no search</label>
                                <select class="form-control" name="choices-single-no-sorting"
                                    id="choices-single-no-sorting">
                                    <option value="Madrid">Madrid</option>
                                    <option value="Toronto">Toronto</option>
                                    <option value="Vancouver">Vancouver</option>
                                    <option value="London">London</option>
                                    <option value="Manchester">Manchester</option>
                                    <option value="Liverpool">Liverpool</option>
                                    <option value="Paris">Paris</option>
                                    <option value="Malaga">Malaga</option>
                                    <option value="Washington" disabled>Washington</option>
                                    <option value="Lyon">Lyon</option>
                                    <option value="Marseille">Marseille</option>
                                    <option value="Hamburg">Hamburg</option>
                                    <option value="Munich">Munich</option>
                                    <option value="Barcelona">Barcelona</option>
                                    <option value="Berlin">Berlin</option>
                                    <option value="Montreal">Montreal</option>
                                    <option value="New York">New York</option>
                                    <option value="Michigan">Michigan</option>
                                </select>
                            </div>
                        </div><!-- end col -->
                    </div>
                    <!-- end row -->
                </div>
                <!-- Single select input Example -->


                <div class="mt-4">
                    <h5 class="font-size-14 mb-3">Multiple select input</h5>

                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <div class="mb-3">
                                <label for="choices-multiple-default"
                                    class="form-label font-size-13 text-muted">Default</label>
                                <select class="form-control" data-trigger name="choices-multiple-default"
                                    id="choices-multiple-default" multiple>
                                    <option value="Choice 1" selected>Choice 1</option>
                                    <option value="Choice 2">Choice 2</option>
                                    <option value="Choice 3">Choice 3</option>
                                    <option value="Choice 4" disabled>Choice 4</option>
                                </select>
                            </div>
                        </div><!-- end col -->
                        <div class="col-lg-4 col-md-6">
                            <div class="mb-3">
                                <label for="choices-multiple-remove-button"
                                    class="form-label font-size-13 text-muted">With
                                    remove button</label>
                                <select class="form-control" name="choices-multiple-remove-button"
                                    id="choices-multiple-remove-button" multiple>
                                    <option value="Choice 1" selected>Choice 1</option>
                                    <option value="Choice 2">Choice 2</option>
                                    <option value="Choice 3">Choice 3</option>
                                    <option value="Choice 4">Choice 4</option>
                                </select>
                            </div>
                        </div><!-- end col -->
                        <div class="col-lg-4 col-md-6">
                            <div class="mb-3">
                                <label for="choices-multiple-groups" class="form-label font-size-13 text-muted">Option
                                    groups</label>
                                <select class="form-control" name="choices-multiple-groups" id="choices-multiple-groups"
                                    multiple>
                                    <option value="">Choose a city</option>
                                    <optgroup label="UK">
                                        <option value="London">London</option>
                                        <option value="Manchester">Manchester</option>
                                        <option value="Liverpool">Liverpool</option>
                                    </optgroup>
                                    <optgroup label="FR">
                                        <option value="Paris">Paris</option>
                                        <option value="Lyon">Lyon</option>
                                        <option value="Marseille">Marseille</option>
                                    </optgroup>
                                    <optgroup label="DE" disabled>
                                        <option value="Hamburg">Hamburg</option>
                                        <option value="Munich">Munich</option>
                                        <option value="Berlin">Berlin</option>
                                    </optgroup>
                                    <optgroup label="US">
                                        <option value="New York">New York</option>
                                        <option value="Washington" disabled>Washington</option>
                                        <option value="Michigan">Michigan</option>
                                    </optgroup>
                                    <optgroup label="SP">
                                        <option value="Madrid">Madrid</option>
                                        <option value="Barcelona">Barcelona</option>
                                        <option value="Malaga">Malaga</option>
                                    </optgroup>
                                    <optgroup label="CA">
                                        <option value="Montreal">Montreal</option>
                                        <option value="Toronto">Toronto</option>
                                        <option value="Vancouver">Vancouver</option>
                                    </optgroup>
                                </select>
                            </div>
                        </div><!-- end col -->
                    </div>
                    <!-- end row -->
                </div>
                <!-- multi select input Example -->

                <div class="mt-4">
                    <h5 class="font-size-14 mb-3">Text inputs</h5>

                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <div class="mb-3">
                                <label for="choices-text-remove-button"
                                    class="form-label font-size-13 text-muted">Limited to 5
                                    values with remove button</label>
                                <input class="form-control" id="choices-text-remove-button" type="text"
                                    value="Task-1,Task-2" />
                            </div>
                        </div>
                        <!-- end col -->

                        <div class="col-lg-4 col-md-6">
                            <div class="mb-3">
                                <label for="choices-text-unique-values"
                                    class="form-label font-size-13 text-muted">Unique values
                                    only, no pasting</label>
                                <input class="form-control" id="choices-text-unique-values" type="text"
                                    value="Project-A, Project-B" />
                            </div>
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->

                    <div>
                        <label for="choices-text-disabled" class="form-label font-size-13 text-muted">Disabled</label>
                        <input class="form-control" id="choices-text-disabled" type="text"
                            value="josh@joshuajohnson.co.uk, joe@bloggs.co.uk" />
                    </div>
                </div>
            </div>
            <!-- end card body -->
        </div><!-- end card -->
    </div><!-- end col -->
</div><!-- end row -->

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header justify-content-between d-flex align-items-center">
                <h4 class="card-title">Datepicker</h4>
            </div><!-- end card header -->
            <div class="card-body">
                <form action="#">
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="mb-3">
                                <label class="form-label">Basic</label>
                                <input type="text" class="form-control" id="datepicker-basic">
                            </div>
                            <!-- end col -->
                            <div class="mb-3">
                                <label class="form-label">DateTime</label>
                                <input type="text" class="form-control" id="datepicker-datetime">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Human-friendly Dates</label>
                                <input type="text" class="form-control flatpickr-input" id="datepicker-humanfd">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">MinDate and MaxDate</label>
                                <input type="text" class="form-control" id="datepicker-minmax">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Disabling dates</label>
                                <input type="text" class="form-control" id="datepicker-disable">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Selecting multiple dates</label>
                                <input type="text" class="form-control" id="datepicker-multiple">
                            </div>
                        </div><!-- end col -->

                        <div class="col-xl-6">
                            <div class="mt-3 mt-lg-0">
                                <div class="mb-3">
                                    <label class="form-label">Range</label>
                                    <input type="text" class="form-control" id="datepicker-range">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Timepicker</label>
                                    <input type="text" class="form-control" id="datepicker-timepicker">
                                </div>

                                <div>
                                    <label class="form-label">Inline</label>
                                    <input type="text" class="form-control" id="datepicker-inline">
                                </div>
                            </div>
                        </div><!-- end col -->
                    </div><!-- end row -->
                </form><!-- end form -->
            </div><!-- end card body -->
        </div><!-- end card -->
    </div><!-- end col -->
</div><!-- end row -->

@endsection
@section('script')

<!-- plugins -->
<script src="{{ URL::asset('assets/libs/choices.js/choices.js.min.js') }}"></script>
<script src="{{ URL::asset('assets/libs/flatpickr/flatpickr.min.js') }}"></script>

<!-- Modern colorpicker bundle -->
<script src="{{ URL::asset('assets/libs/@simonwep/@simonwep.min.js') }}"></script>

<!-- init js -->
<script src="{{ URL::asset('assets/js/pages/form-advanced.init.js') }}"></script>
<script src="{{ URL::asset('assets/js/app.js') }}"></script>

@endsection