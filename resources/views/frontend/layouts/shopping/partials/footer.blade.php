<footer>
   <section id="footer">
      <div class=" ">
         <div class="wrapper pt-5 text-light">
            <div class="container">
               <div class="row">
                  <div class="col-12 col-md-12 col-lg-9 pb-5">
                     <div class="row justify-content-center justify-content-lg-start mb-5">
                        <div class="col-12 col-lg-6 title text-center text-lg-start">
                           <h2>{!! $footer->title ?? 'Get Easy <span>With Us</span>'!!}</h2>
                        </div>
                        <div class="col-6 col-md-3 col-lg-3">
                           <img src="{{ asset ('ecommerce/img/cloud-footer.svg') }}" alt="cloud">
                        </div>
                     </div>
                     <div class="row pt-3 justify-content-sm-center gap-xl-3">
                        <div class="col-md-3 col-sm-4 col-7 col-lg-4">
                           <p>Address</p>
                           <p class="desc">{{ $footer->address ?? '' }}</p>
                        </div>
                        <div class="col-md-3 col-sm-4 col-7 col-lg-4">
                           <p>Say Hello</p>
                           <p class="desc">{{ $footer->telephone ?? '' }}</p>
                        </div>
                        <div class="col-md-2 col-sm-4 col-7 col-lg-4 col-xl-3">
                           <p>Socials</p>
                           <ul class="desc text-decoration-none list-unstyled" style="line-height:180%">
                              @foreach ($social as $item)
                                  
                              <a target="_blank" href="//{{ $item->url }}" class="text-decoration-none text-light text-capitalize">
                                 <li class="list-unstyled">{!! $item->icon ?? '<i class="fi fi-brands-facebook">' !!} {{ $item->name }}</li>
                              </a>
                              @endforeach
                              {{-- <a href="#" class="text-decoration-none text-light">
                                 <li> <span class=""><i class="fi fi-brands-facebook"></i></span> Facebook</li>
                              </a>
                              <a href="#" class="text-decoration-none text-light">
                                 <li><i class="fi-brands-linkedin"></i> Facebook</li>
                              </a> --}}
                           </ul>
                        </div>
                        <div class="col-md-4 col-5 col-lg-3 d-block d-sm-none">
                           <img src="{{ asset ('ecommerce/img/gajah.png') }}" alt="elepath" width="100%">
                        </div>
                     </div>
                  </div>
                  <div class="col-md-3 col-3 d-none d-lg-block">
                     <img src="{{ asset ('ecommerce/img/gajah.png') }}" alt="elepath" width="100%">
                  </div>
               </div>
            </div>

         </div>
      </div>
   </section>
</footer>