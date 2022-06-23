@extends('backend.app')
@section('title')
    <i class='mdi mdi-image-area'></i> Management Products
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('ecommerce/node_modules/dropify/dist/css/dropify.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/vendors/font-awesome/css/font-awesome.min.css') }}">
@endsection

@section('breadcrumb', 'Dashboard')

@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="col grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                {{-- <h4 class="card-title text-center">Data Products</h4> --}}
                                <a href="" class="btn btn-primary mb-3" data-toggle="modal"
                                    data-target="#exampleModal"> <i class="icon-plus"></i> Add Product</a>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th width="100rem"></th>
                                                <th width="300rem">Name</th>
                                                <th>SKU</th>
                                                <th>Quantity</th>
                                                <th>Price</th>

                                                <th>Action</th>
                                            </tr>

                                        </thead>
                                        <tbody>
                                            @foreach ($product as $prd)
                                                <tr>
                                                    <td><a href="{{ route('product.show', $prd) }}" class="btn text-dark">
                                                            <i class="fa fa-search"></i></a></td>
                                                    <td>
                                                        {{ $prd->name }}
                                                    </td>
                                                    <td>{{ $prd->sku }}</td>
                                                    <td>{{ $prd->quantity }}</td>
                                                    <td>Rp. {{ $prd->price }}</td>

                                                    <td>
                                                        <a href="{{ route('product.edit', $prd) }}"
                                                            class="btn btn-sm btn-success"><i class="fa fa-edit"
                                                                data-toggle="modal" data-target="#edit"></i> Edit</a>
                                                        <a href="{{ route('product.destroy', $prd) }}"
                                                            class="btn btn-danger btn-sm mb-0"
                                                            onclick="notificationBeforeDelete(event, this)"><i
                                                                class=" fa fa-trash"></i> Delete</a>
                                                        <a href="{{ route('gallery.index', $prd) }}"
                                                            class=" btn btn-sm btn-primary"><i class="fa fa-plus"></i> Add
                                                            image</a>

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
                    <form class="forms-sample" enctype="multipart/form-data" method="POST"
                        action="{{ route('product.store') }}" id="my-awesome-dropzone">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputUsername1">Product Name</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                id="exampleInputUsername1" placeholder="Product Name">
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputUsername1">Product SKU</label>
                            <input type="text" name="sku" class="form-control @error('sku') is-invalid @enderror"
                                id="exampleInputUsername1" placeholder="Product SKU">
                            @error('sku')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="">
                            <label for="exampleInputEmail1">Price <small class="text-warning"> *(per item)</small></label>
                        </div>
                        <div class=" input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Rp.</span>
                            </div>
                            <input type="number" class="form-control  @error('price') is-invalid @enderror "
                                aria-label="Amount (to the nearest dollar)" min="0" name="price">
                            @error('price')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Quantity</label>

                            <input type="number" name="quantity"
                                class="form-control @error('quantity') is-invalid @enderror" id="exampleInputUsername1"
                                placeholder="1">
                            @error('quantity')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Description</label>
                            <textarea class="form-control  @error('desc') is-invalid @enderror" id="exampleFormControlTextarea1" rows="3"
                                name="desc" placeholder="Description"></textarea>
                            @error('desc')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        {{-- <div class="form-group">
                            <label for="exampleInputPassword1">Product Image</label>
                            <input type="file" class="dropify @error('desc') is-invalid @enderror" id="input-file-now"
                                name="image" data-errors-position="outside" data-max-file-size="4M"
                                data-allowed-file-extensions="jpeg png jpg svg gif" />
                            @error('desc')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div> --}}
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addImageForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Image Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="forms-sample" enctype="multipart/form-data" method="POST" id="addImage">
                        @csrf
                        <fieldset disabled>
                            <div class="form-group">
                                <input type="text" name="product_id" id="product_id" class="form-control"
                                    id="disableTextInput" value="">
                            </div>
                        </fieldset>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Product Image</label>
                            <input type="file" id="image" class="dropify @error('desc') is-invalid @enderror"
                                id="input-file-now" name="image" data-errors-position="outside" data-min-width="800"
                                data-max-file-size="4M" data-allowed-file-extensions="jpeg png jpg svg gif" />
                            @error('desc')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="submit">Submit</button>
                        </div>
                    </form>
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













    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> --}}
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

            // Used events
            // var drEvent = $('.dropify').dropify();

            // drEvent.on('dropify.error.imageFormat', function(event, element) {
            //     alert('Image format error message!');
            // });
        });
    </script>
@endsection
