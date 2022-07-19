@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content_header')
    <h1><i class="fas fa-columns"></i> Dashboard</h1>
@stop

@push('css')
    <link rel="stylesheet" href="{{ asset('ecommerce/node_modules/dropify/dist/css/dropify.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
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

    {{-- @forelse($notifications as $notification)
            <div class="alert alert-success" role="alert">
                [{{ $notification->created_at }}] User {{ $notification->data['name'] }}
                ({{ $notification->data['email'] }}) has just registered.
                <a href="#" class="float-right mark-as-read" data-id="{{ $notification->id }}">
                    Mark as read
                </a>
            </div>

            @if ($loop->last)
                <a href="#" id="mark-all">
                    Mark all as read
                </a>
            @endif
        @empty
            There are no new notifications
        @endforelse --}}

    <div class="row mt-5">

        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-header p-3 pt-2">
                    <div
                        class="icon icon-lg icon-shape bg-info shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                        <i class="fas fa-shopping-bag"></i>
                    </div>
                    <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize">Incoming Order</p>
                        <h4 class="mb-0">{{ $countOrder ?? '-' }}</h4>
                    </div>
                </div>
                <hr class="dark horizontal my-0">
                <div class="card-footer p-3">
                    <a href="{{ route('Morder.index') }}">

                        <p class="mb-0">More Info <i class="far fa-arrow-alt-circle-right"></i></p>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-header p-3 pt-2">
                    <div
                        class="icon icon-lg icon-shape bg-primary shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                        <i class="fas fa-archive"></i>
                    </div>
                    <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize">Product Display</p>
                        <h4 class="mb-0">{{ $product ?? '-' }}</h4>
                    </div>
                </div>
                <hr class="dark horizontal my-0">
                <div class="card-footer p-3">
                    <a href="{{ route('product.index') }}">

                        <p class="mb-0">More Info <i class="far fa-arrow-alt-circle-right"></i></p>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-header p-3 pt-2">
                    <div
                        class="icon icon-lg icon-shape bg-warning shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize">Customer</p>
                        <h4 class="mb-0">{{ $user ?? '-' }}</h4>
                    </div>
                </div>
                <hr class="dark horizontal my-0">
                <div class="card-footer p-3">
                    <a href="">

                        <p class="mb-0">More Info <i class="far fa-arrow-alt-circle-right"></i></p>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-header p-3 pt-2">
                    <div
                        class="icon icon-lg icon-shape bg-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                        <i class="fas fa-money"></i>
                    </div>
                    <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize">Cash</p>
                        <h4 class="mb-0">Rp. {{ number_format($total, 2) ?? '-' }}</h4>
                    </div>
                </div>
                <hr class="dark horizontal my-0">
                <div class="card-footer p-3">
                    <a href="">

                        <p class="mb-0">''</p>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="card my-4">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Customers table</h6>
            </div>
        </div>
        <div class="card-body px-0 pb-2">
            <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                    <thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Customer</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Order Count
                            </th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                Registered</th>
                            <th class="text-secondary opacity-7"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $item)
                            <tr>
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <div>
                                            <img src="https://ui-avatars.com/api/?name={{ $item->name }}&background=random"
                                                class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                                        </div>
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm">{{ $item->name ?? '-' }}</h6>
                                            <p class="text-xs text-secondary mb-0">{{ $item->email ?? '-' }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0">{{ $item->order->count() ?? '-' }}</p>
                                    <p class="text-xs text-secondary mb-0">Rp.
                                        {{ number_format($item->order->sum('total'), 2) }}</p>
                                </td>
                                <td class="align-middle text-center">
                                    <span
                                        class="text-secondary text-xs font-weight-bold">{{ $item->created_at ?? '-' }}</span>
                                </td>
                                <td class="align-middle">
                                    <a href="{{ route('profile.edit', $item) }}"
                                        class="text-secondary font-weight-bold text-xs" data-toggle="tooltip"
                                        data-original-title="Edit customer">
                                        Edit
                                    </a>
                                    <a href="{{ route('profile.destroy', $item->id) }}"
                                        class="text-danger font-weight-bold text-xs" data-toggle="tooltip"
                                        onclick="notificationBeforeDelete(event, this)"
                                        data-original-title="Delete customer">
                                        Del
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
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
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })
            Swal.fire({
                title: 'Are You Sure?',
                text: "You won't be able to revert this!!",
                icon: 'warning',
                showCancelButton: true,
                customClass: {
                    confirmButton: 'btn btn-primary',
                    cancelButton: 'btn btn-info ms-3'
                },
                buttonsStyling: false,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
            }).then((result) => {
                if (result.isConfirmed) {
                    $("#delete-form").attr('action', $(el).attr('href'));
                    $("#delete-form").submit();
                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'Cancelled',
                        'Your data is safe :)',
                        'error'
                    )
                }
            });
        }
        var _token = '{{ csrf_token() }}'

        function sendMarkRequest(id = null) {
            return $.ajax("{{ route('markNotification') }}", {
                method: 'POST',
                data: {
                    _token,
                    id
                }
            });
        }
        $(function() {
            $('.mark-as-read').click(function() {
                let request = sendMarkRequest($(this).data('id'));
                request.done(() => {
                    $(this).parents('div.alert').remove();
                });
            });
            $('#mark-all').click(function() {
                let request = sendMarkRequest();
                request.done(() => {
                    $('div.alert').remove();
                })
            });
        });
    </script>

@endsection
