@extends('frontend.layouts.shopping.master')


@section('style')
<!-- slider range -->
<!--Plugin CSS file with desired skin-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.1/css/ion.rangeSlider.min.css" />
@endsection

@section('title', 'Products')

@section('content')
    <main>
        <section id="productsPage" class=" bg-light mb-5">
            <div class="ornaments position-relative">
                <div class="ornament position-absolute">
                    <img src="{{ asset('ecommerce/img/starorn.svg') }}" alt="" width="100px">
                </div>
                <div class="ornament2 position-absolute">
                    <img src="{{ asset('ecommerce/img/starorn.svg') }}" alt="" width="100px">
                </div>
            </div>
            <div class="container py-5">
                <div class="row row-cols-1 justify-content-center">
                    <div class="col-8">
                        <div class="wrapper">
                            <form action="">
                                <div
                                    class="p-1 bg-light rounded rounded-pill shadow-sm mb-md-4 mb-3 border search-input-wraperr">
                                    <div class="input-group">
                                        <input type="search" placeholder="What're you searching for?"
                                            class="form-control border-0 bg-light form-control rounded-5">
                                        <button type="submit" class="btn-search mt-1 me-1"><i
                                                class="fi fi-br-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-9 col-lg-3 col-xl-3 my-3 me-lg-0">
                        <div class="rounded-5 px-lg-4 py-lg-5 p-3  categories mt-0 mt-md-0 navbar-expand-lg ">
                            <a class=" btn rounded-5 d-block d-lg-none" data-bs-toggle="collapse" href="#collapseExample"
                                role="button" aria-expanded="false" aria-controls="collapseExample">
                                <h5 class="fw-bold">Product Categories</h5>
                            </a>
                            <p class="dont-collapse-sm d-none d-lg-block">
                            <h5 class="fw-bold d-none d-lg-block">Product Categories</h5>
                            </p>
                            <div class="collapse dont-collapse-sm" id="collapseExample">
                                <div class="row justify-content-lg-start justify-content-center categories-products">
                                    <div class="col-12">

                                        <ul style="line-height:180%" class="ms-0 ">
                                            <li>
                                                <a href="#" class=" ">Twin</a>
                                            </li>
                                            <li>
                                                <a href="#@" class="">Boy</a>
                                            </li>
                                            <li>
                                                <a href="#@" class="">Girl</a>
                                            </li>
                                            <li>
                                                <a href="#@" class="">Toy</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-12">

                                        <div class="mb-3">
                                            <label for="range">Price Range</label>
                                            <input type="text" class="form-control js-range-slider" name="my_range"
                                                value="" id="demo_0" />
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                New
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="flexCheckDefault1">
                                            <label class="form-check-label" for="flexCheckDefault1">
                                                Discount
                                            </label>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-10 col-lg-8">
                        <div class="row my-3 justify-content-center gap-3 gap-xl-0 justify-content-lg-start">
                            <div class="col-9 col-sm-6 col-md-5 col-lg-5 col-xl-4">
                                <div class="card rounded-5 border-0 position-relative ">
                                    <div class="row ">
                                        <a href="#" class="link imgBx p-4 pb-0" style="height: 17.5rem;">
                                            <img src="ecommerce/img/doll.png" class=" card-img-top mx-auto p-5 m-5 my-3"
                                                alt="img product" width="100%" />
                                        </a>
                                    </div>
                                    <div class="card__overlay card-body text-center">
                                        <div class="card__header">
                                            <div class="row row-cols-1" data-bs-toggle="collapse" href="#collapseExample2"
                                                role="button" aria-expanded="false" aria-controls="collapseExample2">
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
                                            <div class="text-center pt-3 card__description collapse "
                                                id="collapseExample2">

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
                            <div class="col-9 col-sm-6 col-md-5 col-lg-5 col-xl-4">
                                <div class="card rounded-5 border-0 position-relative ">
                                    <div class="row ">
                                        <a href="#" class="link imgBx p-4 pb-0" style="height: 17.5rem;">
                                            <img src="ecommerce/img/doll.png" class=" card-img-top mx-auto p-5 m-5 my-3"
                                                alt="img product" width="100%" />
                                        </a>
                                    </div>
                                    <div class="card__overlay card-body text-center">
                                        <div class="card__header">
                                            <div class="row row-cols-1" data-bs-toggle="collapse"
                                                href="#collapseExample3" role="button" aria-expanded="false"
                                                aria-controls="collapseExample3">
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
                            </div>

                        </div>
                        <nav aria-label="...">
                            <ul class="pagination justify-content-center pt-5 justify-content-lg-start">
                                <li class="page-item disabled">
                                    <span class="page-link">Previous</span>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#">Next</a>
                                </li>
                            </ul>
                        </nav>
                    </div>


                </div>
            </div>
        </section>
    </main>
@endsection















@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.1/js/ion.rangeSlider.min.js"></script>
    <script>
        $("#demo_0").ionRangeSlider({
            type: "double",
            grid: false,
            min: 0,
            max: 100000,
            from: 20000,
            to: 50000,
            skin: "round",
            prefix: "Rp."
        });
    </script>
@endsection
