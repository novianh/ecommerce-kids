@extends('frontend.layouts.shopping.master')

@section('style')
<link rel="stylesheet" href="{{ asset ('ecommerce/style/co.css') }}">
@endsection

@section('title', 'Order Details')
  

@section('content')
    
   <main>
      <section id="co" class=" bg-light">
         <div class="ornaments position-relative">
            <div class="ornament position-absolute">
               <img src="ecommerce/img/starorn.svg" alt="" width="100px">
            </div>
            <div class="ornament2 position-absolute">
               <img src="ecommerce/img/starorn.svg" alt="" width="100px">
            </div> 
         </div>
         <div class="container py-5">
            <div class="row g-3 g-md-5 position-relative justify-content-center " style="z-index: 10;">
               <div class="col-md-10 col-lg-8 order-md-last">
                  <div class="mb-3 card border-0 bg-white rounded-5">
                     <div class="card-header text-center rounded-5">
                        <h5 class="mb-0 fw-700 py-1">Your Order</h5>
                     </div>
                     <div class="card-body ">
                        <ul class="px-3 ">
                           <li class="d-flex justify-content-between mb-3">
                              <div class="">
                                 <h6 class="my-0">Product name</h6>
                                 <small class="text-muted" style="color: #676767; opacity: 50%;">1x</small>
                              </div>
                              <span class="text-muted">$12</span>
                           </li>

                           <!-- !total -->
                           <!-- <li class="d-flex justify-content-between mb-3">
                              <div class="">
                                 <h6 class="my-0 mb-3">Subtotal</h6>

                              </div>
                              <span class="text-muted">$12</span>
                           </li> -->

                           <li class=" total mb-3 d-flex justify-content-between">
                              <div class="">
                                 <h6 class="my-0 mb-3">Total</h6>
                              </div>
                              <span class="text-muted">$12</span>
                           </li>
                           <!-- !total -->


                           <hr class="rounded-5 my-0">
                           <hr class="my-1">

                           <li class=" mt-4 d-flex justify-content-between mb-2 border-bottom-0">
                              <div class="col-4">
                                 <h6 class="my-0 mb-3">Payment</h6>
                              </div>
                              <div class="col">
                                 <span class="text-muted fw-light">COD</span>
                              </div>
                           </li>

                           <li class="mb-3 mt-3 d-flex justify-content-between border-bottom-0">

                              <div class="col-4">
                                 <h6 class="my-0">Shipping Address</h6>
                              </div>
                              <div class="col">
                                 <span class="text-muted fw-light">Lorem ipsum, dolor sit amet consectetur adipisicing
                                    elit. Id consequatur rem minus aut voluptates, amet libero magnam, ipsam alias
                                    maxime quos nulla rerum sequi labore impedit, sint harum at aliquid!</span>
                              </div>

                           </li>
                           <li class="d-flex justify-content-between mb-3 pb-3">
                              <div class="col-4">
                                 <h6 class="my-0">Shipment</h6>
                              </div>
                              <div class="col">
                                 <span class="text-muted text-end fw-light">JNE (098458392)</span>
                              </div>

                           </li>
                           <li class="d-flex justify-content-between mb-3 pb-3">
                              <button class=" w-100 btn rounded-5" type="submit">Confirm</button>

                           </li>

                           {{-- <li class="status d-flex justify-content-between mb-3 pb-3 border-bottom-0">
                              <div class="">
                                 <h6 class="my-0">Status</h6>
                              </div>
                              <div class="">
                                 <span class="text-end ">Selesai</span>
                              </div>

                           </li> --}}

                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
   </main>
@endsection











