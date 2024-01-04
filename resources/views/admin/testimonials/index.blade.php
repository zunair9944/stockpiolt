@extends('layouts.admin.default')
@section('content')
@include('includes.admin.dataTableCss')
@include('includes.admin.breadcrumb')
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
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
                        <th>Subject</th>
                        <th>Description</th>
                        <th>Rating</th>
                        <th>Client</th>
                        <th>Image</th>
                        <th>company Logo</th>
                        <th>Date</th>
                        <th width="100px">Action</th>
                    </tr>
                </thead>
                <tbody></tbody>
                 
                  <tfoot>
                  <tr>
                        <th>ID</th>
                        <th>Subject</th>
                        <th>Description</th>
                        <th>Rating</th>
                        <th>Client</th>
                        <th>Image</th>
                        <th>company Logo</th>
                        <th>Date</th>
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

  @include('includes.admin.footer')
  @include('includes.admin.scripts')
  @include('includes.admin.dataTableScripts')
    <script type="text/javascript">
      $(function () {
        
        var table = $('#example1').DataTable({
          
            processing: true,
            serverSide: true,
            ajax: "{{ route('testimonials') }}",
            columns: [
                {data: 'id', name: 'id'},
                {data: 'subject', name: 'subject'},
                {data: 'body', width:'15%', name: 'body'},
                {data: 'star_rating', name: 'star_rating'},
                {data: 'client', name: 'client'},
                {data: 'thumbnail', name: 'thumbnail'},
                {data: 'company_logo', name: 'company_logo'},
                {data: 'created_at', name: 'created_at'},
                {data: 'action', name: 'action', orderable: false, searchable: true},
            ]
        });
        //console.log(table);
      });
          
    </script>
@stop
