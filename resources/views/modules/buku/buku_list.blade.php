@extends('layouts.template')

@section('content')
      <!-- Breadcrumb -->
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ url('master') }}">Master</a></li>
        <li class="breadcrumb-item active">Buku</li>
      </ol>

      <div class="container-fluid">
        <div class="animated fadeIn">
          
          <div class="row">
            
            <div class="col-lg-12">
              <div class="card">
                <div class="card-header">
                  <i class="fa fa-align-justify"></i> List Buku
                  <div class="pull-right">
                    <a href="{{ url('buku/export') }}" class="btn btn-success" title="Export CSV"> <i class="fa fa-file-excel-o"></i> Export</a>
                    <a href="{{ url('buku/add') }}" class="btn btn-primary"> <i class="fa fa-plus"></i> Add</a>
                  </div>
                </div>
                <div class="card-body">
                
                  <table class="table table-responsive-sm table-bordered" width="100%">
                    <thead>
                      <tr>
                        <th>Judul</th>
                        <th>Harga</th>
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
      <script type="text/javascript">

        $(function(){
          $('.table').DataTable({
              processing: true,
              serverSide: true,
              ajax: "{{ url('buku/datatables') }}"  ,
              columns: [
                { data: 'judul', name: 'judul'},
                { data: 'harga', name: 'harga'},
                { data: 'action', name: 'action', orderable: false, searchable: false}
              ]
          });
        });

        $("table").on('click', '.btnDelete', function(){
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
               url:'{{ url("api/buku/remove") }}/'+id,
               data: JSON.stringify(objRequest),
               success:function(response){
                  if (response.errorCode == "00") {
                    alert('success');
                    window.location.href = "{{ url('buku') }}";
                  } else {
                    console.log(response.errorCode + " : "+ response.message);
                  }
               }
            });
        });

      </script>
@endsection