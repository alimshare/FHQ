@extends('layouts.template')

@section('content')
      <!-- Breadcrumb -->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item">Saran</li>
        <li class="breadcrumb-item active">Balas</li>
      </ol>

      <div class="container-fluid">
        <div class="animated fadeIn">
          
          <div class="row">
            <div class="col-lg-6">

              <form id="form">
                <div class="card">
                  <div class="card-header">
                    <strong>Saran</strong>
                    <small>Edit Form</small>
                  </div>
                  <div class="card-body">

                      <table class="table table-bordered">
                        <tr>
                          <th>Santri</th>
                          <td>{{ $object->getSantri()->nomor_induk . ' - ' . $object->getSantri()->nama }}</td>
                        </tr>
                        <tr>
                          <th>Pesan</th>
                          <td>{{ $object->pesan }}</td>
                        </tr>
                      </table>

                      <div class="row">
                        <div class="col-sm-12">
                          <div class="form-group">
                            <label for="balas">Balas</label>
                            <textarea class="form-control" id="balas" name="balas" placeholder="" rows="15" required=""></textarea>
                          </div>
                        </div>
                      </div>
                      <!--/.row-->

                  </div>
                  <div class="card-footer">
                    <a href="{{ URL::previous() }}" class="btn btn-outline-secondary pull-left" id="btnCancel"> <i class="icon-arrow-left"></i> Back</a>
                    <button type="submit" class="btn btn-outline-primary pull-right" id="btnSave"> <i class="fa fa-save"></i> Save</button>
                  </div>
                </div>
              </form>

            </div>
            <!--/.col-->
          </div>

        </div>
      </div>

@endsection



@section('footer-script')
      <script type="text/javascript">
        
        $("#form").on('submit', function(e){
            e.preventDefault();
            
            var tanggapi     = $("#balas").val();
            var id_user      = '{{ Auth::user()->id }}';

            var objRequest = {
              'request' : {
                'tanggapan' : tanggapi,
                'id_user' : id_user,
              }
            };

            console.log(objRequest);
            
            $.ajax({
               type:'PUT',
               url:'{{ url("api/saran/update/".$object->id) }}',
               data: JSON.stringify(objRequest),
               success:function(response){
                  if (response.errorCode == "00") {
                    alert('success');
                    window.location.href = "{{ url('saran') }}";
                  } else {
                    console.log(response.errorCode + " : "+ response.message);
                  }
               }
            });
        });

      </script>
@endsection