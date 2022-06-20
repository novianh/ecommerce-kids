@extends('frontend.layouts.shopping.master')

@section('title', 'Categories')

@section('content')

   <div id="swup" class="transition-fade">
      <main>
         <section id="categories" class=" bg-light ">
            <div class="ornaments position-relative">
               <div class="ornament position-absolute">
                  <img src="{{ asset ('ecommerce/img/starorn.svg') }}" alt="" width="100px">
               </div>
               <div class="ornament2 position-absolute">
                  <img src="{{ asset ('ecommerce/img/starorn.svg') }}" alt="" width="100px">
               </div>
            </div>
            <div class="container py-5">
               <div class="row row-cols-1 justify-content-center align-items-center g-3">
                  <div class="col-9 col-md-6 col-lg-4 position-relative clients">
                     <a href="#">
                        <figure class="c4-izmir c4-image-zoom-in " style="height: 10rem; width: 100%; ">
                           <img class="img-fluid brand-img" src="{{ asset('ecommerce/img/cat-twin.jpg') }}" alt="Logo" width="100%">
                           <figcaption class="c4-layout-center-center">
                              <div class="c4-reveal-right ">
                                 <h3>Twin</h3>
                              </div>
                              <div class="c4-reveal-left c4-delay-200 " style="width: 100%;">
                                 <div class=" line"></div>
                              </div>
                           </figcaption>
                        </figure>
                     </a>
                  </div>
                  <div class="col-9 col-md-6 col-lg-4 position-relative clients">
                     <a href="#">
                        <figure class="c4-izmir c4-image-zoom-in " style="height: 10rem; width: 100%;">
                           <img class="img-fluid brand-img" src="{{ asset ('ecommerce/img/cat-girl.jpg') }}" alt="Logo" width="100%">
                           <figcaption class="c4-layout-center-center">
                              <div class="c4-reveal-right ">
                                 <h3>Girl</h3>
                              </div>
                              <div class="c4-reveal-left c4-delay-200 " style="width: 100%;">
                                 <div class=" line"></div>
                              </div>
                           </figcaption>
                        </figure>
                     </a>
                  </div>
                  <div class="col-9 col-md-6 col-lg-4 position-relative clients">
                     <a href="#">
                        <figure class="c4-izmir c4-image-zoom-in " style="height: 10rem; width: 100%;">
                           <img class="img-fluid brand-img" src="ecommerce/img/cat-boy.jpg" alt="Logo" width="100%">
                           <figcaption class="c4-layout-center-center">
                              <div class="c4-reveal-right ">
                                 <h3>Boy</h3>
                              </div>
                              <div class="c4-reveal-left c4-delay-200 " style="width: 100%;">
                                 <div class=" line"></div>
                              </div>
                           </figcaption>
                        </figure>
                     </a>
                  </div>
                  <div class="col-9 col-md-6 col-lg-4 position-relative clients">
                     <a href="#">
                        <figure class="c4-izmir c4-image-zoom-in " style="height: 10rem; width: 100%;">
                           <img class="img-fluid brand-img" src="{{ asset ('ecommerce/img/cat-toy.jpg') }}" alt="Logo" width="100%">
                           <figcaption class="c4-layout-center-center">
                              <div class="c4-reveal-right ">
                                 <h3>Toy</h3>
                              </div>
                              <div class="c4-reveal-left c4-delay-200 " style="width: 100%;">
                                 <div class=" line"></div>
                              </div>
                           </figcaption>
                        </figure>
                     </a>
                  </div>
               </div>
            </div>
         </section>
      </main>

   </div>


@endsection