@extends('adminlte::page')
@section('title', 'Category')

@section('content_header')
    <h1><i class='mdi mdi-image-area'></i> Management Products</h1>
@stop

@push('css')
    <link rel="stylesheet" href="{{ asset('ecommerce/node_modules/dropify/dist/css/dropify.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/vendors/font-awesome/css/font-awesome.min.css') }}">
@endpush

@section('breadcrumb', 'Dashboard')

@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">

            <div class="card">
                <div class="card-body">
                    {{-- <h4 class="card-title text-center">Data Products</h4> --}}
                    <button type="button" class="btn btn-primary mb-3 add"> <i class="fas fa-plus"></i> Add Product</button>
                    <a href="{{ route('product.trash') }}" class="btn btn-info mb-3 ml-2"><i class="fas fa-recycle"></i> Recycle Bin</a>
                    <div class="">
                        <table id="example2" class="table table-hover text-center">
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

                                        {{-- <td>
                                            {{ $prd->name }}
                                        </td>
                                        <td>{{ $prd->sku }}</td>
                                        <td>{{ $prd->quantity }}</td>
                                        <td>Rp. {{ $prd->price }}</td>
                                        <td>{!! $prd->status_label !!}</td> --}}

                                        <td>

                                            <div class="dropdown">
                                                <a class="btn text-secondary " href="#" role="button"
                                                    id="dropdownMenuLink{{ $prd->id }}" data-toggle="dropdown"
                                                    aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu"
                                                    aria-labelledby="dropdownMenuLink{{ $prd->id }}">
                                                    <a data-toggle="modal" data-target="#exampleModal" href=""
                                                        class="dropdown-item text-dark">
                                                        <i class="fa fa-search"></i> See More</a>
                                                    <a href="{{ route('product.edit', $prd) }}"
                                                        class="dropdown-item text-success"><i class="fa fa-edit"
                                                            data-toggle="modal" data-target="#edit"></i> Edit</a>
                                                    <a href="{{ route('product.destroy', $prd) }}"
                                                        class="dropdown-item text-danger"
                                                        onclick="notificationBeforeDelete(event, this)"><i
                                                            class=" fa fa-trash"></i>
                                                        Delete</a>
                                                    <a href="{{ route('gallery.index', $prd) }}"
                                                        class="dropdown-item text-primary"><i class="fa fa-plus"></i> Add
                                                        image</a>
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


    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form forms-sample" enctype="multipart/form-data" method="POST" action="javascript:void(0)"
                        id="form">
                        @csrf

                        <input type="hidden" name="id">
                        <div class=" input-group input-group-static input-group-lg form-group">
                            <label for="id_category">Category</label>
                            <select name="id_category" class="form-control" required>
                                <option value="">Choose Product Category</option>
                                @foreach ($category as $row)
                                    <option value="{{ $row->id }}"
                                        {{ old('id_category') == $row->id ? 'selected' : '' }}>{{ $row->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        @error('id_category')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                        <div class="input-group input-group-static input-group-lg @error('name') is-invalid @enderror my-3">
                            <label for="exampleInputUsername1" class="">Product Name</label>
                            <input type="text" name="name" class="form-control" required id="exampleInputUsername1">
                        </div>
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                        <div class="input-group input-group-static input-group-lg my-3">
                            <label for="exampleInputUsername1" class="">Product SKU</label>
                            <input type="text" name="sku" required
                                class="form-control @error('sku') is-invalid @enderror" id="exampleInputUsername1">
                            @error('sku')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="input-group input-group-static input-group-lg my-3">
                            <label for="exampleInputUsername1" class="">Price <small class="text-warning">
                                    *(per
                                    item)</small></label>
                            <input type="text" name="price" required
                                class="form-control @error('price') is-invalid @enderror" id="exampleInputUsername1">
                            @error('price')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="input-group input-group-static input-group-lg mb-4">
                            <label for="exampleInputEmail1" class="">Quantity</label>

                            <input type="number" required name="quantity" class="form-control"
                                id="exampleInputUsername1">
                        </div>
                        <div class="input-group input-group-static my-3">
                            <label for="status">Status</label>
                            <select name="status" class="form-control" required>
                                <option value="">Choose Status</option>
                                <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Publish
                                </option>
                                <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                            </select>
                            <p class="text-danger">{{ $errors->first('status') }}</p>
                        </div>
                        <div class="input-group input-group-static input-group-lg my-3">
                            <label for="exampleInputEmail1">Description</label>
                            <textarea required class="form-control @error('desc') is-invalid @enderror" id="exampleFormControlTextarea1"
                                rows="3" name="desc"></textarea>
                            @error('desc')
                                <small class="text-danger" id="validation-errors">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary btn-update">Update</button>
                            <button type="button" class="btn btn-primary btn-save">Submit</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('js')
    <form action="" id="delete-form" method="post">
        @method('delete')
        @csrf
    </form>
    <script>
        // $('#example2').DataTable({
        //     "responsive": true,
        //     pagingType: 'numbers',
        //     "searching": false
        // });

        function notificationBeforeDelete(event, el) {
            event.preventDefault();
            if (confirm('Apakah anda yakin akan menghapus data ? ')) {
                $("#delete-form").attr('action', $(el).attr('href'));
                $("#delete-form").submit();
            }
        }
    </script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script>
        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('body').on('click', '#addImageId', function(event) {

                event.preventDefault();
                var id = $(this).data('id');
                console.log(id)
                $.get('gallery/' + id + '/add', function(data) {
                    $('#userCrudModal').html("add image");
                    $('#submit').val("add image");
                    $('#addImageForm').modal('show');
                    $('#product_id').val(id);
                })
            });


        });
    </script>
    <script src="{{ asset('ecommerce/node_modules/dropify/dist/js/dropify.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            // Basic
            $('.dropify').dropify();

        });
    </script>


    <script>
        $(document).ready(function() {
            $.noConflict();
            var token = '{{ csrf_token() }}'
            var modal = $('.modal')
            var form = $('.form')
            var btnAdd = $('.add'),
                btnSave = $('.btn-save'),
                btnUpdate = $('.btn-update');

            var table = $('#example2').DataTable({
                ajax: '',
                serverSide: true,
                processing: true,
                "responsive": true,
                pagingType: 'numbers',
                // "searching": false
                aaSorting: [
                    [0, "desc"]
                ],
                columns: [{
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'sku',
                        name: 'sku'
                    },
                    {
                        data: 'quantity',
                        name: 'quantity'
                    },
                    {
                        data: 'price',
                        name: 'price'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                    {
                        data: 'action',
                        name: 'action'
                    },
                ]
            });

            btnAdd.click(function() {
                modal.modal()
                form.trigger('reset')
                modal.find('.modal-title').text('Add New Product')
                btnSave.show();
                btnUpdate.hide()
            })

            btnSave.click(function(e) {
                e.preventDefault();
                var data = form.serialize()
                // console.log(data)
                $.ajax({
                    type: "POST",
                    url: "",
                    data: data + '&_token=' + token,
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
                                title: 'Add Product Success'
                            })
                            table.draw();
                            form.trigger("reset");
                            modal.modal('hide');
                        } else if (data.error) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Go back, you missing something',
                            })
                        }
                    },
                }); //end ajax
            })


            $(document).on('click', '.btn-edit', function() {
                btnSave.hide();
                btnUpdate.show();


                modal.find('.modal-title').text('Update Product')
                modal.find('.modal-footer button[type="submit"]').text('Update')

                var rowData = table.row($(this).parents('tr')).data()

                form.find('input[name="id"]').val(rowData.id)
                form.find('select[name="id_category"]').val(rowData.id_category)
                form.find('input[name="name"]').val(rowData.name)
                form.find('input[name="sku"]').val(rowData.sku)
                form.find('input[name="price"]').val(rowData.price)
                form.find('input[name="quantity"]').val(rowData.quantity)
                form.find('select[name="status"]').val(rowData.status)
                form.find('textarea[name="desc"]').val(rowData.desc)
                modal.modal()
            })

            btnUpdate.click(function() {
                // if (!confirm("Are you sure?")) return;
                var formData = form.serialize() + '&_method=PUT&_token=' + token
                var updateId = form.find('input[name="id"]').val()
                console.log(updateId)
                $.ajax({
                    type: "POST",
                    url: "/admin/product/" + updateId,
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
                                title: 'Update Product Success'
                            })
                            table.draw();
                            modal.modal('hide');
                        } else if (data.error) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Go back, you missing something',
                            })
                        }
                    }
                }); //end ajax
            })


            $(document).on('click', '.btn-delete', function() {
                // if (!confirm("Are you sure?")) return;

                var rowid = $(this).data('rowid')
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
                            url: "/admin/product/" + rowid,
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


                // $.ajax({
                //     type: "POST",
                //     dataType: 'JSON',
                //     url: "/admin/product/" + rowid,
                //     data: {
                //         _method: 'delete',
                //         _token: token
                //     },
                //     success: function(data) {
                //         if (data.success) {
                //             table.row(el.parents('tr'))
                //                 .remove()
                //                 .draw();
                //         }
                //     }
                // }); //end ajax
            })

        })
    </script>
@endpush
