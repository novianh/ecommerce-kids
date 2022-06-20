@extends('frontend.layouts.shopping.master')

@section('style')
<link rel="stylesheet" href="{{ asset ('style/co.css') }}">
@endsection

@section('title', 'Register')

@section('content')
   <main>

      <section id="co" class=" bg-light">
         <div class="container py-5">
            <div class="row justify-content-center position-relative" style="z-index: 10;">
               <div class="col-lg-8 col-md-7 text-center">
                  <p class="px-3">Have account?</p>
                  <a class="btn rounded-5 px-5"> Login</a>
                  {{-- <span class="px-3">/</span>
                  <a class=" btn btn-secondary rounded-5 px-5">Register</a> --}}
                  <hr class="my-4">
               </div>
               <div class="col-md-7 col-lg-8 ">
                  <h5>Register</h5>
                  <form class="needs-validation" novalidate>
                     <div class="row g-3">
                        <div class="col-sm-12">
                           <label for="Username" class="form-label">Username</label>
                           <input type="text" class="form-control" id="firstName" placeholder="" value="" required>
                           <div class="invalid-feedback">
                              Valid first name is required.
                           </div>
                        </div>
                        <div class="col-sm-12">
                           <label for="Username" class="form-label">Email</label>
                           <input type="email" class="form-control" id="firstName" placeholder="" value="" required>
                           <div class="invalid-feedback">
                              Valid first name is required.
                           </div>
                        </div>
                        <div class="col-sm-12">
                           <label for="Username" class="form-label">Password</label>
                           <input type="password" class="form-control" id="firstName" placeholder="" value="" required>
                           <div class="invalid-feedback">
                              Valid first name is required.
                           </div>
                        </div>
                     </div>
                  </form>
                  <hr class="my-4">
               </div>
               <div class="col-md-7 col-lg-8">
                  <h5 class="mb-3 fw-700">Add Address</h5>
                  <form class="needs-validation" novalidate>
                     <div class="row g-3">
                        <div class="col-sm-6">
                           <label for="firstName" class="form-label">First name</label>
                           <input type="text" class="form-control" id="firstName" placeholder="" value="" required>
                           <div class="invalid-feedback">
                              Valid first name is required.
                           </div>
                        </div>

                        <div class="col-sm-6">
                           <label for="lastName" class="form-label">Last name</label>
                           <input type="text" class="form-control" id="lastName" placeholder="" value="" required>
                           <div class="invalid-feedback">
                              Valid last name is required.
                           </div>
                        </div>

                        <div class="col-12">
                           <label for="email" class="form-label">Email <span
                                 class="text-muted">(Optional)</span></label>
                           <input type="email" class="form-control" id="email" placeholder="you@example.com">
                           <div class="invalid-feedback">
                              Please enter a valid email address for shipping updates.
                           </div>
                        </div>
                        <div class="col-12">
                           <label for="telephon" class="form-label">Telephone</label>
                           <input type="tel" class="form-control" id="telephon" placeholder="089898******">
                           <div class="invalid-feedback">
                              Please enter a valid email address for shipping updates.
                           </div>
                        </div>

                        <div class="col-12">
                           <label for="address" class="form-label">Address</label>
                           <input type="text" class="form-control" id="address" placeholder="1234 Main St" required>
                           <div class="invalid-feedback">
                              Please enter your shipping address.
                           </div>
                        </div>

                        <div class="col-12">
                           <label for="address2" class="form-label">Address 2 <span
                                 class="text-muted">(Optional)</span></label>
                           <input type="text" class="form-control" id="address2" placeholder="Apartment or suite">
                        </div>

                        <div class="col-md-5">
                           <label for="country" class="form-label">Country</label>
                           <select class="form-select rounded-5" id="country" required>
                              <option value="">Choose...</option>
                              <option>United States</option>
                           </select>
                           <div class="invalid-feedback">
                              Please select a valid country.
                           </div>
                        </div>

                        <div class="col-md-4">
                           <label for="state" class="form-label">State</label>
                           <select class="form-select rounded-5" id="state" required>
                              <option value="">Choose...</option>
                              <option>California</option>
                           </select>
                           <div class="invalid-feedback">
                              Please provide a valid state.
                           </div>
                        </div>

                        <div class="col-md-3">
                           <label for="zip" class="form-label">Zip</label>
                           <input type="text" class="form-control" id="zip" placeholder="" required>
                           <div class="invalid-feedback">
                              Zip code required.
                           </div>
                        </div>
                     </div>

                     <hr class="my-4">

                     <!-- <h5 class="mb-3">Payment</h5> -->


                     <button class="w-100 btn rounded-5" type="submit">Continue to checkout</button>
                  </form>

               </div>
            </div>
         </div>
      
      </section>
   </main>

         @endsection