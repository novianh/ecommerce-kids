@extends('frontend.layouts.shopping.master')

@section('style')
    <link rel="stylesheet" href="{{ asset('ecommerce/style/co.css') }}">
@endsection

@section('title', 'Collection')

@section('content')

    <main>

        <section id="collection" class=" bg-light mb-5">
            <div class="ornaments position-relative">
                <div class="ornament position-absolute">
                    <img src="{{ asset ('ecommerce/img/starorn.svg') }}" alt="" width="100px">
                </div>
                <div class="ornament2 position-absolute">
                    <img src="{{ asset ('ecommerce/img/starorn.svg') }}" alt="" width="100px">
                </div>
            </div>
            <div class="container pb-5">
                
                <div class="row  justify-content-start align-items-center  py-5">
                    {{-- <div class="col">
                        <hr class="m-0">
                    </div>
                    <div class="col-xl-1 text-md-end text-center p-0">
                        <h5 class="m-0 opacity-50">Our Collection </h5>
                    </div>
                    <div class="col">
                        <hr class="m-0">
                    </div> --}}
                    <div class="row mt-3 justify-content-between justify-content-md-center mb-3">
                        @foreach ($product as $item)
                            
                        <div class="col-lg-3 col-6 col-md-4 mb-3">
                            <a href="{{ route('home.detail', $item) }}" class="link">
                                <div class="card border-0 bg-transparent rounded-5" style="height: 20rem">
                                    <img src="{{  url('storage/products/thumbnail/' . $item->img_thumbnail) ?? asset ('ecommerce/img/doll.png') }}" class="card-img-top p-5" width="100%" alt="...">
                                    <div class="">
                                        <p class="card-title text-center mt-4">{{ $item->name ?? ('Brown Bear Doll') }}</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endforeach
                        {{-- <div class="col-lg-3 col-6 col-md-4">
                            <a href="" class="link">
                                <div class="card border-0 bg-transparent rounded-5">
                                    <img src="img/doll.png" class="card-img-top" alt="...">
                                    <div class="">
                                        <p class="card-title text-center">Brown Bear Doll</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-6 col-md-4">
                            <a href="" class="link">
                                <div class="card border-0 bg-transparent rounded-5">
                                    <img src="img/doll.png" class="card-img-top" alt="...">
                                    <div class="">
                                        <p class="card-title text-center">Brown Bear Doll</p>
                                    </div>
                                </div>
                            </a>
                        </div> --}}
                    </div>
                </div>
                    
                {{-- <div class="row  justify-content-start align-items-center pt-5">
                    <div class="col-md-1 text-end p-0">
                        <h5 class="m-0 opacity-50">2021 </h5>
                    </div>
                    <div class="col-md-6">
                        <hr class="m-0">
                    </div>
                    <div class="row mt-3 justify-content-between justify-content-md-center">
                        <div class="col-lg-3 col-6 col-md-4">
                            <a href="" class="link">
                                <div class="card border-0 bg-transparent rounded-5">
                                    <img src="img/doll.png" class="card-img-top" alt="...">
                                    <div class="">
                                        <p class="card-title text-center">Brown Bear Doll</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-6 col-md-4">
                            <a href="" class="link">
                                <div class="card border-0 bg-transparent rounded-5">
                                    <img src="img/doll.png" class="card-img-top" alt="...">
                                    <div class="">
                                        <p class="card-title text-center">Brown Bear Doll</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-6 col-md-4">
                            <a href="" class="link">
                                <div class="card border-0 bg-transparent rounded-5">
                                    <img src="img/doll.png" class="card-img-top" alt="...">
                                    <div class="">
                                        <p class="card-title text-center">Brown Bear Doll</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div> --}}
            </div>
        </section>

    </main>
@endsection
