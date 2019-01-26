@extends('layouts.template')

@section('content')
      <!-- Breadcrumb -->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item active">Infaq</li>
      </ol>

      <div class="container-fluid">
        <div class="animated fadeIn">
          
          <div class="row">
            
            <div class="col-lg-12">
              <div class="card">
                <div class="card-header">
                  <i class="fa fa-align-justify"></i> List Infaq
                  <div class="pull-right">
                    <a href="{{ url('infaq/export') }}" class="btn btn-success" title="Export CSV"> <i class="fa fa-file-excel-o"></i> Export</a>
                    <a href="{{ url('infaq/add') }}" class="btn btn-primary"> <i class="fa fa-plus"></i> Add</a>
                  </div>
                </div>
                <div class="card-body">
                
                  <table class="table table-responsive-sm table-bordered datatable">
                    <thead>
                      <tr>
                        <th>Tanggal</th>
                        <th>NIS</th>
                        <th>Peserta</th>
                        <th>Kelas</th>
                        <th>Nominal</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>

                      @foreach ( $list as $key => $value )
                        <tr>
                          <td>{{ $value['tanggal'] }} </td>
                          <td>{{ $value->getPeserta()->getSantri()->nomor_induk }}</td>
                          <td>{{ $value->getPeserta()->getSantri()->nama }}</td>
                          <td>{{ $value->getPeserta()->getKelas()->getLevel()->nama }}</td>
                          <td>{{ number_format($value['nominal']) }}</td>
                          <td>
                            <a href="{{ url('/infaq/view/'.$value->id) }}" class="btn btn-outline-primary btn-sm">View</a>
                            <!-- <a href="{{ url('/infaq/edit/'.$value->id) }}" class="btn btn-success btn-sm">Edit</a>
                            <button type="button" class="btn btn-danger btn-sm btnDelete" data-toggle="modal" data-target="#dangerModal" data-id="{{ $value->id }}">Delete</button> -->
                          </td>
                        </tr>
                      @endforeach

                    </tbody>
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
          <form id="form">
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

@endsection


@section('footer-script')
<script src="{{ url('/') }}/dist/vendors/datatables/js/jquery.dataTables.js"></script>
<script src="{{ url('/') }}/dist/vendors/datatables/js/DataTablesBS4.js"></script>
      <script type="text/javascript">
    
    if ($('.datatable').length > 0) {
      $('.datatable').DataTable();
    }

        $(".btnDelete").click(function(){
          var id = $(this).attr('data-id');
          $("#id").val(id);
          $("#btnClose").focus();
        });
        
        $("#form").on('submit', function(e){
            e.preventDefault();            
            var id  = $("#id").val();
            
            var objRequest = {};

            $.ajax({
               type:'DELETE',
               url:'{{ url("api/infaq/remove") }}/'+id,
               data: JSON.stringify(objRequest),
               success:function(response){
                  if (response.errorCode == "00") {
                    alert('success');
                    window.location.href = "{{ url('infaq') }}";
                  } else {
                    console.log(response.errorCode + " : "+ response.message);
                  }
               }
            });
        });

      </script>
@endsection