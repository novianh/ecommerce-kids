@extends('adminlte::page')
@section('title', 'checkout')

@section('content_header')
    <h1><i class="fas fa-map"></i> Management Address</h1>
@stop

@push('css')
    <link rel="stylesheet" href="{{ asset('ecommerce/node_modules/dropify/dist/css/dropify.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/vendors/font-awesome/css/font-awesome.min.css') }}">
    <style>
        li:not(:last-child) {
            margin-bottom: 5px;
        }
    </style>
@endpush

@section('content')
    <div class="row justify-content-center">
        <div class="col-6">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-primary shadow-primary border-radius-lg pt-4 pb-3 d-flex">
                        <h6 class="text-white text-capitalize ps-3"><i class="fas fa-map-marker-alt"></i> Address Table
                        </h6>

                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class=" p-0">

                            <table class="table align-items-center mb-0 bordered" id="payment">
                                <thead>
                                    <tr>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Username
                                        </th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Address </th>
                                    </tr>
                                </thead>
                                <tbody class="payment-name text-xs font-weight-bold">
                                    @foreach ($user as $user)
                                        <tr>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">
                                                    {{ $user->name ?? 'data not found' }}</p>

                                            </td>
                                            <td>
                                                {{-- {{ dd($user)  }}/\ --}}
                                                @foreach ($user->address as $item)
                                                    <ul class="ml-0 pl-1">
                                                        <li class="text-xs mb-0 d-flex justify-content-between">

                                                            {{ $item->name ?? 'data not found' }} :

                                                            {{ $item->address ?? 'data not found' }}

                                                            <div class="">
                                                                <a href="{{ route('admin.address.edit', $item) }}"
                                                                    class="text-secondary font-weight-bold text-xs btn-edit"
                                                                    data-toggle="tooltip" data-placement="top"
                                                                    title="edit payment">
                                                                    Edit </a>
                                                                <a href="{{ route('admin.address.delete', $item->id) }}"
                                                                    class="ml-2 text-danger font-weight-bold text-xs btn-delete"
                                                                    onclick="notificationBeforeDelete(event, this)"
                                                                    data-toggle="tooltip" data-placement="top"
                                                                    title="delete payment">
                                                                    <i class="fas fa-times"></i>
                                                                </a>

                                                            </div>

                                                        </li>
                                                    </ul>
                                                @endforeach
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
