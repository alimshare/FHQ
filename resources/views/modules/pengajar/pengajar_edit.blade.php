@extends('layouts.template')

@section('content')
      <!-- Breadcrumb -->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item">Pengajar</li>
        <li class="breadcrumb-item active">Edit</li>
      </ol>

      <div class="container-fluid">
        <div class="animated fadeIn">
          
          <div class="row">
            <div class="col-lg-6">

              <form id="form">
                <div class="card">
                  <div class="card-header">
                    <strong>Pengajar</strong>
                    <small>Edit Form</small>
                  </div>
                  <div class="card-body">

                      <div class="row">
                        <div class="col-sm-12">
                          <div class="form-group">
                            <label for="nomor_induk">Nomor Induk</label>
                            <input type="text" class="form-control" id="nomor_induk" id="nomor_induk" placeholder="" required="" value="{{ $object->nomor_induk }}" maxlength="10">
                          </div>
                        </div>
                      </div>
                      <!--/.row-->

                      <div class="row">
                        <div class="col-sm-12">
                          <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" class="form-control" id="nama" id="nama" placeholder="" required="" value="{{ $object->nama }}">
                          </div>
                        </div>
                      </div>
                      <!--/.row-->

                      <div class="row">
                        <div class="col-sm-12">
                          <div class="form-group">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                          </div>
                        </div>
                      </div>
                      <!--/.row-->
                      <div class="form-group row">
                        <div class="col-sm-6">
                          <input type="radio" name="jenis_kelamin" value="L" class="flat-blue form-control" id="chkL" @if($object->jenis_kelamin == 'L') checked="" @endif > 
                          <label for="chkL"> Ikhwan (L)</label>
                        </div>
                        <div class="col-sm-6">
                          <input type="radio" name="jenis_kelamin" value="P" class="flat-blue form-control" id="chkP" @if($object->jenis_kelamin == 'P') checked="" @endif> 
                          <label for="chkP"> Akhwat (P)</label>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-sm-12">
                          <div class="form-group">
                            <label for="telephone">Telephone</label>
                            <input type="text" class="form-control" id="telephone" id="telephone" placeholder="" value="{{ $object->telephone }}">
                          </div>
                        </div>
                      </div>
                      <!--/.row-->

                      <div class="row">
                        <div class="col-sm-12">
                          <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" id="email" placeholder="" value="{{ $object->email }}">
                          </div>
                        </div>
                      </div>
                      <!--/.row-->
                      
                  </div>
                  <div class="card-footer">
                    <a href="{{ url('pengajar') }}" class="btn btn-outline-secondary pull-left" id="btnCancel"> <i class="icon-arrow-left"></i> Back</a>
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

            var btn_submit = $(this).find('[type=submit]');
                btn_submit.html('<i class="fa fa-save"></i> Saving...');
            
            var nis             = $("#nomor_induk").val();
            var nama            = $("#nama").val();
            
            var jenis_kelamin = '';
            if ($("#chkL").is( ":checked" )) { jenis_kelamin = 'L'; }
            if ($("#chkP").is( ":checked" )) { jenis_kelamin = 'P'; }

            var telephone       = $("#telephone").val();
            var email           = $("#email").val();

            var objRequest = {
              'request' : {
                'nomor_induk' : nis,
                'nama' : nama,
                'jenis_kelamin' : jenis_kelamin,
                'telephone' : telephone,
                'email' : email
              }
            };

            console.log(objRequest);
            
            $.ajax({
               type:'PUT',
               url:'{{ url("api/pengajar/update/".$object->id) }}',
               data: JSON.stringify(objRequest),
               success:function(response){
                  if (response.errorCode == "00") {
                    alert('success');
                    window.location.href = "{{ url('pengajar') }}";
                  } else {
                    btn_submit.html('<i class="fa fa-save"></i> Save');
                    console.log(response.errorCode + " : "+ response.message);
                  }
               }
            });
        });

      </script>
@endsection