@extends('layouts.template')

@section('title', ' - User')

@section('content')
      <!-- Breadcrumb -->
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ url('master') }}">Master</a></li>
        <li class="breadcrumb-item active">User</li>
      </ol>

      <div class="container-fluid">
        <div class="animated fadeIn">
          <div class="row">
            
            <div class="col-lg-12">
              <div class="card">
                <div class="card-header">
                  <i class="fa fa-align-justify"></i> List User
                  <div class="pull-right">
                    <a href="{{ url('user/export') }}" class="btn btn-success" title="Export CSV"> <i class="fa fa-file-excel-o"></i> Export</a>
                    <a href="{{ url('user/add') }}" class="btn btn-primary"> <i class="fa fa-plus"></i> Add</a>
                  </div>
                </div>
                <div class="card-body">

                  @if (session('status'))
                    <div class="alert alert-{{ session('type','info') }}">
                        {{ session('status') }}
                    </div>
                  @endif
                
                  <table class="table table-responsive-sm table-bordered" width="100%">
                    <thead>
                      <tr>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                  </table>

                </div>
              </div>
            </div>
            <!--/.col-->

          </div>

        </div>

      </div>



      <div class="modal fade" id="dangerModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-danger" role="document">
          <form id="form" method="post" action="{{ url('user/remove') }}">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Confirmation Delete</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">
                <p>Are you sure want to delete this data ?</p>
                <input type="hidden" name="id" id="id">
                {{ csrf_field() }}
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="btnClose">Close</button>
                <button type="submit" class="btn btn-danger" id="btnDelete">Delete</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </form>
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

      <div class="modal fade" id="resetPasswordModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-warning" role="document">
          <form id="formReset" method="post" action="{{ url('user/reset_password') }}">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Confirmation Reset Password</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">
                <p>Are you sure want to reset password of the user ?</p>
                <span class="" style="color: red">*</span> Default Password : <strong>password</strong>
                <input type="hidden" name="id" id="resetId">
                {{ csrf_field() }}
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="btnClose">Close</button>
                <button type="submit" class="btn btn-warning" id="btnDelete">Reset Password</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </form>
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

@endsection


@section('footer-script')
<script src="{{ url('/') }}/dist/vendors/datatables/js/jquery.dataTables.js"></script>
<script src="{{ url('/') }}/dist/vendors/datatables/js/DataTablesBS4.js"></script>
      <script type="text/javascript">
    
    if ($('.datatable').length > 0) {
      $('.datatable').DataTable();
    }
        $(function(){
          $('.table').DataTable({
              processing: true,
              serverSide: true,
              ajax: '{{ url('user/datatables') }}',
              columns: [
                { data: 'name', name: 'name'},
                { data: 'email', name: 'email' },
                { data: 'action', name: 'action', orderable: false, searchable: false}
              ]
          });
        });

        $("table").on('click', '.btnDelete', function(){
          var id = $(this).attr('data-id');
          $("#id").val(id);
          $("#btnClose").focus();
        });

        $("table").on('click', '.btnReset', function(){
          var id = $(this).attr('data-id');
          $("#resetId").val(id);
          $("#btnClose").focus();
        });

      </script>
@endsection