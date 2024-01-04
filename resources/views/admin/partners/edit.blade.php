@extends('layouts.admin.default')
@section('content')
    @include('includes.admin.breadcrumb')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-md-12">
                    <!-- jquery validation -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">{{ @$pageTitle }}</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form id="quickForm" method="post" action="{{ @url('/admin/partner/update') }}"
                            enctype="multipart/form-data">
                            <div class="card-body">
                                @csrf
                                <input type="hidden" name="id" value="{{ $item->id }}">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="company_name">Company Name</label>
                                            <input type="text" name="company_name" value="{{ $item->company_name }}"
                                                class="form-control" id="company_name" placeholder="Enter Company Name">
                                            @error('company_name')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <textarea name="description" class="form-control" id="description" placeholder="Description">{{ $item->description }}</textarea>
                                            @error('description')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group custom-img-hanlder">
                                            <label class="img-hldr">
                                                <div class="row-custom">
                                                    <img id="image-container1" class="img img-fluid"
                                                        src="{{ $item->getFirstMediaUrl('images', 'thumb') }}" />
                                                    <input class="invisible" type="file" accept="image/*" name="image"
                                                        id="image-upload" /><br>
                                                </div>
                                                <button id="cancel-btn" class="btn btn-xs btn-danger"><i
                                                        class="fa fa-trash"></i></button>
                                            </label>
                                            <br>
                                        </div>


                                    </div>
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
                    company_name: {
                        required: true,
                        minlength: 3
                    }
                },
                messages: {
                    company_name: {
                        required: "Please enter a company name",
                        minlength: "Company name must be gretaer than 3 characters long"
                    }
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
            /* This function will call when cancel button clicked */
            $("#cancel-btn").on("click", function() {
                /* Reset input element */
                $('#image-upload').val("");
                /* Clear image preview container */
                $('#image-container1').attr("src", "");
            });



            $("#image-upload12").on("change", function() {
                /* Current this object refer to input element */
                var $input = $(this);
                var reader = new FileReader();
                reader.onload = function() {
                    $("#image-container12").attr("src", reader.result);
                }
                reader.readAsDataURL($input[0].files[0]);
            });
            /* This function will call when cancel button clicked */
            $("#cancel-btn12").on("click", function() {
                /* Reset input element */
                $('#image-upload12').val("");
                /* Clear image preview container */
                $('#image-container12').attr("src", "");
            });
        })
    </script>

@stop
