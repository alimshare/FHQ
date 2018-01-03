@extends('layouts.template')

@section('content')
      <!-- Breadcrumb -->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item">Kelas</li>
        <li class="breadcrumb-item active">Add</li>
      </ol>

      <div class="container-fluid">
        <div class="animated fadeIn">
          
          <div class="row">
            <div class="col-lg-6">
              <form id="form">
                <div class="card">
                  <div class="card-header">
                    <strong>Kelas</strong>
                    <small>Form</small>
                  </div>
                  <div class="card-body">

                      <div class="row">
                        <div class="col-sm-12">
                          <div class="form-group">
                            <label for="id_semester">Semester</label>
                            <select class="form-control" name="id_semester" id="id_semester" required="">
                              
                              
                            </select>
                          </div>
                        </div>
                      </div>
                      <!--/.row-->

                      <div class="row">
                        <div class="col-sm-12">
                          <div class="form-group">
                            <label for="id_level">Level</label>
                            <select class="form-control" name="id_level" id="id_level" required="">
                              
                              
                            </select>
                          </div>
                        </div>
                      </div>
                      <!--/.row-->

                      <div class="row">
                        <div class="col-sm-12">
                          <div class="form-group">
                            <label for="id_pengajar">Pengajar</label>
                            <select class="form-control" name="id_pengajar" id="id_pengajar" required="">
                              
                              
                            </select>
                          </div>
                        </div>
                      </div>
                      <!--/.row-->

                      <div class="row">
                        <div class="col-sm-12">
                          <div class="form-group">
                            <label for="hari">Hari</label>
                            <input type="text" class="form-control" id="hari" id="hari" placeholder="" required="">
                          </div>
                        </div>
                      </div>
                      <!--/.row-->

                      {{-- <div class="row">
                        <div class="col-sm-12">
                          <div class="form-group">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                          </div>
                        </div>
                      </div>
                      /.row
                      <div class="form-group row">
                        <div class="col-sm-6">
                          <input type="radio" name="jenis_kelamin" value="L" class="flat-blue form-control" checked="" id="chkL"> 
                          <label for="chkL"> Ikhwan (L)</label>
                        </div>
                        <div class="col-sm-6">
                          <input type="radio" name="jenis_kelamin" value="P" class="flat-blue form-control" id="chkP"> 
                          <label for="chkP"> Akhwat (P)</label>
                        </div>
                      </div> --}}
                      
                      
                  </div>
                  <div class="card-footer">
                    <a href="{{ url('kelas') }}" class="btn btn-outline-secondary pull-left" id="btnCancel"> <i class="icon-arrow-left"></i> Back</a>
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

          // get list semester
          $.ajax({
             type:'GET',
             url:'{{ url("api/semester") }}',
             success:function(response){
                if (response.length) {
                  var opts =  '<option value="" selected="" disabled=""> -- Pilih semester -- </option>';
                  $.each(response, function(index, value){
                    opts += '<option value="'+ value.id +'">'+ value.nama +' - '+ value.deskripsi +'</option>';
                  });

                  $('#id_semester').html(opts);

                } else {
                  alert('error!');
                }
             }
          });

          // get list level
          $.ajax({
             type:'GET',
             url:'{{ url("api/level") }}',
             success:function(response){
                if (response.length) {
                  var opts =  '<option value="" selected="" disabled=""> -- Pilih level -- </option>';
                  $.each(response, function(index, value){
                    opts += '<option value="'+ value.id +'">'+ value.nama +'</option>';
                  });

                  $('#id_level').html(opts);

                } else {
                  alert('error!');
                }
             }
          });

          // get list pengajar
          $.ajax({
             type:'GET',
             url:'{{ url("api/pengajar") }}',
             success:function(response){
                if (response.length) {
                  var opts =  '<option value="" selected="" disabled=""> -- Pilih pengajar -- </option>';
                  $.each(response, function(index, value){
                    opts += '<option value="'+ value.id +'">'+ value.nomor_induk +' - '+ value.nama +'</option>';
                  });

                  $('#id_pengajar').html(opts);

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
            
            var id_semester   = $("#id_semester").val();
            var id_level      = $("#id_level").val();
            var id_pengajar   = $("#id_pengajar").val();
            var hari          = $("#hari").val();

            // var jenis_kelamin = '';
            // if ($("#chkL").is( ":checked" )) { jenis_kelamin = 'L'; }
            // if ($("#chkP").is( ":checked" )) { jenis_kelamin = 'P'; }

            var objRequest = {
              'request' : {
                'id_semester' : id_semester,
                'id_level' : id_level,
                'id_pengajar' : id_pengajar,
                'hari' : hari
              }
            };

            console.log(objRequest);
            
            $.ajax({
               type:'POST',
               url:'{{ url("api/kelas/add") }}',
               data: JSON.stringify(objRequest),
               success:function(response){
                  if (response.errorCode == "00") {
                    alert('Success');
                    window.location.href = "{{ url('kelas') }}";
                  } else {
                    btn_submit.html('<i class="fa fa-save"></i> Save');
                    console.log(response.errorCode + " : "+ response.message);
                  }
               }
            });
        });

      </script>
@endsection