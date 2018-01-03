@extends('layouts.template')

@section('content')
      <!-- Breadcrumb -->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item">Peserta</li>
        <li class="breadcrumb-item active">Edit</li>
      </ol>

      <div class="container-fluid">
        <div class="animated fadeIn">
          
          <div class="row">
            <div class="col-lg-6">

              <form id="form">
                <div class="card">
                  <div class="card-header">
                    <strong>Peserta</strong>
                    <small>Edit Form</small>
                  </div>
                  <div class="card-body">

                      <div class="row">
                        <div class="col-sm-12">
                          <div class="form-group">
                            <label for="id_pengajar">Santri</label>
                            <select class="form-control" name="id_santri" id="id_santri" required="">
                              
                              
                            </select>
                          </div>
                        </div>
                      </div>
                      <!--/.row--> 

                      <div class="row">
                        <div class="col-sm-12">
                          <div class="form-group">
                            <label for="id_semester">Kelas</label>
                            <select class="form-control" name="id_kelas" id="id_kelas" required="">
                              
                              
                            </select>
                          </div>
                        </div>
                      </div>
                      <!--/.row-->                     
                      
                  </div>
                  <div class="card-footer">
                    <a href="{{ url('peserta') }}" class="btn btn-outline-secondary pull-left" id="btnCancel"> <i class="icon-arrow-left"></i> Back</a>
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

          // get list kelas with detail
          $.ajax({
             type:'GET',
             url:'{{ url("api/kelas/detail") }}',
             success:function(response){
                if (response.length) {
                  var opts =  '<option value="" selected="" disabled=""> -- Pilih Kelas -- </option>';
                  $.each(response, function(index, value){
                    opts += '<option value="'+ value.id +'">'+ value.hari +' : '+ value.level.nama +' - '+ value.pengajar.nama +'</option>';
                  });

                  $('#id_kelas').html(opts);

                } else {
                  alert('error!');
                }
             }
          });

          // get list santri
          $.ajax({
             type:'GET',
             url:'{{ url("api/santri") }}',
             success:function(response){
                if (response.length) {
                  var opts =  '<option value="" disabled=""> -- Pilih santri -- </option>';
                  var current = {{ $object->id_santri }};
                  $.each(response, function(index, value){
                    var selected = ( current == value.id ? 'selected' : '');                    
                    opts += '<option value="'+ value.id +'" '+selected+'>'+ value.nomor_induk +' - '+ value.nama +'</option>';
                  });

                  $('#id_santri').html(opts);

                } else {
                  alert('error!');
                }
             }
          });

        });
        
        $("#form").on('submit', function(e){
            e.preventDefault();

            var btn_submit = $(this).find('[type=submit]');
                btn_submit.html('<i class="fa fa-save"></i> Saving...');
            
            var id_kelas   = $("#id_kelas").val();
            var id_santri  = $("#id_santri").val();

            var objRequest = {
              'request' : {
                'id_kelas'  : id_kelas,
                'id_santri' : id_santri
              }
            };

            console.log(objRequest);
            
            $.ajax({
               type:'PUT',
               url:'{{ url("api/peserta/update/".$object->id) }}',
               data: JSON.stringify(objRequest),
               success:function(response){
                  if (response.errorCode == "00") {
                    alert('success');
                    window.location.href = "{{ url('peserta') }}";
                  } else {
                    btn_submit.html('<i class="fa fa-save"></i> Save');
                    console.log(response.errorCode + " : "+ response.message);
                  }
               }
            });
        });

      </script>
@endsection