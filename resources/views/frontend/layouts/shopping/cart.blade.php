@extends('frontend.layouts.shopping.master')

@section('title', 'Cart')

@section('content')
    
   <main>

      <section id="cart" class=" bg-light">
         <div class="ornaments position-relative">
            <div class="ornament position-absolute">
               <img src="ecommerce/img/starorn.svg" alt="" width="100px">
            </div>
            <div class="ornament2 position-absolute">
               <img src="ecommerce/img/starorn.svg" alt="" width="100px">
            </div>
         </div>
         <div class="container py-5">
            <div class="bg-white p-5 rounded-5 position-relative" style="z-index: 10;">

               <ul class="responsive-table text-md-center mb-0 p-0" id="product" role="list" aria-live="assertive">
                  <li class="table-header table">
                     <div class="col col-1-row">Product</div>
                     <div class="col col-2-row">Price</div>
                     <div class="col col-3-row">Quantity</div>
                     <div class="col col-4-row">Subtotal</div>
                     <div class="col col-4-row">Remove</div>
                  </li>

                  <li class="table-row align-items-center  mb-0 remove-item">
                     <div class="col col-1-row" data-label="Product">
                        <div class="row justify-content-md-center gap-md-2 gap-0 align-items-center">
                           <div class="col-md-3">
                              <img src="https://via.placeholder.com/250x250/5fa9f8/ffffff" alt=""
                                 class="img-fluid d-none d-md-block rounded-4 my-3 shadow-sm ">
                           </div>
                           <div class="col-md-6 mt-sm-2 text-start text-lg-center">
                              Product Name
                           </div>
                        </div>
                     </div>
                     <div class="col col-2-row" data-label="Price">Rp.500k</div>
                     <div class="col col-3-row" data-label="Quantity">
                        <div class="row justify-content-center align-items-center">
                           <div class="col-md-10 col-xl-8">
                              <input type="number" class=" form-control rounded-5 text-center mx-auto mt-md-0" value="1"
                                 min="1" max="5" style="width: 100% ;">
                           </div>
                        </div>
                     </div>
                     <div class="col col-4-row" data-label="Subtotal">$350</div>
                     <div class="col col-4-row" data-label="Remove">
                        <a class="text-decoration-none text-center remove-item" style="cursor: pointer;" href="#">
                           <i class="fi fi-br-cross"></i>
                        </a>
                     </div>
                  </li>
                  
                  <li class="table-row align-items-center mb-0">
                     <div class="col col-1-row" data-label="Product">
                        <div class="row justify-content-md-center gap-md-2 gap-0 align-items-center">
                           <div class="col-md-3">
                              <img src="https://via.placeholder.com/250x250/5fa9f8/ffffff" alt=""
                                 class="img-fluid d-none d-md-block rounded-4 my-3 shadow-sm ">
                           </div>
                           <div class="col-md-6 mt-sm-2 text-start text-lg-center">
                              Product Name
                           </div>
                        </div>
                     </div>
                     <div class="col col-2-row" data-label="Price">Rp.500k</div>
                     <div class="col col-3-row" data-label="Quantity">
                        <div class="row justify-content-center align-items-center">
                           <div class="col-md-10 col-xl-8">
                              <input type="number" class=" form-control rounded-5 text-center mx-auto mt-md-0" value="1"
                                 min="1" max="5" style="width: 100% ;">
                           </div>
                        </div>
                     </div>
                     <div class="col col-4-row" data-label="Subtotal">$350</div>
                     <div class="col col-4-row" data-label="Remove">
                        <a class="text-decoration-none text-center remove-item" style="cursor: pointer;" href="#">
                           <i class="fi fi-br-cross"></i>
                        </a>
                     </div>
                  </li>

                  <li class=" align-items-center mb-0 mt-4">
                     <div class="col col-1-row d-none d-md-block"></div>
                     <div class="col col-2-row d-none d-md-block"></div>
                     <div class="col col-3-row  d-none d-md-block">
                        Total
                     </div>
                     <div class="col col-4-row" data-label="Total">Rp.500k</div>
                     <div class="col col-4-row"> <a href="co.html"
                           class="btn px-3 btn-sm rounded-5 text-white">Checkout</a></div>
                  </li>
               </ul>

            </div>
         </div>


      </section>
   </main>
   @endsection