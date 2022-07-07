@extends('adminlte::page')
@section('title', 'checkout')

@section('content_header')
    <h1><i class="fas fa-map"></i> Edit Address</h1>
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
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">

                    <form class="needs-validation form" novalidate
                        action="{{ route('admin.address.update', $address->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="row g-3">
                                <div class="col-12 input-group input-group-static mb-4">
                                    <label for="email" class="">Address Name</label>
                                    <input type="text" class="form-control" id="email" placeholder="Home"
                                        name="name" value="{{ $address->name ?? old('name') }}">
                                    <div class="invalid-feedback">
                                        Please enter a valid email address for shipping updates.
                                    </div>
                                </div>
                                <div class="col-12 input-group input-group-static mb-4">
                                    <label for="telephon" class="">Telephone</label>
                                    <input type="tel" class="form-control" id="telephon" placeholder="089898******"
                                        name="telephone" value="{{ $address->telephone ?? old('telephone') }}">
                                    <div class="invalid-feedback">
                                        Please enter a valid email address for shipping updates.
                                    </div>
                                </div>

                                <div class="col-12 input-group input-group-static mb-4">
                                    <label for="address" class="">Address</label>
                                    <input type="text" class="form-control" id="address" placeholder="1234 Main St"
                                        required name="address" value="{{ $address->address ?? old('address') }}">
                                    <div class="invalid-feedback">
                                        Please enter your shipping address.
                                    </div>
                                </div>

                                <div class="col-12 input-group input-group-static mb-4">
                                    <label for="address2" class="">Address 2 <span
                                            class="text-muted">(Optional)</span></label>
                                    <input type="text" class="form-control" id="address2"
                                        placeholder="Apartment or suite" name="address2"
                                        value="{{ $address->address2 ?? old('address2') }}">
                                </div>

                                <div class="col-md-5 ">
                                    <div class="input-group input-group-static mb-4">

                                        <label for="country" class="ms-0">Province</label>
                                        <select class="form-control rounded-5" id="provinsi" required name="country">
                                            <option value="">Choose...</option>
                                            @foreach ($province as $id)
                                                <option value="{{ $id->code }}"
                                                    {{ $id->code == $address->country ? 'selected' : '' }}>
                                                    {{ $id->name }}</option>
                                            @endforeach

                                        </select>
                                        <div class="invalid-feedback">
                                            Please select a valid country.
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-4" id="kotaWrapper">
                                    <div class="input-group input-group-static mb-4">
                                        <label for="state" class="ms-0">City</label>
                                        <select class="form-control rounded-5" id="kota" required name="state">
                                            <option value="">Choose...</option>
                                            @foreach ($cityAll as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ $item->id == $address->state ? 'selected' : '' }}>
                                                    {{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">
                                            Please provide a valid state.
                                        </div>

                                    </div>
                                </div>

                                <div class="col-md-3 ">
                                    <div class="input-group input-group-static mb-4">

                                        <label for="zip" class="">Zip</label>
                                        <input type="text" class="form-control" id="zip" placeholder="" required
                                            name="zip" value="{{ $address->zip }}">
                                        <div class="invalid-feedback">
                                            Zip code required.
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- <h5 class="mb-3">Payment</h5> -->

                        </div>
                        <div class="">
                            <a href="{{ url()->previous() }}" class="btn btn-secondary" >Back</a>
                            <button type="reset" class="btn btn-warning ml-3" >Reset</button>
                            <button type="submit" class="btn btn-primary px-3 btn-update ml-3">Update </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

    <script>
        $(document).ready(function() {

            $('#provinsi').on('change', function() {

                axios.post('{{ route('address.storeDropdown') }}', {
                        code: $(this).val()
                    })

                    .then(function(response) {
                        $('#kota').empty();
                        $.each(response.data, function(id, name) {

                            $('#kota').append(new Option(name, id))

                        })

                    });

            });

        });
    </script>
@endsection
