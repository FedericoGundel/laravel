@extends('layouts.master')
@section('title')
    Video
@endsection
@section('content')
    {{-- breadcrumbs  --}}
@section('breadcrumb')
    @component('components.breadcrumb')
        @slot('li_1')
            UI Elements
        @endslot
        @slot('title')
            Video
        @endslot
    @endcomponent
@endsection

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p class="mb-0">{{ $message }}</p>
                    </div>
                @endif
                <div class="mb-5">
                    <a class="btn btn-warning" href="{{ URL::previous() }}"><i class='bx bx-left-arrow-alt'></i> Back</a>
                    @can('role-list')
                        <a class="btn btn-success" href="{{ route('show-roles') }}"> Roles List</a>
                    @endcan
                </div>
                <table class="table border table-striped mb-5">
                    <thead>
                        <tr>
                            <th scope="col">Sr.No</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Role</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $id = 1;
                        ?>
                        @foreach ($user as $key => $data)
                            <tr class="@if ($data->email === Auth::user()->email) border border-warning-subtle @endif">
                                <th scope="row">{{ $id++ }}</th>
                                <td>{{ $data->name }}</td>
                                <td>{{ $data->email }}</td>
                                <td>

                                    @foreach ($data->roles as $v)
                                        <label class="label label-success">{{ $v->name }}</label>
                                    @endforeach

                                </td>
                                <td>
                                    @if (@$data->roles->pluck('name')[0] !== 'admin')
                                        <a class="btn btn-primary btn-sm"
                                            href="{{ route('users-edit', $data->id) }}">Edit</a>
                                        <a class="btn btn-danger btn-sm"
                                            href="{{ route('delete-user', $data->id) }}">Delete</a>
                                    @else
                                        Not Editable
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                        {{-- Previous Page Link --}}
                        @if ($user->onFirstPage())
                            <li class="page-item disabled">
                                <span class="page-link" aria-hidden="true">&laquo;</span>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link" href="{{ $user->previousPageUrl() }}" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                        @endif

                        {{-- Pagination Elements --}}
                        @foreach ($user->getUrlRange(1, $user->lastPage()) as $page => $url)
                            <li class="page-item {{ $page == $user->currentPage() ? 'active' : '' }}">
                                <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                            </li>
                        @endforeach

                        {{-- Next Page Link --}}
                        @if ($user->hasMorePages())
                            <li class="page-item">
                                <a class="page-link" href="{{ $user->nextPageUrl() }}" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        @else
                            <li class="page-item disabled">
                                <span class="page-link" aria-hidden="true">&raquo;</span>
                            </li>
                        @endif
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>

<!-- Button trigger modal -->
{{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button> --}}

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('register') }}" class="mt-4 pt-2">

                    @csrf

                    <div class="form-floating form-floating-custom mb-3">
                        <input type="text" id="input-username" placeholder="Enter User Name"
                            class="form-control @error('name') is-invalid @enderror" name="name"
                            value="{{ $data->name }}" required autocomplete="name" autofocus>
                        <label for="input-username">{{ __('Name') }}</label>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="form-floating-icon">
                            <i class="uil uil-users-alt"></i>
                        </div>
                    </div>


                    <div class="form-floating form-floating-custom mb-3">
                        <input type="email" id="input-email" placeholder="Enter Email" required=""
                            class="form-control @error('email') is-invalid @enderror" name="email"
                            value="{{ $data->email }}" required autocomplete="email">
                        <div class="invalid-feedback">
                            Please Enter Email
                        </div>
                        <label for="input-email">{{ __('Email Address') }}</label>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="form-floating-icon">
                            <i class="uil uil-envelope-alt"></i>
                        </div>
                    </div>

                    <div class="mb-3">
                        <select class="form-control" name="role" id="role">
                            <option>New Delhi</option>
                        </select>
                    </div>

                </form><!-- end form -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script src="{{ URL::asset('assets/js/app.js') }}"></script>
@endsection
