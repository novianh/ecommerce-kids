@extends('adminlte::page')
@section('title', 'Category')

@section('content_header')
    <h1><i class='mdi mdi-image-area'></i> Edit Products</h1>
@stop

@push('css')
    <link rel="stylesheet" href="{{ asset('ecommerce/node_modules/dropify/dist/css/dropify.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/vendors/font-awesome/css/font-awesome.min.css') }}">
@endpush

@section('breadcrumb', 'Dashboard')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form class="forms-sample" enctype="multipart/form-data" method="POST"
                        action="{{ route('product.update', $product->id) }}" id="my-awesome-dropzone">
                        @csrf
                        @method('PUT')
                        <div class="input-group input-group-static input-group-lg mb-3">
                            <label for="exampleInputUsername1">Product Category</label>

                            <select name="id_category" class="form-control">
                                <option value="">Pilih</option>
                                @foreach ($category as $row)
                                    <option value="{{ $row->id }}"
                                        {{ $product->id_category == $row->id ? 'selected' : '' }}>{{ $row->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('id_category')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="input-group input-group-static input-group-lg mb-3">
                            <label for="exampleInputUsername1">Product Name</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                id="exampleInputUsername1" placeholder="Product Name"
                                value="{{ $product->name ?? old('name') }}">
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="input-group input-group-static input-group-lg mb-3">
                            <label for="exampleInputUsername1">Product SKU</label>
                            <input type="text" name="sku" class="form-control @error('sku') is-invalid @enderror"
                                id="exampleInputUsername1" placeholder="Product SKU"
                                value="{{ $product->sku ?? old('sku') }}">
                            @error('sku')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="input-group input-group-static input-group-lg mb-3">
                            <label for="exampleInputEmail1">Price <small class="text-warning"> *(per item)</small></label>
                            <input type="text" class="form-control  @error('price') is-invalid @enderror "
                                aria-label="Amount (to the nearest dollar)" min="0" name="price"
                                value="{{ $product->price ?? old('price') }}">
                            @error('price')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="input-group input-group-static input-group-lg mb-3">
                            <label for="exampleInputEmail1">Quantity</label>

                            <input type="number" name="quantity"
                                class="form-control @error('quantity') is-invalid @enderror" id="exampleInputUsername1"
                                placeholder="1" value="{{ $product->quantity ?? old('quantity') }}">
                            @error('quantity')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="input-group input-group-static input-group-lg mb-3">
                            <label for="status">Status</label>
                            <select name="status" class="form-control" required>
                                <option value="1" {{ $product->status == '1' ? 'selected' : '' }}>Publish</option>
                                <option value="0"{{ $product->status == '0' ? 'selected' : '' }}>Draft</option>
                            </select>
                            <p class="text-danger">{{ $errors->first('status') }}</p>
                        </div>
                        <div class="input-group input-group-static input-group-lg mb-3">
                            <label for="exampleInputEmail1">Description</label>
                            <textarea class="form-control  @error('desc') is-invalid @enderror" id="exampleFormControlTextarea1" rows="3"
                                name="desc" placeholder="Description">{{ $product->desc ?? old('desc') }}</textarea>
                            @error('desc')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <button type="reset" class="btn btn-danger mr-2" id="submit">Reset</button>
                        <a href="{{ url()->previous() }}" class="btn btn-light" data-dismiss="modal">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
