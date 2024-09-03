@extends('layouts.master')
@section('title')Cart @endsection
@section('content')
{{-- breadcrumbs  --}}
    @section('breadcrumb')
        @component('components.breadcrumb')
            @slot('li_1') Ecommerce @endslot
            @slot('title') Cart @endslot
        @endcomponent
    @endsection
<div class="row">
    <div class="col-xl-8">
        <div class="card border shadow-none">
            <div class="card-body">
                <div class="d-flex align-items-start border-bottom pb-3">
                    <div class="me-4">
                        <img src="{{URL::asset('assets/images/product/img-1.png')}}" alt="" class="avatar-lg">
                    </div>
                    <div class="flex-grow-1 align-self-center overflow-hidden">
                        <div>
                            <h5 class="text-truncate font-size-17"><a href="ecommerce-product-detail" class="text-reset">Nike N012 Running Shoes</a></h5>
                            <p class="mb-1">Color : <span class="fw-medium text-muted">Gray</span></p>
                            <p>Size : <span class="fw-medium">08</span></p>
                        </div>
                    </div>
                    <div class="flex-shrink-0 ms-2">
                        <ul class="list-inline mb-0 font-size-16">
                            <li class="list-inline-item">
                                <a href="#" class="text-muted px-1">
                                    <i class="mdi mdi-trash-can-outline"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#" class="text-muted px-1">
                                    <i class="mdi mdi-heart-outline"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div>
                    <div class="row align-items-end">
                        <div class="col-md-4">
                            <div class="mt-3">
                                <p class="text-muted mb-2">Price</p>
                                <h5 class="font-size-16 mb-0">$260</h5>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mt-3">
                                <p class="text-muted mb-2">Quantity</p>
                                <div class="d-inline-flex">
                                    <select class="form-select form-select-sm w-lg">
                                        <option value="1">1</option>
                                        <option value="2" selected>2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mt-3">
                                <p class="text-muted mb-2">Total</p>
                                <h5 class="font-size-16 mb-0">$520</h5>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- end card -->

        <div class="card border shadow-none">
            <div class="card-body">

                <div class="d-flex align-items-start border-bottom pb-3">
                    <div class="me-4">
                        <img src="{{URL::asset('assets/images/product/img-2.png')}}" alt="" class="avatar-lg">
                    </div>
                    <div class="flex-grow-1 align-self-center overflow-hidden">
                        <div>
                            <h5 class="text-truncate font-size-17"><a href="ecommerce-product-detail" class="text-reset">Sport Running Shoes</a></h5>
                            <p class="mb-1">Color : <span class="fw-medium text-muted">Gray And Red</span></p>
                            <p>Size : <span class="fw-medium text-muted">08</span></p>
                        </div>
                    </div>
                    <div class="flex-shrink-0 ms-2">
                        <ul class="list-inline mb-0 font-size-16">
                            <li class="list-inline-item">
                                <a href="#" class="text-muted px-1">
                                    <i class="mdi mdi-trash-can-outline"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#" class="text-muted px-1">
                                    <i class="mdi mdi-heart-outline"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div>
                    <div class="row align-items-end">
                        <div class="col-md-4">
                            <div class="mt-3">
                                <p class="text-muted mb-2">Price</p>
                                <h5 class="font-size-16 mb-0">$540</h5>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mt-3">
                                <p class="text-muted mb-2">Quantity</p>
                                <div class="d-inline-flex">
                                    <select class="form-select form-select-sm w-lg">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3" selected>3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mt-3">
                                <p class="text-muted mb-2">Total</p>
                                <h5 class="font-size-16 mb-0">$1620</h5>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- end card -->

        <div class="card border shadow-none">
            <div class="card-body">

                <div class="d-flex align-items-start border-bottom pb-3">
                    <div class="me-4">
                        <img src="{{URL::asset('assets/images/product/img-8.png')}}" alt="" class="avatar-lg">
                    </div>
                    <div class="flex-grow-1 align-self-center overflow-hidden">
                        <div>
                            <h5 class="text-truncate font-size-17"><a href="ecommerce-product-detail" class="text-reset">Adidas Running Shoes</a></h5>
                            <p class="mb-1">Color : <span class="fw-medium text-muted">Purple</span></p>
                            <p>Size : <span class="fw-medium text-muted">09</span></p>
                        </div>
                    </div>
                    <div class="flex-shrink-0 ms-2">
                        <ul class="list-inline mb-0 font-size-16">
                            <li class="list-inline-item" data-toggle="tooltip" data-placement="top" title="Remove">
                                <a href="#" class="text-muted px-1">
                                    <i class="mdi mdi-trash-can-outline"></i>
                                </a>
                            </li>
                            <li class="list-inline-item" data-toggle="tooltip" data-placement="top" title="Add Wishlist">
                                <a href="#" class="text-muted px-1">
                                    <i class="mdi mdi-heart-outline mb-0"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div>
                    <div class="row align-items-end">
                        <div class="col-md-4">
                            <div class="mt-3">
                                <p class="text-muted mb-2">Price</p>
                                <h5 class="font-size-16 mb-0">$1120</h5>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mt-3">
                                <p class="text-muted mb-2">Quantity</p>
                                <div class="d-inline-flex">
                                    <select class="form-select form-select-sm w-lg">
                                        <option value="1" selected>1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mt-3">
                                <p class="text-muted mb-2">Total</p>
                                <h5 class="font-size-16 mb-0">$1120</h5>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- end card -->

        <div class="row my-4">
            <div class="col-sm-6">
                <a href="ecommerce-products" class="btn btn-link text-muted">
                    <i class="mdi mdi-arrow-left me-1"></i> Continue Shopping </a>
            </div> <!-- end col -->
            <div class="col-sm-6">
                <div class="text-sm-end mt-2 mt-sm-0">
                    <a href="ecommerce-checkout" class="btn btn-success">
                        <i class="mdi mdi-cart-outline me-1"></i> Checkout </a>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row-->
    </div>

    <div class="col-xl-4">
        <div class="mt-5 mt-lg-0">
            <div class="card border shadow-none">
                <div class="card-header bg-transparent border-bottom py-3 px-4">
                    <h5 class="font-size-16 mb-0">Order Summary <span class="float-end">#MN0124</span></h5>
                </div>
                <div class="card-body p-4 pt-2">

                    <div class="table-responsive">
                        <table class="table mb-0">
                            <tbody>
                                <tr>
                                    <td>Sub Total :</td>
                                    <td class="text-end">$ 780</td>
                                </tr>
                                <tr>
                                    <td>Discount : </td>
                                    <td class="text-end">- $ 78</td>
                                </tr>
                                <tr>
                                    <td>Shipping Charge :</td>
                                    <td class="text-end">$ 25</td>
                                </tr>
                                <tr>
                                    <td>Estimated Tax : </td>
                                    <td class="text-end">$ 18.20</td>
                                </tr>
                                <tr class="bg-light">
                                    <th>Total :</th>
                                    <td class="text-end">
                                        <span class="fw-bold">
                                            $ 745.2
                                        </span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- end table-responsive -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end row -->

@endsection
@section('script')

<script src="{{ URL::asset('assets/js/app.js') }}"></script>

@endsection
