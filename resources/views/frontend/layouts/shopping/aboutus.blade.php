@extends('frontend.layouts.shopping.master')

@section('style')
    <link rel="stylesheet" href="{{ asset('ecommerce/style/co.css') }}">
@endsection

@section('title', 'About Us')

@section('content')

    <main>
        <section id="aboutus" class=" ">
            <div class="bg-light py-5">
                <div class="container">
                    <div class="row row-cols-md-2 text-center justify-content-center gap-xl-3 gap-md-0 gap-lg-4 gap-3">
                        
                        @foreach ($icon as $item)
                        <div class="col-4 mt-3 col-md-2 wrappers">
                           <div class="wrapper rounded-circle text-center mb-3 ">
                              <img src="{{ asset('storage/about/' . $item->icon) ?? asset('ecommerce/img/whyus/bestprice.svg') }}"
                              alt="icon" width="100%" class="p-4 p-xl-5">
                           </div>
                           <small class="pt-5">{{ $item->subtitle ?? 'Best Price' }}</small>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="pb-5">
                <div class="ornaments position-relative">
                    <div class="ornament position-absolute">
                        <img src="{{ asset('ecommerce/img/starorn.svg') }}" alt="" width="100px">
                    </div>
                    <div class="ornament2 position-absolute">
                        <img src="{{ asset('ecommerce/img/starorn.svg') }}" alt="" width="100px">
                    </div>
                </div>
                <div class="row">
                    <div class="container">
                        <div class="col text-center py-5">
                            <h3>Our Story</h3>
                        </div>
                        <div class="col-md-12">
                            <div class="container">
                                <div class="main-timeline mb-5">
                                    @foreach ($story as $story)
                                        <div class="timeline">
                                            <a href="#" class="timeline-content">
                                                <div class="timeline-icon"><i class="fi fi-sr-ballot"></i></div>
                                                <div class="timeline-year">{{ $story->year ?? '' }}</div>
                                                <h3 class="title">{{ $story->title ?? 'Web Designing' }}</h3>
                                                <p class="description">
                                                    {{ $story->desc ??
                                                        'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer males uada tellus
                                                                                        lorem, et condimentum neque commodo Integer males uada tellus lorem, et condimentum
                                                                                        neque commodo' }}
                                                </p>
                                            </a>
                                        </div>
                                    @endforeach
                                    {{-- <div class="timeline">
                              <a href="#" class="timeline-content">
                                 <div class="timeline-icon">
                                 </div>
                                 <div class="timeline-year">2020</div>
                                 <h3 class="title">Web Development</h3>
                                 <p class="description">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer males uada tellus
                                    lorem, et condimentum neque commodo Integer males uada tellus lorem, et condimentum
                                    neque commodo
                                 </p>
                              </a>
                           </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </section>
    </main>
@endsection
