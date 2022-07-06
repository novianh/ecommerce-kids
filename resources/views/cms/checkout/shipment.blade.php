@extends('adminlte::page')
@section('title', 'Category')

@section('content_header')
    <h1 class="text-center"><i class='mdi mdi-image-area'></i> Management Shipment</h1>
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
                    <h6 class="text-white text-capitalize ps-3"><i class="fas fa-truck"></i> Shipment Table</h6>

                </div>
                <div class="card-body px-0 pb-2">
                    <div class="p-0">

                        <table class="table align-items-center mb-0" id="shipment">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">

                                        <a class="add-shipment" role="button" data-toggle="modal"
                                            data-target="#exampleModal">+ Add Shipment </a>
                                    </th>
                                    <th class="text-secondary opacity-7" style="width: 1%"></th>
                                </tr>
                            </thead>
                            <tbody class="shipment-name text-xs font-weight-bold">
                                @foreach ($shipment as $item)
                                    <tr>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">
                                                {{ $item->name ?? 'data not found' }}</p>
                                        </td>
                                        <td class="align-middle text-right">
                                            <a href="javascript:;" class="text-danger font-weight-bold text-xs btn-delete"
                                                data-rowid="{{ $item->id }}" data-toggle="tooltip" data-placement="top"
                                                title="delete shipment">
                                                <i class="fas fa-times"></i>
                                            </a>
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
                            <label for="exampleInputUsername1" class="">Shipment Name</label>
                            <input type="text" name="name" class="form-control" required id="exampleInputUsername1">
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
            var btnAddShipment = $('.add-shipment'),
                btnSave = $('.btn-save'),
                btnUpdate = $('.btn-update');

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

            btnAddShipment.click(function() {
                modal.modal('show')
                form.trigger('reset')
                modal.find('.modal-title').text('Add New Sipment')
                modal.find('.name').text('Shipment Name')
                modal.find('.label-number').addClass('d-none')
                modal.find('.input-number').addClass('d-none')
                modal.find('.btn-save').removeClass('save-payment')
                modal.find('.btn-save').addClass('save-shipment')
                btnSave.show();
                btnUpdate.hide();
            })

            btnSave.click(function(e) {
                e.preventDefault();
                var data = form.serialize()
                $shipment = btnSave.hasClass('save-shipment')
                if ($shipment == 1) {
                    $.ajax({
                        type: "post",
                        url: "{{ route('co.shipment.store') }}",
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
                                tableShipment.draw();
                                modal.modal('hide');
                                form.trigger("reset");
                            } else if (data.error) {
                                console.log(data.error);
                            }
                        },
                    })
                } else {
                    $.ajax({
                        type: "post",
                        url: "{{ route('co.shipment.store') }}",
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

                }
            })

            $(document).on('click', '.btn-edit', function() {
                btnSave.hide();
                btnUpdate.show();
                modal.find('.modal-title').text('Update Product')
                modal.find('.modal-footer button[type="submit"]').text('Update')
                var rowData = tableShipment.row($(this).parents('tr')).data()

                form.find('input[name="id"]').val(rowData.id)
                form.find('input[name="name"]').val(rowData.name)
                modal.modal()
            })

            btnUpdate.click(function() {
                var formData = form.serialize() + '&_method=PUT&_token=' + token
                var updateId = form.find('input[name="id"]').val()
                console.log(updateId)
                $.ajax({
                    type: "POST",
                    url: "/admin/checkout/shipment/update/" + updateId,
                    data: formData,
                    success: function(data) {
                        if (data.success) {
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
                                title: 'Update Shipment Success'
                            })
                            tableShipment.draw();

                            modal.modal('hide');
                        } else if (data.error) {
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
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Hapus!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: "POST",
                            dataType: 'JSON',
                            url: "/admin/checkout/shipment/delete/" + rowid,
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
                                    tableShipment.row(el.parents('tr'))
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
