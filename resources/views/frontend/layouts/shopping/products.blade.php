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
                            <form action="{{ route('products.index') }}" method="get">
                                @csrf
                                <div
                                    class="p-1 bg-light rounded rounded-pill shadow-sm mb-md-4 mb-3 border search-input-wraperr">
                                    <div class="input-group">
                                        <input type="search" placeholder="What're you searching for?"
                                            class="form-control border-0 bg-light form-control rounded-5" name="search">
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
                                    <form action="{{ URL::current() }}" method="GET">

                                        <div class="col-12 text-capitalize mb-3">



                                            @isset($categoryAll)
                                                @foreach ($categoryAll as $item)
                                                    @php
                                                        $check = [];
                                                        if (isset($_GET['category_id'])) {
                                                            $check = $_GET['category_id'];
                                                        }
                                                    @endphp
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox"
                                                            value="{{ $item->id }}" id="flexCheckDefault{{ $item->id }}"
                                                            name="category_id[]"
                                                            {{ in_array($item->id, $check) ? ' checked' : '' }}>
                                                        <label class="form-check-label"
                                                            for="flexCheckDefault{{ $item->id }}">
                                                            {{ $item->name }}
                                                        </label>
                                                    </div>
                                                @endforeach
                                            @endisset
                                            @empty($categoryAll)
                                                <p class="text-start">Category is empty</p>
                                            @endempty


                                        </div>

                                        <div class="col-lg-12">
                                            <h5 class="fw-bold">Filter</h5>

                                            <div class="mb-3">
                                                <label for="range">Price Range</label>
                                                <input type="text" class="form-control js-range-slider" name="my_range"
                                                    value="" id="demo_0" />
                                                <div class="extra-controls">

                                                    <div class="result">
                                                        <input type="hidden" name="price_from" class="js-result-from">
                                                        <input type="hidden" name="price_to" class="js-result-to">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            @php
                                                $new = [];
                                                if (isset($_GET['new'])) {
                                                    $new = $_GET['new'];
                                                }
                                            @endphp
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="new"
                                                    id="flexCheckDefault" name="new" {{ $new ? ' checked' : '' }}>
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    New
                                                </label>
                                            </div>
                                        </div>
                                        {{-- <div class="col-lg-12">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="discount"
                                                    id="dsc" name="discount">
                                                <label class="form-check-label" for="dsc">
                                                    Discount
                                                </label>
                                            </div>
                                        </div> --}}
                                        <div class="col-6 mx-auto">
                                            <div class="row">

                                                <button type="submit"
                                                    class="btn btn-primary mt-3 rounded-5 btn-sm mb-3">Generate</button>
                                            </div>
                                        </div>
                                    </form>


                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-10 col-lg-8">
                        <div class="row my-3 justify-content-center gap-3 gap-xl-0 justify-content-lg-start">
                            @if (!empty($productFilter))
                                 @foreach ($productFilter as $prd)
                                    <div class="mt-4 col-9 col-sm-6 col-md-5 col-lg-5 col-xl-4">
                                        <div class="card rounded-5 border-0 position-relative item ">
                                            <div class="row justify-content-center align-items-center">
                                                <div
                                                    class="product col-12 col-md-10 col-lg-12 d-flex justify-content-center align-items-center">
                                                    <a href="{{ route('home.detail', $prd) }}" class="link">
                                                        <img src="{{ url('storage/products/thumbnail/' . $prd->img_thumbnail) ?? asset('ecommerce/img/doll.png') }}"
                                                            class=" card-img-top mx-auto p-5 m-5 my-3" alt="img product"
                                                            width="100%" />
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="card__overlay card-body text-center ">
                                                <div class="card__header">
                                                    <div class="row row-cols-1">
                                                        <div class="col">
                                                            <h5 class="card-title fw-bold mb-0">
                                                                {{ $prd->name ?? 'Bear Brown Doll' }}</h5>
                                                            <small class="ctr-sku">{{ $prd->category->name ?? 'Toy' }},
                                                                {{ $prd->sku ?? '4AUSCS' }}</small>
                                                        </div>
                                                        <div class="col">
                                                            <p class="harga">Rp. {{ number_format($prd->price,2) ?? '500K' }}</p>
                                                        </div>
                                                    </div>
                                                    

                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                @endforeach 
                            @endif
                        </div>
                        <nav aria-label="...">
                            <ul class="pagination justify-content-center pt-5 justify-content-lg-start">
                                @isset($productFilter)
                                    {{ $productFilter->links() }}
                                @endisset
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
        var $range = $(".js-range-slider"),
            $resultFromClass = $(".js-result-from"),
            $resultToClass = $(".js-result-to"),
            $getvalues = $(".js-get-values"),

            from = 0,
            to = 0;

        var saveResult = function(data) {
            from = data.from;
            to = data.to;
        };

        var writeResult = function() {
            var resultFrom = from;
            var resultTo = to;
            $resultFromClass.val(resultFrom);
            $resultToClass.val(resultTo);
        };
        console.log({!! $from !!});

        $("#demo_0").ionRangeSlider({
            type: "double",
            grid: false,
            min: 1,
            max: 5000000,
            // from: 20000,
            // to: 50000,
            skin: "round",
            prefix: "Rp.",
            step: 50,
            onStart: function(data) {
                saveResult(data);
                writeResult();
            },
            onChange: function(data) {
                saveResult(data);
                writeResult();
                
            },
            onFinish: function(data) {
                saveResult(data);
                writeResult();
                console.log(data.from);
            },
            onUpdate: function(data) {
                from = data.from;
                to = data.to;
            }
        });
    </script>
@endsection
