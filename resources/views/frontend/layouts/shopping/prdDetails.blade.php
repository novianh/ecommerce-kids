@extends('frontend.layouts.shopping.master')

@section('style')

    <style>
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
    </style>
    <link rel="stylesheet" href="{{ asset('ecommerce/src/css/lightslider.css') }}" />
@endsection

@section('title', 'Details')



@section('content')

    <main>
        <section id="productsDetailsPage" class=" ">
            <div class="bg-light mb-5">
                <div class="ornaments position-relative">
                    <div class="ornament position-absolute">
                        <img src="{{ url('ecommerce/img/starorn.svg') }}" alt="" width="100px">
                    </div>
                    <div class="ornament2 position-absolute">
                        <img src="{{ url('ecommerce/img/starorn.svg') }}" alt="" width="100px">
                    </div>
                </div>
                <div class="container py-5">
                    <div class="row justify-content-center">
                        <div class="item col-10 col-sm-9 col-md-6 col-lg-3 ">
                            <div class="clearfix" style="width:100%;">
                                <ul id="image-gallery" class="gallery list-unstyled cS-hidden">
                                    @foreach ($image as $image)
                                        <li
                                            data-thumb="{{ url('storage/products/' . $image->image) ?? asset('ecommerce/img/yellow-dress.png') }}">
                                            <div class="item rounded-4 bg-white">
                                                <div class=" ">
                                                    <img src="{{ url('storage/products/' . $image->image) ?? 'image not found' }}"
                                                        alt="prd" width="100%" class="p-md-4 p-2">
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <div class="col-10 col-sm-9 col-md-6 mt-3 mt-md-0">
                            <div class="row wrapper px-4 py-5 rounded-5 align-items-center">
                                <div class="">
                                    <div class="col-12">
                                        <p class="card-title title-prd text-capitalize">
                                            {{ $product->name ?? 'Bear Brown Doll' }}</p>
                                        <small class="ctr-sku">{{ $category->name ?? 'Toy' }},
                                            {{ $product->sku ?? 'AUDC123' }}</small>
                                    </div>
                                    <div class="col-12 mt-3">
                                        <p class=""> Price: <span class="harga">
                                                Rp.{{ $product->price ?? '500k' }}</span></p>
                                    </div>
                                    <div class="col-12 mt-3">
                                        <p>Stock: <span class="desc mb-3"> {{ $product->quantity ?? '12' }}</span></p>
                                        <div class="mt-3">
                                            <span class=" mt-3">Size: </span>
                                            @foreach ($entity as $entiti)
                                                <span class="desc text-uppercase">
                                                    {{ $entiti->size ?? 'All Size' }}</span>
                                            @endforeach
                                        </div>
                                        <div class="mt-3">
                                            <span class=" mt-3">Color:</span>
                                            @foreach ($entity as $entity)
                                                <span class="desc text-capitalize">{{ $entity->color }}</span>
                                            @endforeach

                                        </div>



                                    </div>
                                    <div class="col-12 mt-3">
                                        <form action="">
                                            <div class="row ">
                                                <div class="col-sm-6 col-12">
                                                    <input type="number" placeholder="input your order" min="0"
                                                        max="{{ $product->quantity ?? '10' }}"
                                                        class="form-control rounded-5">
                                                    {{-- <select class="form-select rounded-5"
                                                        aria-label="Default select example">
                                                        <option value="1" selected>1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                    </select> --}}
                                                </div>
                                                <div class="col d-grid mt-md-0 mt-1 mt-sm-0">
                                                    <button type="submit" class=" btn btn-product"><i
                                                            class="fi fi-sr-shopping-cart-add"></i>
                                                        Add</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-10 col-sm-9 col-md-12 col-lg-9 mt-5">
                            <h3>Description</h3>
                            <p class="desc">
                                {{ $product->desc ??
                                    'Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis
                                                                                                minus
                                                                                                deleniti voluptate minima laboriosam, vero dolorum impedit explicabo ducimus ad maxime
                                                                                                velit
                                                                                                mollitia! Provident quas rem esse hic, commodi sint.' }}
                            </p>

                        </div>
                    </div>
                </div>
            </div>

            <div class="row pb-5 justify-content-center">
                <div class="col-10 col-sm-9 col-md-12 col-lg-9">
                    <h3>Related Products
                    </h3>
                    <div class="row">
                        <div class="col-8 carousel-wrap col-xl-10 mx-xl-0 text-start">
                            <div class=" owl-carousel owl-theme">
                                <div class="card rounded-5 border-0 position-relative item ">
                                    <div class="row ">
                                        <a href="#" class="link imgBx p-4 pb-0" style="height:  17.5rem;">
                                            <img src="ecommerce/img/doll.png" class=" card-img-top mx-auto p-5 m-5 my-3"
                                                alt="img product" width="100%" />
                                        </a>
                                    </div>
                                    <div class="card__overlay card-body text-center">
                                        <div class="card__header">
                                            <div class="row row-cols-1" data-bs-toggle="collapse" href="#collapseExample"
                                                role="button" aria-expanded="false" aria-controls="collapseExample">
                                                <div class="col">
                                                    <h5 class="card-title fw-bold mb-0">Bear Brown Doll</h5>
                                                    <small class="ctr-sku">Toy, 4AUSCS</small>
                                                </div>
                                                <div class="col">
                                                    <small class="harga text-decoration-line-through"
                                                        style="font-weight: 600 !important; font-size: 12px !important;">Rp.500.000</small>
                                                    <span class="harga">Rp.500.000</span>
                                                </div>
                                            </div>
                                            <div class="text-center pt-3 card__description collapse " id="collapseExample">

                                                <div class="mx-2 row row-cols-1 gap-3 ">
                                                    <div class="col d-grid">
                                                        <a href="" class="btn-product"><i
                                                                class="fi fi-sr-shopping-cart-add"></i>
                                                            Add</a>
                                                    </div>
                                                    <div class="col d-grid">
                                                        <a href="" class="btn-product"><i class="fi fi-sr-eye"></i>
                                                            More</a>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col text-center">
                                <small><a href="products.html" id="style-2" data-replace="Check it"
                                        class="link align-items-center">
                                        <span> More
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="16"
                                                fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd"
                                                    d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" />
                                            </svg>
                                        </span>
                                    </a></small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

@endsection







@section('js')
    <script src="{{ asset('ecommerce/src/js/lightslider.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#image-gallery').lightSlider({
                gallery: true,
                item: 1,
                thumbItem: 3,
                slideMargin: 0,
                auto: false,
                loop: false,
                onSliderLoad: function() {
                    $('#image-gallery').removeClass('cS-hidden');
                }
            });
        });
    </script>
@endsection
