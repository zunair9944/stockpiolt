@extends('layouts.admin.default')
@section('content')
@include('includes.admin.dataTableCss')
@include('includes.admin.breadcrumb')

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="row">
              <div class="col-12">
                <button type="button" class="float-right btn btn-primary" data-toggle="modal" data-target="#myModal">Add New</button>

              </div>
            </div>
          @if(session()->has('msg'))
                <p class="alert text-center {{ session()->get('alert-class') }}">{{ session()->get('msg') }}</p>
              @endif
            <div class="card">
              <!-- <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
              </div> -->
              <!-- /.card-header -->
              
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Head</th>
                        <th>Parent</th>
                        <th width="100px">Action</th>
                    </tr>
                </thead>
                <tbody></tbody>
                 
                  <tfoot>
                  <tr>
                        <th>ID</th>
                        <th>Head</th>
                        <th>Parent</th>
                        <th width="100px">Action</th>
                    </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
  </div>
  <!-- /.content-wrapper -->


  <!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add New FAQ Head</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <form action="{{@route('save-faq-heads')}}" method="post" id="quickForm">
          <input type="hidden" name="id" id="faqHead-id" value="">
        <div class="modal-body">
          <div class="row">
            <div class="col-sm-12">
              <div class="form-group">
                <label for="title">Title</label>
                <input type="text" id="faqtitle" placeholder="Title here" name="title" class="form-control">
              </div>
            </div>

            <div class="col-sm-12">
              <div class="form-group">
                <label for="parent_id">Parent</label>
                <select id="parent_id" name="parent_id" class="form-control">
                  <option value="">Select Parent</option>
                  @foreach($parents as $parent)
                  <option value="{{$parent->id}}">{{$parent->title}}</option>
                  @endforeach
                </select>
              </div>
            </div>
          </div>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Submit</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        </form>
      </div>
    </div>
  </div>
  @include('includes.admin.footer')
  @include('includes.admin.scripts')
  @include('includes.admin.dataTableScripts')
  @include('includes.admin.validationScript')

    <script type="text/javascript">
      function editMe(url){
        $.get(url, {}, function(resp){
          // resp = JSON.parse(resp);
          console.log(resp)
          $('#faqtitle').val('')
          $('#faqtitle').val(resp.title)
          $('#faqHead-id').val(resp.id);
          $('#parent_id').val(resp.parent_id);
          
          $('.modal-title').text('Edit FAQ Head')
          $('#myModal').modal('show');
          return false;
        }); // ajax call
      }
      
$.validator.setDefaults({
    submitHandler: function () {
      // $('#quickForm').submit();    
      $.post($('#quickForm').attr('action'), {'id':$('#faqHead-id').val(), "_token": "{{ csrf_token() }}", 'title':$('#faqtitle').val() , 'parent_id':$('#parent_id').val()}, function(resp){
        console.log(resp);
        if(resp.status=='ok'){
          Swal.fire('Data Saved!', '', 'success');
          setTimeout(() => {
            location.reload()
          }, 2000);
        }
        else{
          Swal.fire('Something Went Wrong!', '', 'error');
          return false;
        }
      })
    }
  });
  $('#quickForm').validate({
    rules: {
      title: {
        required: true,
        minlength: 3

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
  $(function () {
    
    var table = $('#example1').DataTable({
      
        processing: true,
        serverSide: true,
        ajax: "{{ route('faq-heads') }}",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'title', name: 'title'},
            {data: 'parent', name: 'parent'},
            {data: 'action', name: 'action', orderable: false, searchable: true},
        ]
    });
    //console.log(table);
    
  });

          
    </script>
@stop
