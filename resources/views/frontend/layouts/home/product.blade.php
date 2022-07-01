<section id="products" class="bg-light">
    <div class="ornaments position-relative">
        <div class="ornament position-absolute">
            <img src="{{ asset ('ecommerce/img/starorn.svg') }}" alt="" width="100px">
        </div>
        <div class="ornament2 position-absolute">
            <img src="{{ asset ('ecommerce/img/starorn.svg') }}" alt="" width="100px">
        </div>
    </div>
    <div class="container py-5 text-center">
        <h2>Pro<span>ducts</span></h2>

        <form action="javascript:void(0)" method="post" id="formCategory">
            @csrf
            <input type="hidden" name="id" id="idd">
            <div class="row justify-content-center">
                <div class="col-6 ">
                    <select name="id" id="category" class="form-select rounded-5 text-capitalize"
                        aria-label="Default select example">
                        {{-- <option selected>Categories</option> --}}
                        @foreach ($categories as $ctg)
                            <option
                                value="{{ $ctg->id }} {{ old('id_category') == $ctg->id ? 'selected' : '' }}">
                                {{ $ctg->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </form>


        <div class="row justify-content-center">
            <div class="col-12 carousel-wrap mx-xl-0 text-start">
                <div class="my-5">
                    <div class="row justify-content-center" id="data">
                        @if (is_null($productCtgLast))
                            <h5 class="text-center" style="color:rgb(140 192 222)">Sorry! There are no products in this
                                category</h5>
                        @else
                            {{-- {{dd($productCtgLast)}} --}}
                            @foreach ($productCtgLast as $np)
                                <div class="owl-item mx-lg-auto mx-md-3 mt-3 mt-lg-0 col-xl-3 col-md-5 col-sm-6 col-12">
                                    <div class="card rounded-5 border-0 position-relative item ">
                                        <div class="row justify-content-center align-items-center">
                                            <div
                                                class="col-12 col-md-10 col-lg-12 d-flex justify-content-center align-items-center">
                                                <a href="{{ route('home.detail', $np) }}" class="link">
                                                    <img src="{{ url('storage/products/thumbnail/' . $np->img_thumbnail) ?? asset('ecommerce/img/doll.png') }}"
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
                                                            {{ $np->name ?? 'Bear Brown Doll' }}</h5>
                                                        <small class="ctr-sku">
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
                                                                    class="fi fi-sr-eye"></i>
                                                                More</a>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            @endforeach

                        @endif


                    </div>


                </div>
            </div>
            <div class="col text-center ">
                <small><a href="#" id="style-2" data-replace="Check it" class="link align-items-center">
                        <span> More
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="16" fill="currentColor"
                                class="bi bi-arrow-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" />
                            </svg>
                        </span>
                    </a></small>
            </div>
        </div>
    </div>
</section>
