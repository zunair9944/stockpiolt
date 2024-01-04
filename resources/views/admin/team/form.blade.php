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
              <form id="quickForm" method="post" action="{{@url('/admin/team/save')}}" enctype="multipart/form-data">
                <div class="card-body">
                @csrf
                  <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" value="{{ old('name') }}" class="form-control" id="name" placeholder="Enter Name">
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="dsignation">Designation</label>
                    <input type="text" name="dsignation" value="{{ old('dsignation') }}" class="form-control" id="dsignation" placeholder="Enter Designation">
                    @error('dsignation')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" class="form-control" id="description" placeholder="Description">{{ old('description') }}</textarea>
                    @error('description')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  
                  <div class="form-group">
                    <label for="mataTitle">Mata Title</label>
                    <input type="text" name="mataTitle"  value="{{ old('mataTitle') }}" class="form-control" id="mataTitle" placeholder="Enter Mata Title">
                    @error('mataTitle')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="mataDescription">Mata Description</label>
                    <input type="text" name="mataDescription" value="{{ old('mataDescription') }}" class="form-control" id="mataDescription" placeholder="Enter Mata Description">
                    @error('mataDescription')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="mataTags">Mata Tags</label>
                    <input type="text" name="mataTags" value="{{ old('mataTags') }}" class="form-control" id="mataTags" placeholder="Enter Mata Tags">
                    @error('mataTags')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>

                  <div class="form-group custom-img-hanlder">
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
  $.validator.setDefaults({
    submitHandler: function () {
      $('#quickForm').submit();    
      // alert( "Form successful submitted!" );
    }
  });
  $('#quickForm').validate({
    rules: {
      name: {
        required: true,
        minlength: 5
      },
      dsignation: {
        required: true,
        minlength: 3
      },
      image: {
            required: true,
            extension: "jpg|jpeg|png"
        }
    },
    messages: {
      image: {
            required: "Please upload file.",
            extension: "Please upload file in these format only (jpg, jpeg, png)."
        }
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
        }
                             );
        /* This function will call when upload button clicked */ 		
        $("#upload-btn").on("click",function(){
          /* file validation logic goes here if required */      
          /* image uploading logic goes here */
          alert("Upload logic need to be write here...");
        }
                           );
        /* This function will call when cancel button clicked */ 		
        $("#cancel-btn").on("click",function(){
          /* Reset input element */
          $('#image-upload').val("");
          /* Clear image preview container */
          $('#image-container').attr("src","");
        }
                           );
})
</script>
  
@stop
