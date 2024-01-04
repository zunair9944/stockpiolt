@extends('layouts.admin.default')
@section('content')
    @include('includes.admin.breadcrumb')
    <!-- Main content -->
    @if (session()->has('success'))
        {!! session()->get('success') !!}
    @endif
    <section class="content">
        <div class="container-fluid">


            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-md-12">
                    <!-- jquery validation -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Setting</small></h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form id="quickForm" method="post" action="{{ route('settings-update') }}"
                            enctype="multipart/form-data">

                            <div class="card-body">
                                @csrf
                                {{ method_field('GET') }}
                                <div class="form-group">
                                    <label for="title">Country Name </label>
                                    <input type="text" name="country" value="{{ $item->country }}" class="form-control"
                                        id="country" placeholder="Enter Country Name">
                                    @error('country')
                                        <div class="text-danger"></div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="title">Mailing address </label>
                                    <input type="text" name="address" value="{{ $item->address }}" class="form-control"
                                        id="address" placeholder="Enter Address">
                                    @error('address')
                                        <div class="text-danger"></div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="mataTitle">Phone Number</label>
                                    <input type="text" name="phone" value="{{ $item->phone }}" class="form-control"
                                        id="phone" placeholder="Enter Phone Number">
                                    @error('phone')
                                        <div class="text-danger"></div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="mataDescription">Email</label>
                                    <input type="text" name="email" value="{{ $item->email }}" class="form-control"
                                        id="email" placeholder="Enter Email">
                                    @error('Email')
                                        <div class="text-danger"></div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="mataDescription">Map iframe</label>
                                    <input type="text" name="map" value="{{ $item->map }}" class="form-control"
                                        id="map" placeholder="Enter Map iframe">
                                    @error('map')
                                        <div class="text-danger"></div>
                                    @enderror
                                </div>

                                <label>Site Logo </label>
                                <div class="form-group custom-img-handler">
                                    <label class="img-hldr">
                                        <div class="row-custom">
                                            <img id="image-container1" class="img img-fluid"
                                                src="{{ $item->getFirstMediaUrl('images', 'thumb') }}" />
                                            <input class="invisible" type="file" accept="image/*" name="image"
                                                id="image-upload" onchange="displayImage(this)" /><br>
                                        </div>
                                    </label>
                                    <br>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <input type="submit" class="btn btn-primary" value="submit">
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


    @include('includes.admin.footer')
    @include('includes.admin.scripts')
    @include('includes.admin.validationScript')
    <!-- Summernote -->
    <script src="{{ @url('admin/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <link rel="stylesheet" href="{{ @url('admin/plugins/summernote/summernote-bs4.min.css') }}">



    <script>
        function displayImage(input) {
            var imageContainer = document.getElementById("image-container1");
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    imageContainer.src = e.target.result;
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

    <script>
        $(function() {
        $('#summernote').summernote({
            height: 300
        })

        $.validator.setDefaults({
            submitHandler: function() {
                $('#quickForm').submit();
                // alert( "Form successful submitted!" );
            }
        });
        $('#quickForm').validate({
                    rules: {
                        title: {
                            required: true,
                            minlength: 5
                        },
                        description: {
                            required: true,
                            minlength: 30
                        },
                        summernote: {
                            required: true
                        },
                        tag_id: {
                            required: true
                        },

                    }
                },
                messages: {
                    email: {
                        required: "Please enter a email address",
                        email: "Please enter a valid email address"
                    },

                },
                password: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 5 characters long"
                },
                summernote: "Description is required",
                tag_id: "Please select a tag",
                terms: "Please accept our terms"
            },
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });
        });


        $(function() {
            $("#image-upload").on("change", function() {
                /* Current this object refer to input element */
                var $input = $(this);
                var reader = new FileReader();
                reader.onload = function() {
                    $("#image-container1").attr("src", reader.result);
                }
                reader.readAsDataURL($input[0].files[0]);
            });
            /* This function will call when upload button clicked */
            $("#upload-btn").on("click", function() {
                /* file validation logic goes here if required */
                /* image uploading logic goes here */
                alert("Upload logic need to be write here...");
            });
            /* This function will call when cancel button clicked */
            $("#cancel-btn").on("click", function() {
                /* Reset input element */
                $('#image-upload').val("");
                /* Clear image preview container */
                $('#image-container1').attr("src", "");
                $('#image-container1').removeAttr("src");
                return false;
            });
        })
    </script>

@stop
