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
                <h3 class="card-title">{{@$pageTitle}}</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="quickForm" method="post" action="{{@url('/admin/testimonial/save')}}" enctype="multipart/form-data">
                <div class="card-body">
                @csrf
                
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="subject">Subject</label>
                      <input type="text" name="subject" value="{{ old('subject') }}" class="form-control" id="subject" placeholder="Enter Subject">
                      @error('subject')
                      <div class="text-danger">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>
                  <div class="col-sm-6">
                    
                    <div class="form-group">
                      <label for="star_rating">Ratings</label>
                      <div class="rating">
                        <input type="radio" name="star_rating" value="5" id="5"><label for="5">☆</label>
                        <input type="radio" name="star_rating" value="4" id="4"><label for="4">☆</label>
                        <input type="radio" name="star_rating" value="3" id="3"><label for="3">☆</label>
                        <input type="radio" name="star_rating" value="2" id="2"><label for="2">☆</label>
                        <input type="radio" name="star_rating" value="1" id="1"><label for="1">☆</label>
                      </div>
                      @error('star_rating')
                      <div class="text-danger">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="body">Description</label>
                      <textarea name="body" class="form-control" id="body" placeholder="Description">{{ old('body') }}</textarea>
                      @error('body')
                      <div class="text-danger">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="client_name">Client Name</label>
                      <input type="text" name="client_name" value="{{ old('client_name') }}" class="form-control" id="client_name" placeholder="Enter Client Name">
                      @error('client_name')
                      <div class="text-danger">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="designation">Designation</label>
                      <input type="text" name="designation" value="{{ old('designation') }}" class="form-control" id="designation" placeholder="Enter Designation">
                      @error('designation')
                      <div class="text-danger">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>
                  <div class="col-sm-6">
                  <div class="form-group custom-img-hanlder">
                  <label for="designation">Client Image</label>
                    <label class="img-hldr">
                          <div class="row-custom">
                            <img id="image-container1" class="img img-fluid" />
                            <input class="invisible" type="file" accept="image/*" name="image" id="image-upload" /><br>
                          </div>
                          <button id="cancel-btn" class="btn btn-xs btn-danger" ><i class="fa fa-trash"></i></button>
                          @error('image')
                            <div class="text-danger">{{ $message }}</div>
                          @enderror
                        </label>
                      <br>
                    </div>
                    
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group custom-img-hanlder">
                  <label for="designation">Company Logo</label>
                    <label class="img-hldr">
                          <div class="row-custom">
                            <img id="image-container12" class="img img-fluid" />
                            <input class="invisible" type="file" accept="image/*" name="image12" id="image-upload12" /><br>
                          </div>
                          <button id="cancel-btn12" class="btn btn-xs btn-danger" ><i class="fa fa-trash"></i></button>
                          @error('image12')
                            <div class="text-danger">{{ $message }}</div>
                          @enderror
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
<script src="{{@url('admin/plugins/summernote/summernote-bs4.min.js')}}"></script>
<link rel="stylesheet" href="{{@url('admin/plugins/summernote/summernote-bs4.min.css')}}">
 

  <script>
$(function () {
  $('#summernote').summernote({height: 300})

  $.validator.setDefaults({
    submitHandler: function () {
      $('#quickForm').submit();    
      // alert( "Form successful submitted!" );
    }
  });
  $('#quickForm').validate({
    rules: {
      subject: {
        required: true,
        minlength: 5
      },
      description: {
        required: true,
        minlength: 30
      },
      star_rating: {
        required: true
      },
      client_name: {
        required: true
      },
      designation: {
        required: true
      },
      image: {
            required: true,
            extension: "jpg|jpeg|png"
        },

      image12: {
            required: true,
            extension: "jpg|jpeg|png"
        }
    },
    messages: {
      email: {
        required: "Please enter a email address",
        email: "Please enter a valid email address"
      },
      image: {
            required: "Please upload file.",
            extension: "Please upload file in these format only (jpg, jpeg, png)."
        },
        image12: {
            required: "Please upload file.",
            extension: "Please upload file in these format only (jpg, jpeg, png)."
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
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});


$(function(){
    $("#image-upload").on("change",function(){
      /* Current this object refer to input element */ 			
      var $input = $(this);
      var reader = new FileReader();
      reader.onload = function(){
        $("#image-container1").attr("src", reader.result);
      }
      reader.readAsDataURL($input[0].files[0]);
    });
    /* This function will call when cancel button clicked */ 		
    $("#cancel-btn").on("click",function(){
      /* Reset input element */
      $('#image-upload').val("");
      /* Clear image preview container */
      $('#image-container1').attr("src","");
    });



    $("#image-upload12").on("change",function(){
      /* Current this object refer to input element */ 			
      var $input = $(this);
      var reader = new FileReader();
      reader.onload = function(){
        $("#image-container12").attr("src", reader.result);
      }
      reader.readAsDataURL($input[0].files[0]);
    });
    /* This function will call when cancel button clicked */ 		
    $("#cancel-btn12").on("click",function(){
      /* Reset input element */
      $('#image-upload12').val("");
      /* Clear image preview container */
      $('#image-container12').attr("src","");
    });
})
</script>
  
@stop
