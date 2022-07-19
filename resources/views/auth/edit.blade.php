@extends('frontend.layouts.shopping.master')

@section('style')
    <link rel="stylesheet" href="{{ asset('style/co.css') }}">
@endsection

@section('title', 'Edit Profile')

@section('content')
    <main>

        <section id="co" class=" bg-light">
            <div class="container py-5">
                <div class="row justify-content-center position-relative" style="z-index: 10;">
                    <div class="col-lg-8 col-md-7 text-center">
                        <hr class="my-4">
                    </div>
                    <div class="col-md-7 col-lg-8 ">
                        <h5>Edit Profile</h5>
                        <form class="needs-validation" novalidate action="{{ route('profile.update.upt', $user->id) }}" method="post">
                           @csrf
                           @method('put')
                            <div class="row g-3">
                                <div class="col-sm-12">
                                    <label for="Username" class="form-label">Username</label>
                                    <input type="text" class="form-control" id="firstName" placeholder=""
                                        value="{{ $user->name }}" required name="name">
                                    <div class="invalid-feedback">
                                        Valid first name is required.
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <label for="Username" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="firstName" placeholder=""
                                        value="{{ $user->email }}" required name="email">
                                    <div class="invalid-feedback">
                                        Valid first name is required.
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <label for="Username" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="firstName" placeholder="" required
                                        name="password">
                                    <div class="invalid-feedback">
                                        Valid first name is required.
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <label for="Username" class="form-label">Confirm Password</label>
                                    <input type="password" class="form-control" id="firstName" placeholder="" required>
                                    <div class="invalid-feedback">
                                        Valid first name is required.
                                    </div>
                                </div>
                            </div>

                            <button class="btn rounded-5 mt-3 px-3" type="submit">Update</button>
                        </form>
                        <hr class="my-4">
                    </div>
                </div>
            </div>

        </section>
    </main>

@endsection
