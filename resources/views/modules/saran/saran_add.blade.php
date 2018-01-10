@extends('layouts.template')

@section('content')
      <!-- Breadcrumb -->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item">Saran</li>
        <li class="breadcrumb-item active">Add</li>
      </ol>

      <div class="container-fluid">
        <div class="animated fadeIn">
          
          <div class="row">
            <div class="col-lg-6">
              <form id="form">
                <div class="card">
                  <div class="card-header">
                    <strong>Saran</strong>
                    <small>Form</small>
                  </div>
                  <div class="card-body">

                      <div class="row">
                        <div class="col-sm-12">
                          <div class="form-group">
                            <label for="saran">Kritik & Saran</label>
                            <textarea class="form-control" id="saran" name="saran" placeholder="" rows="15" required=""></textarea>
                          </div>
                        </div>
                      </div>
                      <!--/.row-->
                      
                  </div>
                  <div class="card-footer">
                    <a href="{{ url('saran') }}" class="btn btn-outline-secondary pull-left" id="btnCancel"> <i class="icon-arrow-left"></i> Back</a>
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
            
            var saran        = $("#saran").val();
            var id_santri    = '{{ Auth::user()->id }}';

            var objRequest = {
              'request' : {
                'pesan'     : saran,
                'id_santri' : id_santri
              }
            };

            console.log(objRequest);
            
            $.ajax({
               type:'POST',
               url:'{{ url("api/saran/add") }}',
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