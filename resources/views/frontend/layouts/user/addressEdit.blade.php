@extends('frontend.layouts.shopping.master')

@section('style')
    <link rel="stylesheet" href="{{ asset('ecommerce/style/co.css') }}">
    <link rel="stylesheet" href="{{ asset('ecommerce/node_modules/dropify/dist/css/dropify.min.css') }}">
    <style>
        .dropify-wrapper {
            border-radius: 2rem;
        }

        .file-icon p {
            font-family: 'Baloo Bhaijaan 2', cursive;
            font-size: 1.5rem;
        }

        span.file-icon::before {
            margin-bottom: 1rem;
        }

        ul {
            list-style: none outside none;
            padding-left: 0;
            margin: 0;
        }

        .content-slider li {
            background-color: #ed3020;
            text-align: center;
            color: #FFF;
        }

        .content-slider h3 {
            margin: 0;
            padding: 70px 0;
        }

        .ajs-message {
            background-color: rgb(140 192 222);
            color: #FFF;
        }

        .ajs-message.ajs-visible {
            border-radius: 2rem;
            text-align: center
        }
    </style>
@endsection

@section('title', 'Edit Address')

@section('content')
    <main>
        <section id="co" class=" ">
            <div class="bg-light mb-5 py-5">
               <div class="row justify-content-center">
                  <div class="col-lg-6 col-12">
                     <div class="card border-0 rounded-5">
                        <div class="card-header text-center rounded-5">
                           <h5 class="mb-0 fw-700 py-1">Your Address</h5>
                       </div>
                         <div class="card-body" style="background: #FFF">
                          
                             <form class="needs-validation form" novalidate action="{{ route('address.update', $address->id) }}"
                                 method="POST">
                                 @csrf
                                 @method('PUT')
     
                                 <div class="row g-3">
                                     <div class="col-12">
                                         <label for="email" class="form-label">Address Name</label>
                                         <input type="text" class="form-control" id="email" placeholder="Home"
                                             name="name" value="{{ $address->name }}">
                                         <div class="invalid-feedback">
                                             Please enter a valid email address for shipping updates.
                                         </div>
                                     </div>
                                     <div class="col-12">
                                         <label for="telephon" class="form-label">Telephone</label>
                                         <input type="tel" class="form-control" id="telephon" placeholder="089898******"
                                             name="telephone" value="{{ $address->telephone }}">
                                         <div class="invalid-feedback">
                                             Please enter a valid email address for shipping updates.
                                         </div>
                                     </div>
     
                                     <div class="col-12">
                                         <label for="address" class="form-label">Address</label>
                                         <input type="text" class="form-control" id="address" placeholder="1234 Main St"
                                             required name="address" value="{{ $address->address }}">
                                         <div class="invalid-feedback">
                                             Please enter your shipping address.
                                         </div>
                                     </div>
     
                                     <div class="col-12">
                                         <label for="address2" class="form-label">Address 2 <span
                                                 class="text-muted">(Optional)</span></label>
                                         <input type="text" class="form-control" id="address2"
                                             placeholder="Apartment or suite" name="address2" value="{{ $address->address2 }}">
                                     </div>
     
                                     <div class="col-md-5">
                                         <label for="country" class="form-label">Province</label>
                                         <select class="form-select rounded-5" id="provinsi" required name="country">
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
     
                                     <div class="col-md-4">
                                         <label for="state" class="form-label">City</label>
                                         <select class="form-select rounded-5" id="kota" required name="state">
                                             <option value="">Choose...</option>
                                             @foreach ($city as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ $item->id == $address->state ? 'selected' : '' }}>
                                                    {{ $item->name }}</option>
                                            @endforeach
                                         </select>
                                         <div class="invalid-feedback">
                                             Please provide a valid state.
                                         </div>
                                     </div>
     
                                     <div class="col-md-3">
                                         <label for="zip" class="form-label">Zip</label>
                                         <input type="text" class="form-control" id="zip" placeholder="" required
                                             name="zip" value="{{ $address->zip }}">
                                         <div class="invalid-feedback">
                                             Zip code required.
                                         </div>
                                     </div>
                                 </div>
     
     
     
                                 <!-- <h5 class="mb-3">Payment</h5> -->
                                 <div class="modal-footer">

                                    <button type="reset" class="btn btn-secondary rounded-5 px-3 btn-update mt-3 me-3">Reset </button>
                                    <button type="sumbit" class="btn rounded-5 px-3 btn-update mt-3">Update </button>
                                 </div>
                                 
                             </form>
                         </div>
                     </div>

                  </div>
               </div>
            </div>
        </section>
    </main>
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