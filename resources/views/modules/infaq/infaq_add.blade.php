@extends('layouts.template')

@section('content')
      <!-- Breadcrumb -->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item">Infaq</li>
        <li class="breadcrumb-item active">Add</li>
      </ol>

      <div class="container-fluid">
        <div class="animated fadeIn">
          
          <div class="row">
            <div class="col-lg-6">
              <form id="form">
                <div class="card">
                  <div class="card-header">
                    <strong>Infaq</strong>
                    <small>Form</small>
                  </div>
                  <div class="card-body">

                      <div class="row">
                        <div class="col-sm-12">
                          <div class="form-group">
                            <label for="id_peserta">Peserta</label>
                            <select class="form-control" name="id_peserta" id="id_peserta" required="">
                              
                              
                            </select>
                          </div>
                        </div>
                      </div>
                      <!--/.row-->

                      <div class="row">
                        <div class="col-sm-12">
                          <div class="form-group">
                            <label for="name">Nominal</label>
                            <input type="text" class="form-control" id="nominal" id="nominal" placeholder="" required="">
                          </div>
                        </div>
                      </div>
                      <!--/.row-->
                      
                  </div>
                  <div class="card-footer">
                    <a href="{{ url('infaq') }}" class="btn btn-outline-secondary pull-left" id="btnCancel"> <i class="icon-arrow-left"></i> Back</a>
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
      $(function(){

        // get list peserta
        $.ajax({
           type:'GET',
           url:'{{ url("api/peserta") }}',
           success:function(response){
              if (response.length) {
                var opts =  '<option value="" selected="" disabled=""> -- Pilih Peserta -- </option>';
                $.each(response, function(index, value){
                  opts += '<option value="'+ value.id +'">'+ value.id +'</option>';
                });

                $('#id_peserta').html(opts);

              } else {
                alert('error!');
              }
           }
        });
        
        $("#form").on('submit', function(e){
            e.preventDefault();
            
            var id_peserta      = $("#id_peserta").val();
            var nominal         = $("#nominal").val();
            var tanggal         = '{{ date('Y-m-d') }}';
            var id_user         = '{{ Auth::user()->id }}';

            var objRequest = {
              'request' : {
                'id_peserta'  : id_peserta,
                'nominal'     : nominal,
                'tanggal'     : tanggal,
                'id_user'     : id_user
              }
            };

            console.log(objRequest);
            
            $.ajax({
               type:'POST',
               url:'{{ url("api/infaq/add") }}',
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

      });
      </script>
@endsection