@extends('adminlte::page')
@section('title', 'Category')

@section('content_header')
    <h1 class="text-center"><i class='mdi mdi-image-area'></i> Management Payment</h1>
@stop

@push('css')
    <link rel="stylesheet" href="{{ asset('ecommerce/node_modules/dropify/dist/css/dropify.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/vendors/font-awesome/css/font-awesome.min.css') }}">
@endpush

@section('breadcrumb', 'Dashboard')

@section('content')
    <div class="row justify-content-center">
        <div class="col-6">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-primary shadow-primary border-radius-lg pt-4 pb-3 d-flex">
                        <h6 class="text-white text-capitalize ps-3"><i class="fas fa-money-bill-wave"></i> Payment Table
                        </h6>

                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class=" p-0">

                            <table class="table align-items-center mb-0" id="payment">
                                <thead>
                                    <tr>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            <a class="add-payment" role="button" data-toggle="modal"
                                                data-target="#exampleModal">+ Add Payment Name</a>
                                        </th>
                                        <th class="text-secondary opacity-7" style="width: 10%"></th>
                                        {{-- <th class="text-secondary opacity-7"></th> --}}
                                    </tr>
                                </thead>
                                <tbody class="payment-name text-xs font-weight-bold">
                                    @foreach ($payment as $item)
                                        <tr>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">
                                                    {{ $item->name ?? 'data not found' }}</p>

                                            </td>
                                            <td>
                                                <small
                                                    class="text-xs mb-0">{{ $item->account_number ?? 'data not found' }}</small>
                                            </td>
                                            {{-- <td class="align-middle text-right">
                                                <a href="javascript: ;"
                                                    class="text-secondary font-weight-bold text-xs btn-edit"
                                                    data-id="{{ $item->id }}" data-toggle="tooltip" data-placement="top"
                                                    title="edit payment">
                                                    Edit
                                                </a>
                                            </td> --}}
                                            {{-- <td class="align-middle text-right">
                                                <a href="javascript:;"
                                                    class="text-danger font-weight-bold text-xs btn-delete"
                                                    data-rowid="{{ $item->id }}" data-toggle="tooltip"
                                                    data-placement="top" title="delete payment">
                                                    <i class="fas fa-times"></i>
                                                </a>
                                            </td> --}}
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





    <!-- Modal -->
    <div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form forms-sample" enctype="multipart/form-data" method="POST" action="javascript:void(0)"
                        id="form">
                        @csrf
                        <input type="hidden" name="id">
                        <div class="input-group input-group-static input-group-lg @error('name') is-invalid @enderror my-3">
                            <label for="exampleInputUsername1" class="">Payment Method</label>
                            <input type="text" name="name" class="form-control" required id="exampleInputUsername1">
                        </div>
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                        <div class="input-group input-group-static input-group-lg @error('name') is-invalid @enderror my-3">
                            <label for="exampleInputUsername1" class="label-number">Account Number <span
                                    class="text-muted text-sm">(Optional)</span></label>
                            <input type="text" name="account_number" class="form-control input-number"
                                id="exampleInputUsername1">
                        </div>
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary btn-save">Submit</button>
                    <button type="button" class="btn btn-primary btn-update">Save changes</button </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            var token = '{{ csrf_token() }}'
            var modal = $('.modal')
            var form = $('.form')
            var btnAddPayment = $('.add-payment'),
                btnAddShipment = $('.add-shipment'),
                btnSave = $('.btn-save'),
                btnUpdate = $('.btn-update');

            var table = $('#payment').DataTable({
                ajax: '',
                serverSide: true,
                processing: true,
                "responsive": true,
                pagingType: 'numbers',
                "searching": false,
                aaSorting: [
                    [0, "desc"]
                ],
                "columnDefs": [{
                    "targets": 0, //column index
                    "data": "name",
                    orderable: false,
                    "render": function(data, type, row) {
                        return data +
                            '</br><hr class="light horizontal my-1"> <small class="text-xs mb-0"> ' +
                            row['account_number'] + '</small>';
                    }
                }],
                columns: [{
                        data: 'name',
                        name: 'name',
                        orderable: false,
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                    },
                ]
            });

            var tableShipment = $('#shipment').DataTable({
                ajax: '',
                serverSide: true,
                processing: true,
                "responsive": true,
                pagingType: 'numbers',
                "searching": false,
                aaSorting: [
                    [0, "desc"]
                ],
                columns: [{
                        data: 'name',
                        name: 'name',
                        orderable: false,
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                    },
                ]
            });

            btnAddPayment.click(function() {
                modal.modal('show')
                form.trigger('reset')
                modal.find('.modal-title').text('Add New Payment')
                modal.find('.label-number').removeClass('d-none')
                modal.find('.input-number').removeClass('d-none')
                modal.find('.btn-save').removeClass('save-shipment')
                btnSave.show();
                btnUpdate.hide();
            })


            btnSave.click(function(e) {
                e.preventDefault();
                var data = form.serialize()
                $.ajax({
                    type: "post",
                    url: "{{ route('co.payment.store') }}",
                    data: data + '&_token=' + token,
                    dataType: 'json',
                    success: function(data) {
                        if (data.success) {
                            console.log(data);
                            const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: false,
                                didOpen: (toast) => {
                                    toast.addEventListener('mouseenter', Swal
                                        .stopTimer)
                                    toast.addEventListener('mouseleave', Swal
                                        .resumeTimer)
                                }
                            })
                            Toast.fire({
                                icon: 'success',
                                title: 'Add Product Success'
                            })
                            table.draw();
                            modal.modal('hide');
                            form.trigger("reset");
                        } else if (data.error) {
                            console.log(data.error);
                        }
                    },
                })

            })

            $(document).on('click', '.btn-edit', function() {
                btnSave.hide();
                btnUpdate.show();
                modal.find('.modal-title').text('Update Product')
                modal.find('.modal-footer button[type="submit"]').text('Update')
                var rowData = table.row($(this).parents('tr')).data()

                form.find('input[name="id"]').val(rowData.id)
                form.find('input[name="name"]').val(rowData.name)
                form.find('input[name="account_number"]').val(rowData.account_number)
                modal.modal()
            })

            btnUpdate.click(function() {
                var formData = form.serialize() + '&_method=PUT&_token=' + token
                var updateId = form.find('input[name="id"]').val()
                form.find('input[name="id"]').val()
                console.log(updateId)
                $.ajax({
                    type: "POST",
                    url: "/admin/checkout/payment/update/" + updateId,
                    data: formData,
                    success: function(data) {
                        if (data) {
                            const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: false,
                                didOpen: (toast) => {
                                    toast.addEventListener('mouseenter', Swal
                                        .stopTimer)
                                    toast.addEventListener('mouseleave', Swal
                                        .resumeTimer)
                                }
                            })
                            Toast.fire({
                                icon: 'success',
                                title: 'Update Payment Success'
                            })
                            table.draw()
                            modal.modal('hide');
                        } else if (error) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Go back, you missing something',
                            })
                        }
                    }
                })
            })

            $(document).on('click', '.btn-delete', function() {
                // if (!confirm("Are you sure?")) return;

                var rowid = $(this).data('rowid')
                console.log(rowid);
                var el = $(this)
                if (!rowid) return;
                Swal.fire({
                    title: 'Apakah Anda Yakin?',
                    text: "Anda tidak akan dapat mengembalikan ini!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#1a73e8',
                    cancelButtonColor: '#f44335',
                    confirmButtonText: 'Ya, Hapus!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: "POST",
                            dataType: 'JSON',
                            url: "/admin/checkout/payment/delete/" + rowid,
                            data: {
                                _method: 'delete',
                                _token: token
                            },
                            success: function(data) {
                                if (data.success) {
                                    console.log(data.success);
                                    const Toast = Swal.mixin({
                                        toast: true,
                                        position: 'top-end',
                                        showConfirmButton: false,
                                        timer: 3000,
                                        timerProgressBar: false,
                                        didOpen: (toast) => {
                                            toast.addEventListener(
                                                'mouseenter',
                                                Swal
                                                .stopTimer)
                                            toast.addEventListener(
                                                'mouseleave',
                                                Swal
                                                .resumeTimer)
                                        }
                                    })
                                    Toast.fire({
                                        icon: 'success',
                                        title: 'Berhasil menghapus data'
                                    })
                                    table.row(el.parents('tr'))
                                        .remove()
                                        .draw();
                                }
                            }
                        });
                    }
                })

            })
        });
    </script>
@endsection
