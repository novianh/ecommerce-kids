@extends('adminlte::page')
@section('title', 'About')

@section('content_header')
    <h6> </h6>
@stop

@push('css')
    <link rel="stylesheet" href="{{ asset('ecommerce/node_modules/dropify/dist/css/dropify.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/vendors/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-brands/css/uicons-brands.css'>
    <style>
        .icons li {
            padding: 0 20px;
            width: 50%;
        }
    </style>
@endpush

@section('breadcrumb', 'slider')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <div class="text-center">
                            <h6 class="text-white text-capitalize ps-3">Contact table</h6>
                        </div>
                        <div class="d-flex justify-content-center">
                            <div class="">
                                @isset($contact)
                                    <a class="btn btn-light" data-toggle="modal" data-target="#modal-form-contact">
                                        <i class="fas fa-pen"></i> Edit Contact
                                    </a>
                                @endisset
                                @empty($contact)
                                    <a class="btn btn-light" data-toggle="modal" data-target="#modal-form-contact">
                                        <i class="fas fa-plus"></i> Add Contact
                                    </a>
                                @endempty
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0 px-3">
                        <table class="table align-items-center justify-content-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">#
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Value</th>
                                    <th style="width: 20%"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Title</th>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">{{ $contact->title ?? '...' }}</p>
                                    </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Address</th>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">{{ $contact->address ?? '...' }}</p>
                                    </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Say Hello</th>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">{{ $contact->telephone ?? '...' }}</p>
                                    </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 ">
                                        <a href="" class="btn btn-light mt-3" data-toggle="modal"
                                            data-target="#modal-form-social"><i class="fas fa-plus"></i> Add Social</a>
                                    </th>
                                    <td>

                                    </td>
                                    <td></td>
                                </tr>
                                @foreach ($social as $sc)
                                    <tr>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Social
                                        </th>
                                        <td>
                                            <div class="d-flex">
                                                <span class="me-2 fs-1">
                                                    {!! $sc->icon !!} 
                                                </span>
                                                <div class="">
                                                    <span>Name: {{ $sc->name ?? '' }}</span>
                                                    <br>
                                                    <a target="_blank" href="//{{ $sc->url ?? '' }}">

                                                        <small>Url: {{ $sc->url ?? '' }}</small>
                                                    </a>

                                                </div>

                                            </div>
                                        </td>
                                        <td>

                                            <a href="{{ route('social.edit', $sc) }}" class="btn text-success">
                                                <i class="fas fa-pen"></i> Edit
                                            </a>
                                            <a href="{{ route('social.delete', $sc) }}"
                                                onclick="notificationBeforeDelete(event, this)" class="btn text-danger">
                                                <i class="fas fa-trash"></i> Delete
                                            </a>
                                        </td>
                                    </tr>
                                    <tr></tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-form-contact" tabindex="-1" role="dialog" aria-labelledby="modal-form"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="card card-plain px-3">
                        <div class="card-header pb-0 text-left">
                            <h5 class="">Contact</h5>
                        </div>
                        <form class="forms-sample" enctype="multipart/form-data" method="POST"
                            action="{{ route('contact.store') }}">
                            @csrf
                            <input type="hidden" name="id" value="{{ $contact->id ?? '' }}">
                            <div class="card-body">
                                <div class="input-group input-group-static mb-4">
                                    <label for="exampleInputUsername1">Title</label>
                                    <input type="text" name="title"
                                        class="form-control @error('title') is-invalid @enderror" id="exampleInputUsername1"
                                        placeholder="e.g Happy With Us" required value="{{ $contact->title ?? '' }}">
                                    @error('title')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="input-group input-group-static mb-4">
                                    <label for="exampleInputUsername1">Address</label>
                                    <textarea class="form-control  @error('address') is-invalid @enderror" id="exampleFormControlTextarea1" rows="3"
                                        name="address" placeholder="e.g ads street, ...">{{ $contact->address ?? '' }}</textarea>
                                    @error('address')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="input-group input-group-static mb-4">
                                    <label for="exampleInputUsername1">Say Hello</label>
                                    <input type="text" name="telephone"
                                        class="form-control @error('telephone') is-invalid @enderror"
                                        id="exampleInputUsername1" placeholder="e.g +923 3849 ..." required
                                        value="{{ $contact->telephone ?? '' }}">
                                    @error('telephone')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>


                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-light" type="button" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-form-social" tabindex="-1" role="dialog" aria-labelledby="modal-form"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="card card-plain">
                        <div class="card-header">
                            <h5>Social</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('social.store') }}" method="post" id="my-awesome-dropzone"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="input-group input-group-static mb-4">
                                    <label for="exampleInputUsername1">Name</label>
                                    <input type="text" name="name"
                                        class="form-control @error('name') is-invalid @enderror"
                                        id="exampleInputUsername1" placeholder="e.g Instagram" required>
                                    @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="input-group input-group-static mb-4">
                                    <label for="exampleInputUsername1">Url</label>
                                    <input type="text" name="url"
                                        class="form-control @error('url') is-invalid @enderror" id="exampleInputUsername1"
                                        placeholder="e.g www.youtube.com" required>
                                    @error('url')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Icon</label>
                                    <input type="text" class="form-control @error('icon') is-invalid @enderror"
                                        name="icon"
                                        placeholder='e.g <i class="fi fi-brands-facebook-messenger"></i>' />
                                    @error('icon')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-light" type="button" data-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h5>List icon</h5>
        </div>
        <div class="card-body">
            <ul class="icons d-flex flex-wrap m-3 list-unstyled">
                <li>
                    <div class="icon-holder">
                        <i class="fi fi-brands-facebook-messenger"></i>
                        <span class="label mono">fi-brands-facebook-messenger</span>
                    </div>
                </li>


                <li>
                    <div class="icon-holder">
                        <i class="fi fi-brands-facebook"></i>
                        <span class="label mono">fi-brands-facebook</span>
                    </div>
                </li>

                <li>
                    <div class="icon-holder">
                        <i class="fi fi-brands-instagram"></i>
                        <span class="label mono">fi-brands-instagram</span>
                    </div>
                </li>

                <li>
                    <div class="icon-holder">
                        <i class="fi fi-brands-twitter"></i>
                        <span class="label mono">fi-brands-twitter</span>
                    </div>
                </li>

                <li>
                    <div class="icon-holder">
                        <i class="fi fi-brands-pinterest"></i>
                        <span class="label mono">fi-brands-pinterest</span>
                    </div>
                </li>

                <li>
                    <div class="icon-holder">
                        <i class="fi fi-brands-blogger"></i>
                        <span class="label mono">fi-brands-blogger</span>
                    </div>
                </li>

                <li>
                    <div class="icon-holder">
                        <i class="fi fi-brands-tik-tok"></i>
                        <span class="label mono">fi-brands-tik-tok</span>
                    </div>
                </li>

                <li>
                    <div class="icon-holder">
                        <i class="fi fi-brands-youtube"></i>
                        <span class="label mono">fi-brands-youtube</span>
                    </div>
                </li>
                <li>
                    <div class="icon-holder">
                        <i class="fi fi-brands-line"></i>
                        <span class="label mono">fi-brands-line</span>
                    </div>
                </li>
                <li>
                    <div class="icon-holder">
                        <i class="fi fi-brands-whatsapp"></i>
                        <span class="label mono">fi-brands-whatsapp</span>
                    </div>
                </li>
                <li>
                    <div class="icon-holder">
                        <i class="fi fi-brands-telegram"></i>
                        <span class="label mono">fi-brands-telegram</span>
                    </div>
                </li>

                <li>
                    <div class="icon-holder">
                        <i class="fi fi-brands-behance"></i>
                        <span class="label mono">fi-brands-behance</span>
                    </div>
                </li>

                <li>
                    <div class="icon-holder">
                        <i class="fi fi-brands-apple"></i>
                        <span class="label mono">fi-brands-apple</span>
                    </div>
                </li>

                <li>
                    <div class="icon-holder">
                        <i class="fi fi-brands-cc-amazon-pay"></i>
                        <span class="label mono">fi-brands-cc-amazon-pay</span>
                    </div>
                </li>

                <li>
                    <div class="icon-holder">
                        <i class="fi fi-brands-ebay"></i>
                        <span class="label mono">fi-brands-ebay</span>
                    </div>
                </li>

                <li>
                    <div class="icon-holder">
                        <i class="fi fi-brands-discord"></i>
                        <span class="label mono">fi-brands-discord</span>
                    </div>
                </li>

                <li>
                    <div class="icon-holder">
                        <i class="fi fi-brands-medium"></i>
                        <span class="label mono">fi-brands-medium</span>
                    </div>
                </li>


            </ul>
        </div>
        <div class="card-footer">
            <h6>How to use?</h6>

            <span>Example: </span> <p> {{ '<i class="fi fi-brands-medium"></i>' }} </p>
            <span>result:</span>
            <p><i class="fi fi-brands-medium"></i> </p>

            <span>For more icon visit this <a href="//www.flaticon.com/uicons" target="_blank"> link</a></span>
        </div>
    </div>

@endsection
@section('js')

    <form action="" id="delete-form" method="post">
        @method('delete')
        @csrf
    </form>
    <script>
        function notificationBeforeDelete(event, el) {
            event.preventDefault();
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })
            Swal.fire({
                title: 'Are You Sure?',
                text: "You won't be able to revert this!!",
                icon: 'warning',
                showCancelButton: true,
                // confirmButtonColor: 'rgb(26 115 232)',
                // cancelButtonColor: '#d33',
                customClass: {
                    confirmButton: 'btn btn-primary',
                    cancelButton: 'btn btn-info ms-3'
                },
                buttonsStyling: false,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
            }).then((result) => {
                if (result.isConfirmed) {
                    $("#delete-form").attr('action', $(el).attr('href'));
                    $("#delete-form").submit();
                    swalWithBootstrapButtons.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                    )
                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'Cancelled',
                        'Your data is safe :)',
                        'error'
                    )
                }
            });
        }
        $(document).ready(function() {
            $('#tableStory').DataTable({
                "responsive": true,
                pagingType: 'numbers',
                "searching": false
            });

        })
    </script>
    <script src="{{ asset('ecommerce/node_modules/dropify/dist/js/dropify.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            // Basic
            $('.dropify').dropify();

        });
    </script>
@endsection
