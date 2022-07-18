@extends('adminlte::page')
@section('title', 'About')

@section('content_header')
    <h6> </h6>
@stop

@push('css')
    <link rel="stylesheet" href="{{ asset('ecommerce/node_modules/dropify/dist/css/dropify.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/vendors/font-awesome/css/font-awesome.min.css') }}">
@endpush

@section('breadcrumb', 'slider')

@section('content')
    <div class="row ">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    @if ($about->count() > 0 || $story->count() > 0 || isset($aboutHome))
                        <div class="d-flex justify-content-center mb-3">



                        </div>


                        <div class="stretch-card">
                            <div class="card">
                                <div class="card-header bg-light d-flex justify-content-between">
                                    <h5>Story</h5>
                                    <a type="button" class=" btn tambah m-auto" data-toggle="modal"
                                        data-target="#modal-form-story"><i class="fas fa-plus"></i> ADD Story</a>
                                </div>
                                <div class="card-body">
                                    <table class="table text-center" id="tableStory">
                                        <thead>
                                            <th>Year</th>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th></th>
                                        </thead>
                                        <tbody>
                                            @foreach ($story as $story)
                                                <tr>
                                                    <td>{{ $story->year }}</td>
                                                    <td>{{ $story->title }}</td>
                                                    <td>{{ $story->desc }}</td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <a class="btn text-secondary " href="#" role="button"
                                                                id="dropdownMenuLink{{ $story->id }}"
                                                                data-toggle="dropdown" aria-expanded="false">
                                                                <i class="fas fa-ellipsis-v"></i>
                                                            </a>
                                                            <div class="dropdown-menu"
                                                                aria-labelledby="dropdownMenuLink{{ $story->id }}">
                                                                <a href="{{ route('about.story.edit', $story) }}"
                                                                    class="dropdown-item text-success"><i class="fa fa-edit"
                                                                        data-toggle="modal" data-target="#edit"></i>
                                                                    Edit</a>
                                                                <a href="{{ route('about.story.destroy', $story) }}"
                                                                    class="dropdown-item text-danger"
                                                                    onclick="notificationBeforeDelete(event, this)"><i
                                                                        class=" fa fa-trash"></i>
                                                                    Delete</a>

                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                            <div class="card ">
                                <div class="card-header bg-light d-flex justify-content-between">
                                    <h5>Icon About</h5>
                                    <a type="button" class=" btn tambah m-auto" data-toggle="modal"
                                        data-target="#modal-form-about"><i class="fas fa-plus"></i> ADD Icon About</a>
                                </div>
                                <div class="card-body">
                                    <div class="row mb-3">
                                        @foreach ($about as $about)
                                            <div class="col-3 text-center">
                                                <img src="{{ asset('storage/about/' . $about->icon) }}" alt="..."
                                                    width="50%" class="mb-3 rounded-circle">
                                                <br>
                                                <small class="">{{ $about->subtitle }}</small>
                                                <br>
                                                <a href="{{ route('about.edit', $about) }}"
                                                    class="mt-3 btn btn-success btn-sm">Edit</a>
                                                <a href="{{ route('about.front.destroy', $about->id) }}"
                                                    onclick="notificationBeforeDelete(event, this)"
                                                    class="mt-3 btn btn-danger btn-sm">Del</a>
                                            </div>
                                        @endforeach
                                    </div>

                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header bg-light d-flex justify-content-between">
                                    <h5>Subtitle About Home</h5>
                                    <a type="button" class="btn edit mb-3 text-end" data-toggle="modal"
                                        data-target="#modal-form-sub"><i class="fas fa-edit"></i> edit</a>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <p>{{ $aboutHome->subtitle }}</p>
                                    </div>

                                </div>
                            </div>
                        </div>
                    @else
                        <div class="d-flex justify-content-center">

                            <a type="button" class=" btn btn-block tambah m-auto" data-toggle="modal"
                                data-target="#modal-form-story"><i class="fas fa-plus"></i> ADD Story</a>
                            <a type="button" class=" btn btn-block tambah m-auto" data-toggle="modal"
                                data-target="#modal-form-about"><i class="fas fa-plus"></i> ADD Icon About</a>
                            <a type="button" class=" btn btn-block tambah m-auto" data-toggle="modal"
                                data-target="#modal-form-sub"><i class="fas fa-plus"></i> ADD subtitle about</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-form-about" tabindex="-1" role="dialog" aria-labelledby="modal-form"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="card card-plain">
                        <div class="card-header pb-0 text-left">
                            <h5 class="">About</h5>
                        </div>
                        <form class="forms-sample" enctype="multipart/form-data" method="POST"
                            action="{{ route('about.store') }}" id="my-awesome-dropzone">
                            @csrf
                            <div class="card-body">
                                <div class="input-group input-group-static mb-4">
                                    <label for="exampleInputUsername1">Icon subtitle</label>
                                    <input type="text" name="subtitle"
                                        class="form-control @error('subtitle') is-invalid @enderror"
                                        id="exampleInputUsername1" placeholder="subtitle" required>
                                    @error('subtitle')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Icon <small
                                            class="text-warning">*(Square)</small></label>
                                    <input type="file" class="dropify @error('desc') is-invalid @enderror"
                                        id="input-file-now" name="icon" data-errors-position="outside" required
                                        data-allowed-formats="square" data-max-file-size="4M"
                                        data-allowed-file-extensions="jpeg png jpg svg gif" />
                                    @error('desc')
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
    <div class="modal fade" id="modal-form-sub" tabindex="-1" role="dialog" aria-labelledby="modal-form"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="card card-plain">
                        <div class="card-header pb-0 text-left">
                            <h5 class="">Subtitle About</h5>
                        </div>
                        <form class="forms-sample" enctype="multipart/form-data" method="POST"
                            action="{{ route('about.subtitle.store') }}" id="my-awesome-dropzone">
                            @csrf
                            <input type="hidden" name="id" value="{{ $aboutHome->id ?? '' }}">
                            <div class="card-body">
                                <div class="input-group input-group-static mb-4">
                                    <label for="exampleInputEmail1">Subtitle</label>
                                    <textarea class="form-control  @error('subtitle') is-invalid @enderror" id="exampleFormControlTextarea1"
                                        rows="3" name="subtitle" placeholder="Subtitle">{{ $aboutHome->subtitle ?? '' }}</textarea>
                                    @error('subtitle')
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
    <div class="modal fade" id="modal-form-story" tabindex="-1" role="dialog" aria-labelledby="modal-form"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="card card-plain">
                        <div class="card-header pb-0 text-left">
                            <h5 class="">Story</h5>
                        </div>
                        <form class="forms-sample" enctype="multipart/form-data" method="POST"
                            action="{{ route('about.story.store') }}" id="my-awesome-dropzone">
                            @csrf
                            <div class="card-body">
                                <div class="input-group input-group-static mb-4">
                                    <label for="exampleInputUsername1">Title</label>
                                    <input type="text" name="title" required
                                        class="form-control @error('title') is-invalid @enderror"
                                        id="exampleInputUsername1" placeholder="Title">
                                    @error('title')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="input-group input-group-static mb-4">
                                    <label for="exampleInputUsername1">Year</label>
                                    <input type="text" name="year" required
                                        class="form-control @error('year') is-invalid @enderror"
                                        id="exampleInputUsername1" placeholder="2020">
                                    @error('year')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="input-group input-group-static mb-4">
                                    <label for="exampleInputEmail1">Description</label>
                                    <textarea class="form-control  @error('desc') is-invalid @enderror" id="exampleFormControlTextarea1" rows="3"
                                        name="desc" placeholder="Description" required></textarea>
                                    @error('desc')
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





            // alertify.confirm('Are you sure?', function() {
            //     $("#delete-form").attr('action', $(el).attr('href'));
            //     $("#delete-form").submit();
            // });
            //     $('.ajs-button').addClass('btn');
            //     $('.ajs-ok').addClass('btn-success');
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
