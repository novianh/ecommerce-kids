@extends('frontend.layouts.shopping.master')

@section('style')
    <link rel="stylesheet" href="{{ asset('ecommerce/style/co.css') }}">
    <link rel="stylesheet" href="{{ asset('ecommerce/node_modules/dropify/dist/css/dropify.min.css') }}">
    <style>
        .btn.active {
            background: #8CC0DE !important;
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

        .ajs-message {
            background-color: #F4BFBF;
            color: #FFF;
        }

        .ajs-message.ajs-visible {
            border-radius: 2rem;
            text-align: center
        }

        .ajs-ok,
        .ajs-cancel {
            border: none;
            border-radius: 2rem;
        }

        .ajs-ok {
            background: #8CC0DE;
        }

        .ajs-header,
        .ajs-footer {
            background: rgb(248, 249, 250) !important;
        }
    </style>
@endsection

@section('title', 'Your Profile')

@section('content')
    <main>
        <section id="" class="bg-light">
            <div class="container py-5 mb-5">
                <div class="row">
                    <div class="col-12">
                        <div class="card rounded-5 border-0" style="width: 100%;">
                            <div class="card-img-top rounded-5"
                                style="height: 13rem; background-image: url('https://picsum.photos/900/500?random=1'); background-position: bottom; background-size: cover; border-radius: 2rem 2rem 0rem 0rem !important;">

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
                                            <a href="{{ route('profile.edit', Auth::user()->id) }}" class=""
                                                style="color: #FAF0D7">

                                                <small>Edit</small>
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
                                                <a class="nav-link rounded-5 px-3 btn-address" style="color: #676767"
                                                    href="javascript:void(0)">Address List</a>
                                            </li>
                                        </ul>

                                        <input type="hidden" name="id" id="id"
                                            value="{{ Auth::user()->id }}">

                                        <div class="row">

                                            <div class="col-12">
                                                <div class=" " id="collapseExample">
                                                    <table class="table mt-3 table-hover" style="color: #676767">
                                                        <tbody id="data">
                                                            @foreach ($order as $ord)
                                                            <tr>
                                                                
                                                                <th>
                                                                        <a href="{{ route('transaction') }}"
                                                                            class="link text-start">
                                                                            <p>{{ date('d-m-Y', strtotime($ord->created_at)) }}
                                                                            </p>
                                                                            <small style="color: #8CC0DE">
                                                                                {{ $ord->transaction_number ?? '-' }}
                                                                            </small>
                                                                            <br>
                                                                            (<span style="color: #F4BFBF" id="respoonseStatus">
                                                                                {!! $ord->status_front !!}
                                                                            </span>)
                                                                        </a>
                                                                    </th>
                                                                    <th style="width: 20%" class="text-center align-middle">

                                                                        <form id="cancelForm" method="post">
                                                                            @csrf
                                                                            {{-- {{ dd($ord->id) }} --}}
                                                                            <input type="hidden" name="id"
                                                                                value="{{ $ord->id }}"
                                                                                id="id_order_detail">
                                                                            <input type="hidden" name="status"
                                                                                value="7" id="status">
                                                                            <a href="javascript:void(0)" id="submit" class="ms-3 link mt-1"
                                                                                style="color: #F4BFBF !important"><i
                                                                                    class="fi fi-sr-delete"></i></a>
                                                                        </form>
                                                                    </th>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>

                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="d-none" id="collapseExample1">
                                                    <table class="table mt-3 " style="color: #676767">
                                                        <tbody id="data">
                                                            @foreach ($address as $add)
                                                                <tr>
                                                                    <th>
                                                                        <p>{{ $add->name ?? '-' }}</p>
                                                                        <small style="color: #8CC0DE">
                                                                            {{ $add->address ?? '-' }}
                                                                        </small>
                                                                        <br>
                                                                    </th>
                                                                    <th style="width: 20%" class="text-center align-middle">

                                                                        {{-- <a href="{{ route('profile.address.edit', $add) }}"
                                                                            class="ms-3 link mt-1"
                                                                            style="color: #8CC0DE !important"><i
                                                                                class="fi fi-sr-edit"></i></a> --}}
                                                                        <a href="{{ route('profile.address.delete', $add->id) }}"
                                                                            class="ms-3 link mt-1"
                                                                            onclick="notificationBeforeDelete(event, this)"
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
    <form action="" id="delete-form" method="post">
        @method('delete')
        @csrf
    </form>
    <script>
        function notificationBeforeDelete(event, el) {
            event.preventDefault();
            alertify.confirm('Confirm Delete Address', 'Are You Sure?', function() {
                $("#delete-form").attr('action', $(el).attr('href'));
                $("#delete-form").submit();
            }, function() {
                alertify.set('notifier', 'position', 'top-center');
                alertify.message('Cancel').delay(3)
            });

        }
    </script>
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

            $("#cancelForm").click(function(e) {
                e.preventDefault();

                let id = $("#id_order_detail").val();
                let status = $("#status").val();

                $.ajax({
                    url: "{{ route('order.cancel') }}",
                    type: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        id: id,
                        status: status,
                    },
                    success: function(response) {
                        console.log(response);
                        if (response) {
                            alertify.set('notifier', 'position', 'top-center');
                            alertify.message('Delete Success').delay(3)
                        }
                        $('#respoonseStatus').html('Waiting response for cancel order')
                    },
                    error: function(response) {
                        $("#id-error").text(response.responseJSON.errors.id);
                        $("#status-error").text(response.responseJSON.errors.status);
                    },
                });
            });


        });
    </script>
@endsection
