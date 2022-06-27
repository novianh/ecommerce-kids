@extends('adminlte::page')
@section('title', 'Product Recycle Bin')

@section('content_header')
    <h1><i class='mdi mdi-trash'></i> Product Recycle Bin</h1>
@stop

@push('css')
    <link rel="stylesheet" href="{{ asset('ecommerce/node_modules/dropify/dist/css/dropify.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/vendors/font-awesome/css/font-awesome.min.css') }}">
@endpush

@section('content')

    <div class="card mt-5">
        <div class="card-body">

            {{-- <a href="{{ route('product.index') }}" class="btn btn-light mr-2"><i class="fas fa-angle-left"></i> Back</a>
            <a href="{{ route('product.restoreAll') }}" class="btn btn-warning"><i class="fas fa-undo-alt"></i> Restore All</a> --}}

            <table class="table text-center">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>SKU</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($product as $prd)
                        <tr>

                            <td>
                                {{ $prd->name }}
                            </td>
                            <td>{{ $prd->sku }}</td>
                            <td>{{ $prd->quantity }}</td>
                            <td>Rp. {{ $prd->price }}</td>
                            <td>{!! $prd->status_label !!}</td>

                            <td>

                                {{-- <div class="dropdown">
                                    <a class="btn text-secondary " href="#" role="button"
                                        id="dropdownMenuLink{{ $prd->id }}" data-toggle="dropdown"
                                        aria-expanded="false">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink{{ $prd->id }}">
                                        <a href="{{ route('product.restore', $prd) }}"
                                            class="text-success dropdown-item"><i class="fas fa-trash-restore"></i> Restore</a>
                                        <a href="/gallery/hapus_permanen/{{ $prd->id }}"
                                            class="text-danger dropdown-item"><i class="fas fa-ban"></i> Empty Bin</a>
                                    </div>
                                </div> --}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
