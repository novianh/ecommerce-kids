@extends('adminlte::page')
@section('title', 'Category')

@section('content_header')
    <h1><i class='fas fa-fw fa-boxes'></i> Products Category</h1>
@stop

@push('css')
    <link rel="stylesheet" href="{{ asset('ecommerce/node_modules/dropify/dist/css/dropify.min.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('css/argon-dashboard.min.css') }}"> --}}
@endpush

@section('breadcrumb', 'Dashboard')

@section('content')
    <div class="mt-3">
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">

                        <form class="forms-sample" enctype="multipart/form-data" method="POST" id="addImage"
                            action="{{ route('category.store') }}">
                            @csrf

                            <div class="my-3">
                                <div class="input-group input-group-outline @error('name') is-invalid @enderror">
                                    <label for="" class="form-label">Category Name</label>
                                    <input type="text" name="name" class="form-control" id="exampleInputUsername1"
                                        aria-label="Username" aria-describedby="basic-addon1">
                                    </div>
                                    @error('name')
                                        <p><small class="text-danger">{{ $message }}</small></p>
                                    @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Category Image</label>
                                <input type="file" id="image" class="dropify @error('image') is-invalid @enderror"
                                    id="input-file-now" name="image" data-errors-position="outside"
                                    data-max-file-size="4M" data-allowed-file-extensions="jpeg png jpg svg gif" />
                                @error('image')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary mr-2" id="submit">Submit</button>
                            {{-- <button type="reset" class="btn btn-danger" id="submit">Reset</button> --}}
                            <a href="{{ url()->previous() }}" class="btn btn-light" data-dismiss="modal">Cancel</a>

                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table text-center">
                                <thead>
                                    <tr>
                                        <th>Category Image</th>
                                        <th>Category Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    @foreach ($category as $ctg)
                                        <tr>
                                            <td><img src="{{ url('storage/category/' . $ctg->image) }}" alt=""
                                                    class="avatar avatar-sm">
                                            </td>
                                            <td>{{ $ctg->name }} </td>
                                            <td>
                                                <div class="dropdown">
                                                    <a class="btn text-secondary " href="#" role="button"
                                                        id="dropdownMenuLink{{ $ctg->id }}" data-toggle="dropdown"
                                                        aria-expanded="false">

                                                        <i class="fas fa-ellipsis-v"></i>
                                                    </a>
                                                    <div class="dropdown-menu"
                                                        aria-labelledby="dropdownMenuLink{{ $ctg->id }}">
                                                        <a href="{{ route('category.edit', $ctg) }}"
                                                            class="dropdown-item text-success"><i class="fa fa-edit"
                                                                data-toggle="modal" data-target="#edit"></i> Edit</a>
                                                        <a href="{{ route('category.destroy', $ctg) }}"
                                                            class="dropdown-item text-danger"
                                                            onclick="notificationBeforeDelete(event, this)"><i
                                                                class=" fa fa-trash"></i>
                                                            Delete</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ asset('ecommerce/node_modules/dropify/dist/js/dropify.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            // Basic
            $('.dropify').dropify();

        });
    </script>

    <form action="" id="delete-form" method="post">
        @method('delete')
        @csrf
    </form>
    <script>
        function notificationBeforeDelete(event, el) {
            event.preventDefault();
            if (confirm('Apakah anda yakin akan menghapus data ? ')) {
                $("#delete-form").attr('action', $(el).attr('href'));
                $("#delete-form").submit();
            }
        }
    </script>

@endsection
