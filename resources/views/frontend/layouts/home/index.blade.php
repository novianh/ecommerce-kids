@extends('frontend.layouts.home.master')

@section('content')
    <div id="swup" class="transition-fade">
        <main>
            <section id="home" class="bg-light">
                <div class="container">
                    <div
                        class="d-flex row flex-row-reverse p-5 text-center position-relative justify-content-center justify-content-lg-between align-items-center">
                        <div class="col-12 col-lg-6">
                            <div class="row row-cols-1 img-hero ">
                                <div class="col star-1">
                                    <img src="{{ asset('ecommerce/img/star1.svg') }}" class="position-absolute"
                                        alt="" width="60rem">
                                </div>
                                <div class="col star-2">
                                    <img src="{{ asset('ecommerce/img/star2.svg') }}" class="position-absolute"
                                        alt="" width="70rem">
                                </div>
                                <div class="col">
                                    <img src="{{ asset('ecommerce/img/hero.jpg') }}" alt="hero" width="100%"
                                        class="rounded-5 shadow col-lg-12 col-12">
                                </div>
                            </div>
                        </div>
                        <div class="col-9 col-lg-5 col-xl-4 mx-lg-0  text-lg-start">
                            <h1 class="pt-5 position-relative" style="z-index: 11;"><span>The</span> Best <span>TOY</span>
                                Collection</h1>
                            <p class="my-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam consequat
                                fermentum
                                augue. </p>
                            <div class="d-grid d-block d-lg-flex">
                                <button type="button" class="btn rounded-5 px-lg-5 shadow-lg">Discover Now</button>
                            </div>
                        </div>

                    </div>
                </div>
            </section>
            <section id="categories" class="py-5">
                <div class="container">
                    <div class="row row-cols-1 justify-content-center align-items-center g-3">
                        @foreach ($category as $ctg)
                            <div class="col-9 col-md-6 col-lg-4 position-relative clients">
                                <a href="#">
                                    <figure class="c4-izmir c4-image-zoom-in " style="height: 10rem; width: 100%; ">

                                        <img class="img-fluid brand-img"
                                            src="{{ url('storage/category/' . $ctg->image) ?? asset('ecommerce/img/cat-twin.jpg') }}"
                                            alt="Logo" width="100%">
                                        <figcaption class="c4-layout-center-center">
                                            <div class="c4-reveal-right text-capitalize">
                                                <h3>{{ $ctg->name ?? 'Twin' }}</h3>
                                            </div>
                                            <div class="c4-reveal-left c4-delay-200 " style="width: 100%;">
                                                <div class=" line"></div>
                                            </div>
                                        </figcaption>
                                    </figure>
                                </a>
                            </div>
                        @endforeach
                        {{-- <div class="col-9 col-md-6 col-lg-4 position-relative clients">
                            <a href="#">
                                <figure class="c4-izmir c4-image-zoom-in " style="height: 10rem; width: 100%;">
                                    <img class="img-fluid brand-img" src="ecommerce/img/cat-girl.jpg" alt="Logo"
                                        width="100%">
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
                                    <img class="img-fluid brand-img" src="ecommerce/img/cat-boy.jpg" alt="Logo"
                                        width="100%">
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
                        </div> --}}
                        <div class="col-9 col-md-6 col-lg-12 position-relative clients">
                            <a href="#">
                                <figure class="c4-izmir c4-image-zoom-in " style="height: 10rem; width: 100%;">
                                    <img class="img-fluid brand-img"
                                        src="{{ url('storage/category/' . $categoryLast->image) ?? asset('ecommerce/img/cat-toy.jpg') }}"
                                        alt="Logo" width="100%">
                                    <figcaption class="c4-layout-center-center">
                                        <div class="c4-reveal-right ">
                                            <h3>{{ $categoryLast->name ?? 'Toy' }}</h3>
                                        </div>
                                        <div class="c4-reveal-left c4-delay-200 " style="width: 100%;">
                                            <div class=" line"></div>
                                        </div>
                                    </figcaption>
                                </figure>
                            </a>
                        </div>
                        <div class="col text-center">
                            <small><a href="#" class="link align-items-center" id="style-2" data-replace="Check it">
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
            </section>

            <section id="newArrival" class=" bg-light">
                <div class="ornaments position-relative">
                    <div class="ornament position-absolute">
                        <img src="{{ asset('ecommerce/img/starorn.svg') }}" alt="" width="100px">
                    </div>
                    <div class="ornament2 position-absolute">
                        <img src="{{ asset('ecommerce/img/starorn.svg') }}" alt="" width="100px">
                    </div>
                </div>
                <div class="container py-5">
                    <div class="row row-cols-1 justify-content-center g-3">
                        <div class="col-6 text-center">
                            <h2>New <span>Arrival</span></h2>
                            <p class="mt-3">Lorem ipsum dolor sit amet consectetur adipisicing elit</p>
                        </div>
                        <div class="col-8 carousel-wrap col-xl-10 mx-xl-0">
                            <div class=" owl-carousel owl-theme">
                                @foreach ($newPrd as $np)
                                    <div class="card rounded-5 border-0 position-relative item ">
                                        <div class="row justify-content-center align-items-center">
                                            <div
                                                class="col-12 col-md-10 col-lg-12 d-flex justify-content-center align-items-center">
                                                <a href="/user/try" class="link">
                                                    <img src="{{ url('storage/products/thumbnail/' . $np->img_thumbnail) ?? asset('ecommerce/img/doll.png') }}"
                                                        class=" card-img-top mx-auto p-5 m-5 my-3" alt="img product"
                                                        width="100%" />
                                                </a>
                                            </div>
                                        </div>
                                        <div class="card__overlay card-body text-center ">
                                            <div class="card__header">
                                                <div class="row row-cols-1" data-bs-toggle="collapse"
                                                    href="#collapseExample{{ $np->id }}" role="button"
                                                    aria-expanded="false" aria-controls="collapseExample">
                                                    <div class="col">
                                                        <h5 class="card-title fw-bold mb-0">
                                                            {{ $np->name ?? 'Bear Brown Doll' }}</h5>
                                                        <small class="ctr-sku">{{ $np->category->name ?? 'Toy' }},
                                                            {{ $np->sku ?? '4AUSCS' }}</small>
                                                    </div>
                                                    <div class="col">
                                                        <p class="harga">Rp. {{ $np->price ?? '500K' }}</p>
                                                    </div>
                                                </div>
                                                <div class="text-center pt-3 card__description collapse "
                                                    id="collapseExample{{ $np->id }}">

                                                    <div class="mx-2 row row-cols-1 gap-3 ">
                                                        <div class="col d-grid">
                                                            <a href="" class="btn-product"><i
                                                                    class="fi fi-sr-shopping-cart-add"></i>
                                                                Add</a>
                                                        </div>
                                                        <div class="col d-grid">
                                                            <a href="" class="btn-product"><i
                                                                    class="fi fi-sr-eye"></i> More</a>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                {{-- <div class="card rounded-5 border-0 position-relative item ">
                                    <div class="row ">
                                        <a href="#" class="link imgBx p-4 pb-0">
                                            <img src="{{ asset('ecommerce/img/doll.png') }}"
                                                class=" card-img-top mx-auto p-5 m-5 my-3" alt="img product"
                                                width="100%" />
                                        </a>
                                    </div>
                                    <div class="card__overlay card-body ">
                                        <div class="card__header">
                                            <div class="row row-cols-1" data-bs-toggle="collapse"
                                                href="#collapseExample1" role="button" aria-expanded="false"
                                                aria-controls="collapseExample1">
                                                <div class="col-7">
                                                    <h5 class="card-title fw-bold mb-0">Bear Brown Doll</h5>
                                                    <small class="ctr-sku">Toy, 4AUSCS</small>
                                                </div>
                                                <div class="col-5 text-end">
                                                    <p class="harga">Rp.500K</p>
                                                </div>
                                            </div>
                                            <div class="text-center pt-3 card__description collapse "
                                                id="collapseExample1">

                                                <div class="mx-2 row row-cols-1 gap-3 ">
                                                    <div class="col d-grid">
                                                        <a href="" class="btn-product"><i
                                                                class="fi fi-sr-shopping-cart-add"></i>
                                                            Add</a>
                                                    </div>
                                                    <div class="col d-grid">
                                                        <a href="" class="btn-product"><i
                                                                class="fi fi-sr-eye"></i> More</a>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="card rounded-5 border-0 position-relative item ">
                                    <div class="row ">
                                        <a href="#" class="link imgBx p-4 pb-0">
                                            <img src="{{ asset('ecommerce/img/doll.png') }}"
                                                class=" card-img-top mx-auto p-5 m-5 my-3" alt="img product"
                                                width="100%" />
                                        </a>
                                    </div>
                                    <div class="card__overlay card-body ">
                                        <div class="card__header">
                                            <div class="row row-cols-1" data-bs-toggle="collapse"
                                                href="#collapseExample3" role="button" aria-expanded="false"
                                                aria-controls="collapseExample3">
                                                <div class="col-7">
                                                    <h5 class="card-title fw-bold mb-0">Bear Brown Doll</h5>
                                                    <small class="ctr-sku">Toy, 4AUSCS</small>
                                                </div>
                                                <div class="col-5 text-end">
                                                    <p class="harga">Rp.500K</p>
                                                </div>
                                            </div>
                                            <div class="text-center pt-3 card__description collapse "
                                                id="collapseExample3">

                                                <div class="mx-2 row row-cols-1 gap-3 ">
                                                    <div class="col d-grid">
                                                        <a href="" class="btn-product"><i
                                                                class="fi fi-sr-shopping-cart-add"></i>
                                                            Add</a>
                                                    </div>
                                                    <div class="col d-grid">
                                                        <a href="" class="btn-product"><i
                                                                class="fi fi-sr-eye"></i> More</a>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="card rounded-5 border-0 position-relative item ">
                                    <div class="row ">
                                        <a href="#" class="link imgBx p-4 pb-0">
                                            <img src="{{ asset('ecommerce/img/doll.png') }}"
                                                class=" card-img-top mx-auto p-5 m-5 my-3" alt="img product"
                                                width="100%" />
                                        </a>
                                    </div>
                                    <div class="card__overlay card-body ">
                                        <div class="card__header">
                                            <div class="row row-cols-1" data-bs-toggle="collapse"
                                                href="#collapseExample4" role="button" aria-expanded="false"
                                                aria-controls="collapseExample4">
                                                <div class="col-7">
                                                    <h5 class="card-title fw-bold mb-0">Bear Brown Doll</h5>
                                                    <small class="ctr-sku">Toy, 4AUSCS</small>
                                                </div>
                                                <div class="col-5 text-end">
                                                    <p class="harga">Rp.500K</p>
                                                </div>
                                            </div>
                                            <div class="text-center pt-3 card__description collapse "
                                                id="collapseExample4">

                                                <div class="mx-2 row row-cols-1 gap-3 ">
                                                    <div class="col d-grid">
                                                        <a href="" class="btn-product"><i
                                                                class="fi fi-sr-shopping-cart-add"></i>
                                                            Add</a>
                                                    </div>
                                                    <div class="col d-grid">
                                                        <a href="" class="btn-product"><i
                                                                class="fi fi-sr-eye"></i> More</a>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                            <div class="col text-center">
                                <small><a href="#" class="link align-items-center" id="style-2"
                                        data-replace="Check it">
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
            </section>

            <section id="whatWeDo" class="py-5 px-2">
                <div class="container">
                    <div class="row gap-3 gap-md-0 align-items-center">
                        <div class="d-md-inline-flex d-none justify-content-center orn">
                            <img src="ecommerce/img/lampu.svg" alt="orn" width="40rem" class=" ">
                            <h2 class=" fw-700 text-center mb-4">What We <span>Do?</span></h2>
                        </div>
                        <div class="col-8 second col-md-5">
                            <p class="mb-0 d-block d-md-none">What We Do? </p>
                            <h2>We Make Your Kids <span>Happy</span></h2>
                            <p class="mb-0">Help you take care of the kids
                            </p>
                        </div>
                        <div class="col-12 col-md-7">
                            <div class="wwd-img rounded-5 bg-black">
                                <img src="ecommerce/img/wwd1.jpg" alt="img">
                            </div>
                        </div>
                        <div class="col-12 col-md-5 mt-md-4">
                            <div class="wwd-img img2" style="background-image: url('/ecommerce/img/wwd2.jpg');">
                            </div>
                        </div>
                        <div class="col-11 col-md-7 mt-md-4">
                            <div class="row ">
                                <div class="col-9">
                                    <h5>Help you take care of the kids
                                    </h5>
                                </div>
                            </div>
                            <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam consequat
                                fermentum
                                augue, eget
                                feugiat metus commodo sed. Suspendisse aliquet malesuada nisl rhoncus sagittis. </p>
                        </div>
                    </div>
                </div>
            </section>

            <section id="discount" class="py-lg-5 ">
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-12 col-md-7 col-xl-8 ">
                            <div class="img-box rounded-5 shadow-lg"
                                style="background-image: url('ecommerce/img/dc.jpg');">
                            </div>
                        </div>
                        <div class="col-12 col-md-5 col-xl-4 text-center mt-4 mt-md-0">
                            <div class="wrapper rounded-5 py-5">
                                <img src="ecommerce/img/rainbow.png" alt="ornament" class="mx-auto mb-3 col-4 col-md-5"
                                    width="100%">
                                <p class="text-uppercase mb-4"><br> SALE 50%</p>
                                <h1 class="text-capitalize mb-4">spring <br> <span>collection</span></h1>
                                <div class=" d-block">
                                    <button type="button" class="btn rounded-5 px-4 shadow-lg">Discover Now</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="py-5" id="whyUs">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-6 col-12 text-center">
                            <h2 class="mb-3">Why <span>Us?</span></h2>
                            <p class="opacity-75">Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi dicta
                                earum
                                repellendus porro
                                veniam aperiam. Dicta temporibus nihil.</p>
                        </div>
                    </div>
                    <div
                        class="row row-cols-md-2 mt-3 text-center justify-content-center gap-xl-5 gap-md-0 gap-lg-4 gap-3">
                        <div class="col-4 mt-3 col-md-2 wrappers">
                            <div class="wrapper rounded-circle text-center mb-3 ">
                                <img src="ecommerce/img/whyus/bestprice.svg" alt="icon" width="100%"
                                    class="p-4 p-xl-5">
                            </div>
                            <small class="pt-5">Best Price</small>
                        </div>
                        <div class="col-4 mt-3 col-md-2 wrappers">
                            <div class="wrapper rounded-circle text-center mb-3">
                                <img src="ecommerce/img/whyus/freedev.svg" alt="icon" width="100%"
                                    class="p-4 p-xl-5 ">
                            </div>
                            <small class="pt-5 ">Best Price</small>
                        </div>

                        <div class="w-100 d-block d-md-none"></div>

                        <div class="col-4 mt-3 col-md-2 wrappers">
                            <div class="wrapper rounded-circle text-center mb-3">
                                <img src="ecommerce/img/whyus/quality.svg" alt="icon" width="100%"
                                    class="p-4 p-xl-5 ">
                            </div>
                            <small class="pt-5">Best Price</small>
                        </div>
                        <div class="col-4 mt-4 mt-md-3 col-md-2 wrappers">
                            <div class="wrapper rounded-circle text-center mb-3">
                                <img src="ecommerce/img/whyus/bestprice.svg" alt="icon" width="100%"
                                    class="p-4 p-xl-5 ">
                            </div>
                            <small class="pt-5">Best Price</small>
                        </div>

                    </div>
                </div>
            </section>

            <section id="products" class="bg-light">
                <div class="ornaments position-relative">
                    <div class="ornament position-absolute">
                        <img src="ecommerce/img/starorn.svg" alt="" width="100px">
                    </div>
                    <div class="ornament2 position-absolute">
                        <img src="ecommerce/img/starorn.svg" alt="" width="100px">
                    </div>
                </div>
                <div class="container py-5 text-center">
                    <h2>Pro<span>ducts</span></h2>
                    <div class="row justify-content-center">
                        <div class="col-6">
                            <select class="form-select rounded-5" aria-label="Default select example">
                                <option selected>Categories</option>
                                <option value="1">One</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-8 carousel-wrap col-xl-10 mx-xl-0 text-start">
                            <div class=" owl-carousel owl-theme">
                                <div class="card rounded-5 border-0 position-relative item ">
                                    <div class="row ">
                                        <a href="#" class="link imgBx p-4 pb-0">
                                            <img src="{{ asset('ecommerce/img/doll.png') }}"
                                                class=" card-img-top mx-auto p-5 m-5 my-3" alt="img product"
                                                width="100%" />
                                        </a>
                                    </div>
                                    <div class="card__overlay card-body ">
                                        <div class="card__header">
                                            <div class="row row-cols-1" data-bs-toggle="collapse" href="#collapseExample"
                                                role="button" aria-expanded="false" aria-controls="collapseExample">
                                                <div class="col-7">
                                                    <h5 class="card-title fw-bold mb-0">Bear Brown Doll</h5>
                                                    <small class="ctr-sku">Toy, 4AUSCS</small>
                                                </div>
                                                <div class="col-5 text-end">
                                                    <p class="harga">Rp.500K</p>
                                                </div>
                                            </div>
                                            <div class="text-center pt-3 card__description collapse "
                                                id="collapseExample">

                                                <div class="mx-2 row row-cols-1 gap-3 ">
                                                    <div class="col d-grid">
                                                        <a href="" class="btn-product"><i
                                                                class="fi fi-sr-shopping-cart-add"></i>
                                                            Add</a>
                                                    </div>
                                                    <div class="col d-grid">
                                                        <a href="" class="btn-product"><i
                                                                class="fi fi-sr-eye"></i> More</a>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="card rounded-5 border-0 position-relative item ">
                                    <div class="row ">
                                        <a href="#" class="link imgBx p-4 pb-0">
                                            <img src="{{ asset('ecommerce/img/doll.png') }}"
                                                class=" card-img-top mx-auto p-5 m-5 my-3" alt="img product"
                                                width="100%" />
                                        </a>
                                    </div>
                                    <div class="card__overlay card-body ">
                                        <div class="card__header">
                                            <div class="row row-cols-1" data-bs-toggle="collapse"
                                                href="#collapseExample1" role="button" aria-expanded="false"
                                                aria-controls="collapseExample1">
                                                <div class="col-7">
                                                    <h5 class="card-title fw-bold mb-0">Bear Brown Doll</h5>
                                                    <small class="ctr-sku">Toy, 4AUSCS</small>
                                                </div>
                                                <div class="col-5 text-end">
                                                    <p class="harga">Rp.500K</p>
                                                </div>
                                            </div>
                                            <div class="text-center pt-3 card__description collapse "
                                                id="collapseExample1">

                                                <div class="mx-2 row row-cols-1 gap-3 ">
                                                    <div class="col d-grid">
                                                        <a href="" class="btn-product"><i
                                                                class="fi fi-sr-shopping-cart-add"></i>
                                                            Add</a>
                                                    </div>
                                                    <div class="col d-grid">
                                                        <a href="" class="btn-product"><i
                                                                class="fi fi-sr-eye"></i> More</a>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="card rounded-5 border-0 position-relative item ">
                                    <div class="row ">
                                        <a href="#" class="link imgBx p-4 pb-0">
                                            <img src="{{ asset('ecommerce/img/doll.png') }}"
                                                class=" card-img-top mx-auto p-5 m-5 my-3" alt="img product"
                                                width="100%" />
                                        </a>
                                    </div>
                                    <div class="card__overlay card-body ">
                                        <div class="card__header">
                                            <div class="row row-cols-1" data-bs-toggle="collapse"
                                                href="#collapseExample3" role="button" aria-expanded="false"
                                                aria-controls="collapseExample3">
                                                <div class="col-7">
                                                    <h5 class="card-title fw-bold mb-0">Bear Brown Doll</h5>
                                                    <small class="ctr-sku">Toy, 4AUSCS</small>
                                                </div>
                                                <div class="col-5 text-end">
                                                    <p class="harga">Rp.500K</p>
                                                </div>
                                            </div>
                                            <div class="text-center pt-3 card__description collapse "
                                                id="collapseExample3">

                                                <div class="mx-2 row row-cols-1 gap-3 ">
                                                    <div class="col d-grid">
                                                        <a href="" class="btn-product"><i
                                                                class="fi fi-sr-shopping-cart-add"></i>
                                                            Add</a>
                                                    </div>
                                                    <div class="col d-grid">
                                                        <a href="" class="btn-product"><i
                                                                class="fi fi-sr-eye"></i> More</a>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="card rounded-5 border-0 position-relative item ">
                                    <div class="row ">
                                        <a href="#" class="link imgBx p-4 pb-0">
                                            <img src="ecommerce/img/doll.png" class=" card-img-top mx-auto p-5 m-5 my-3"
                                                alt="img product" width="100%" />
                                        </a>
                                    </div>
                                    <div class="card__overlay card-body ">
                                        <div class="card__header">
                                            <div class="row row-cols-1" data-bs-toggle="collapse"
                                                href="#collapseExample4" role="button" aria-expanded="false"
                                                aria-controls="collapseExample4">
                                                <div class="col-7">
                                                    <h5 class="card-title fw-bold mb-0">Bear Brown Doll</h5>
                                                    <small class="ctr-sku">Toy, 4AUSCS</small>
                                                </div>
                                                <div class="col-5 text-end">
                                                    <p class="harga">Rp.500K</p>
                                                </div>
                                            </div>
                                            <div class="text-center pt-3 card__description collapse "
                                                id="collapseExample4">

                                                <div class="mx-2 row row-cols-1 gap-3 ">
                                                    <div class="col d-grid">
                                                        <a href="" class="btn-product"><i
                                                                class="fi fi-sr-shopping-cart-add"></i>
                                                            Add</a>
                                                    </div>
                                                    <div class="col d-grid">
                                                        <a href="" class="btn-product"><i
                                                                class="fi fi-sr-eye"></i> More</a>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col text-center">
                                <small><a href="#" id="style-2" data-replace="Check it"
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
            </section>
            <section id="getintouch" class="py-5">
                <h2 class="text-center mb-4">Get in <span>Touch</span></h2>
                @include('frontend.layouts.home.contact')
            </section>
        </main>

    </div>
@endsection
