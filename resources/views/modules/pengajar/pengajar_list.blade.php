@extends('layouts.template')

@section('title', ' - Pengajar')

@section('content')
      <!-- Breadcrumb -->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item active">Pengajar</li>
      </ol>

      <div class="container-fluid">
        <div class="animated fadeIn">
          
          <div class="row">
            
            <div class="col-lg-12">
              <div class="card">
                <div class="card-header">
                  <i class="fa fa-align-justify"></i> List Pengajar
                  <div class="pull-right">
                    <a href="{{ url('pengajar/add') }}" class="btn btn-primary"> <i class="fa fa-plus"></i> Add</a>
                  </div>
                </div>
                <div class="card-body">
                
                  <table class="table table-responsive-sm table-bordered datatable">
                    <thead>
                      <tr>
                        <th>Nomor Induk</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>

                      @foreach ( $list as $key => $value )
                        <tr>
                          <td>{{ $value['nomor_induk'] }} </td>
                          <td>{{ $value['nama'] }}</td>
                          <td>
                            @if ($value->jenis_kelamin == 'L')
                              Ikhwan
                            @elseif ($value->jenis_kelamin == 'P')
                              Akhwat
                            @endif 
                          </td>
                          <td>
                            <a href="{{ url('/pengajar/view/'.$value->id) }}" class="btn btn-outline-primary btn-sm">View</a>
                            <a href="{{ url('/pengajar/edit/'.$value->id) }}" class="btn btn-success btn-sm">Edit</a>
                            @if ($value->status == '')
                              <button type="button" class="btn btn-danger btn-sm btnDelete" data-toggle="modal" data-target="#dangerModal" data-id="{{ $value->id }}">Delete</button>
                            @endif
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
      <script type="text/javascript">

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
               url:'{{ url("api/pengajar/remove") }}/'+id,
               data: JSON.stringify(objRequest),
               success:function(response){
                  if (response.errorCode == "00") {
                    alert('success');
                    window.location.href = "{{ url('pengajar') }}";
                  } else {
                    console.log(response.errorCode + " : "+ response.message);
                  }
               }
            });
        });

      </script>
@endsection