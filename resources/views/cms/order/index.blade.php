@extends('adminlte::page')
@section('title', 'Category')

@section('content_header')
    <h1><i class='mdi mdi-image-area'></i> </h1>
@stop

@push('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="{{ asset('ecommerce/node_modules/dropify/dist/css/dropify.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/vendors/font-awesome/css/font-awesome.min.css') }}">
    <style>
        .dataTables_length label {
            padding: 0 2rem;
        }

        .dataTables_wrapper .row:nth-child(3) {
            padding: 0 2rem;
        }
    </style>
@endpush

@section('breadcrumb', 'Dashboard')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <div class="row justify-content-start align-items-center">
                            <div class="col-8">
                                <h6 class="text-capitalize ps-3 text-white">Order table</h6>
                            </div>
                            <div class="col-4 px-5 mb-3 text-end">
                                <form action="{{ route('date.filter.order') }}" method="post">
                                    @csrf
                                    <div class="input-group input-group-static row " id="datepicker">
                                        <div class="col-9">
                                            <input type="text" class="selector text-white " name="time_start"
                                                value="{{ Carbon\Carbon::now()->toDateString() }}" />
    
                                        </div>
                                        <div class="col">
                                            <button type="submit" class="mt-3 btn btn-sm btn-light">filter</button>

                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                   
                    <div class="table-responsive p-0">
                        <table id="table1" class="table-hover table align-items-center justify-content-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 pe-2">
                                        Transaction Number
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Customer</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        transfer
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Status</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Total</th>

                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (isset($order))
                                    @foreach ($order as $item)
                                        <tr id="status_id{{ $item->id }}">

                                            <td>
                                                <div class="d-flex">
                                                    <div class="my-auto">
                                                        <a href="{{ route('Morder.show', $item) }}">
                                                            <h6 class="mb-0 text-sm px-2">
                                                                {{ $item->transaction_number }}
                                                            </h6>

                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="text-sm font-weight-bold mb-0 ">
                                                    {{ $item->user->name }}</p>
                                                <small>
                                                    {{ date('d-m-Y H:i:s', strtotime($item->created_at)) }}

                                                </small>
                                            </td>
                                            <td>
                                                @isset($item->transfer->transfer)
                                                    <img src="{{ asset('storage/transfer/' . $item->transfer->transfer) }}"
                                                        class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                                                @endisset
                                                @empty($item->transfer->transfer)
                                                    -
                                                @endempty
                                            </td>
                                            <td id="status_tb">
                                                {!! $item->status_label !!}
                                            </td>
                                            <td>
                                                <p class="text-sm font-weight-bold mb-0">Rp.
                                                    {{ number_format($item->total, 2) }}</p>
                                            </td>
                                            <td class="align-middle">
                                                <a href="{{ route('Morder.edit', $item) }}"
                                                    class="btn btn-link text-secondary mb-0 btn-edit"
                                                    data-id="{{ $item->id }}">
                                                    edit
                                                </a>
                                            </td>

                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <p>Data Not Found</p>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        $(".selector").flatpickr({
            altInput: true,
            altFormat: "F j, Y",
            dateFormat: "Y-m-d",

        });
    </script>
    <script>
        $('#table1').DataTable({
            "responsive": true,
            pagingType: 'numbers',
            "searching": false,
            columnDefs: [{
                targets: 4,
                orderable: false
            }],
        });
    </script>
@endsection
