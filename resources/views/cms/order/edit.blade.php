@extends('adminlte::page')
@section('title', 'Status')

@section('content_header')
    <h1><i class='mdi mdi-image-area'></i> Edit Status</h1>
@stop

@push('css')
    <link rel="stylesheet" href="{{ asset('ecommerce/node_modules/dropify/dist/css/dropify.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/vendors/font-awesome/css/font-awesome.min.css') }}">
@endpush

@section('breadcrumb', 'Dashboard')

@section('content')
    <div class="card">
        <form action="{{ route('Morder.update', $order->id) }}" class="form" method="post">
            @csrf
            @method('PUT')
            <div class="card-body">
                {{-- <input type="hidden" name="id" id="id"> --}}
                <div class="input-group input-group-static mb-4">
                    <label for="status" class="ms-0">Edit Status</label>
                    {{-- {{ dd(old('status')) }} --}}
                    <select class="form-control text-capitalize" name="status" id="status">
                        <option value="2" {{ $order->status == '2' ? 'selected' : '' }}>Pending Payment
                        </option>
                        <option value="3" {{ $order->status == '3' ? 'selected' : '' }}>Order On Process
                        </option>
                        <option value="4" {{ $order->status == '4' ? 'selected' : '' }}>Order Sent</option>
                        <option value="5" {{ $order->status == '5' ? 'selected' : '' }}>Order received by
                            customer
                        </option>
                        <option value="6" {{ $order->status == '6' ? 'selected' : '' }}>Order finished
                        </option>
                        <option value="8" {{ $order->status == '8' ? 'selected' : '' }}>Order canceled
                        </option>
                    </select>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary btn-update">Update</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </form>
    </div>

    </div>

@endsection
