@extends('frontend.layouts.shopping.master')

@section('style')
    <link rel="stylesheet" href="{{ asset('ecommerce/style/co.css') }}">
    <link rel="stylesheet" href="{{ asset('ecommerce/node_modules/dropify/dist/css/dropify.min.css') }}">
    <style>
        .btn.active {
            background: #8CC0DE !important;
        }
    </style>
@endsection

@section('title', 'Your Profile')

@section('content')
    <main>
        <section id="" class="bg-light">
            <div class="ornaments position-relative">
                {{-- <div class="ornament position-absolute">
                <img src="ecommerce/img/starorn.svg" alt="" width="100px">
            </div>
            <div class="ornament2 position-absolute">
                <img src="ecommerce/img/starorn.svg" alt="" width="100px">
            </div> --}}
            </div>

            <div class="container py-5 mb-5">
                <div class="row">
                    <div class="col-12">
                        <div class="card rounded-5 border-0" style="width: 100%;">
                            <div class="card-img-top rounded-5"
                                style="height: 13rem; background-image: url('https://images.pexels.com/photos/1648379/pexels-photo-1648379.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1'); background-position: center; background-size: cover; border-radius: 2rem 2rem 0rem 0rem !important;">

                            </div>
                            <div class="card-body my-3 px-5" style="background: #fff">
                                <div class="row">
                                    <div class=" col-lg-3 col-12  rounded-5">
                                        <div class="profile-box text-center p-5 me-3 rounded-5" style="background: #F4BFBF">
                                            <h4 class="card-title mb-0" style="font-weight: 700 !important">
                                                {{ $user->name ?? '-' }}</h4>
                                            <p class="text-light mb-1" style="font-family: quicksand">
                                                {{ $user->email ?? '-' }}</p>
                                            <br>
                                            <a href="" class="" style="color: #FAF0D7">

                                                <small>Edit</small>
                                            </a>
                                            <a href="" class="ms-3" style="color: #FAF0D7">

                                                <small>Del</small>
                                            </a>

                                        </div>
                                    </div>
                                    <div class="col mt-3 mt-lg-0">
                                        <ul class="nav nav-pills rounded-5 bg-light p-2">
                                            <li class="nav-item" id="btnOrder">
                                                <a class="btn rounded-5 px-3 btn-order" style="color: white"
                                                    href="javascript:void(0)">Order
                                                    List</a>
                                            </li>
                                            <li class="nav-item" id="btnAddress">
                                                <a class="nav-link rounded-5 px-3 btn-address" style="color: #676767" href="javascript:void(0)" >Address List</a>
                                            </li>
                                        </ul>

                                        <input type="hidden" name="id" id="id"
                                            value="{{ Auth::user()->id }}">
                                            
                                            <div class="row">
                                                
                                                <div class="col-12">
                                                    <div class=" " id="collapseExample">
                                                        <table class="table table-hover mt-3 " style="color: #676767">
                                                            <tbody id="data">
                                                                @foreach ($order as $order)
                                                                    {{-- {{ dd($order->item[0]->product_id) }} --}}
                                                                    <tr>
                                                                        <th>
                                                                            <p>{{ date('d-m-Y', strtotime($order->created_at)) }}</p>
                                                                            <small style="color: #8CC0DE">
                                                                                {{ $order->transaction_number ?? '-' }}
                                                                            </small>
                                                                            <br>
                                                                            (<span style="color: #F4BFBF">
                                                                                {!! $order->status_front !!}
                                                                            </span>)
                                                                        </th>
                                                                        <th style="width: 20%" class="text-center align-middle">
                
                                                                            <a href="" class="ms-3 link mt-1"
                                                                                style="color: #F4BFBF !important"><i
                                                                                    class="fi fi-sr-delete"></i></a>
                                                                        </th>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
        
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="d-none" id="collapseExample1">
                                                        <table class="table table-hover mt-3 " style="color: #676767">
                                                            <tbody id="data">
                                                                @foreach ($address as $add)
                                                                    {{-- {{ dd($order->item[0]->product_id) }} --}}
                                                                    <tr>
                                                                        <th>
                                                                            <p>{{ $add->name ?? '-'}}</p>
                                                                            <small style="color: #8CC0DE">
                                                                                {{ $add->address ?? '-' }}
                                                                            </small>
                                                                            <br>
                                                                            {{-- (<span style="color: #F4BFBF">
                                                                                {!! $order->status_front !!}
                                                                            </span>) --}}
                                                                        </th>
                                                                        <th style="width: 20%" class="text-center align-middle">
                
                                                                            <a href="" class="ms-3 link mt-1"
                                                                                style="color: #8CC0DE !important"><i
                                                                                    class="fi fi-sr-edit"></i></a>
                                                                            <a href="" class="ms-3 link mt-1"
                                                                                style="color: #F4BFBF !important"><i
                                                                                    class="fi fi-sr-delete"></i></a>
                                                                        </th>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
        
                                                    </div>
    
                                                </div>
                                            </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection

@section('js')
    <script>
        $(document).ready(function() {

            var btnAd = $('.btn-address')
            btnOrd = $('.btn-order')

            $('#btnOrder').click(function() {
                btnOrd.addClass('btn')
                btnOrd.addClass('active')
                btnOrd.css("color", "white");
                btnAd.css("color", "#767676");
                btnAd.removeClass('btn')
                btnAd.removeClass('active')
                btnAd.addClass('nav-link')

                $('#collapseExample1').addClass('d-none')
                $('#collapseExample').removeClass('d-none')
                // $("#collapseExample").slideDown();


            });

            $('#btnAddress').click(function() {
                btnAd.addClass('btn')
                btnAd.addClass('active')
                btnAd.css("color", "white");
                btnOrd.css("color", "#767676");
                btnOrd.removeClass('btn')
                btnOrd.removeClass('active')
                btnOrd.addClass('nav-link')

                $('#collapseExample1').removeClass('d-none')
                $('#collapseExample').addClass('d-none')


            });



        });
    </script>
@endsection
