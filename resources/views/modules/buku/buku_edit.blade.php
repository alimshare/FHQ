@extends('layouts.template')

@section('content')
      <!-- Breadcrumb -->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item">Buku</li>
        <li class="breadcrumb-item active">Edit</li>
      </ol>

      <div class="container-fluid">
        <div class="animated fadeIn">
          
          <div class="row">
            <div class="col-lg-6">

              <form id="form">
                <div class="card">
                  <div class="card-header">
                    <strong>Buku</strong>
                    <small>Edit Form</small>
                  </div>
                  <div class="card-body">

                      <div class="row">
                        <div class="col-sm-12">
                          <div class="form-group">
                            <label for="name">Judul</label>
                            <input type="text" class="form-control" id="judul" id="judul" placeholder="" required="" value="{{ $object->judul }}">
                          </div>
                        </div>
                      </div>
                      <!--/.row-->

                      <div class="row">
                        <div class="col-sm-12">
                          <div class="form-group">
                            <label for="name">Pengarang</label>
                            <input type="text" class="form-control" id="pengarang" id="pengarang" placeholder="" value="{{ $object->pengarang }}">
                          </div>
                        </div>
                      </div>
                      <!--/.row-->

                      <div class="row">
                        <div class="col-sm-12">
                          <div class="form-group">
                            <label for="name">Tahun Terbit</label>
                            <input type="text" class="form-control" id="tahun_terbit" id="tahun_terbit" placeholder="" maxlength="4" value="{{ $object->tahun_terbit }}">
                          </div>
                        </div>
                      </div>
                      <!--/.row-->

                      <div class="row">
                        <div class="col-sm-12">
                          <div class="form-group">
                            <label for="name">Harga</label>
                            <input type="text" class="form-control" id="harga" id="harga" placeholder="" value="{{ $object->harga }}">
                          </div>
                        </div>
                      </div>
                      <!--/.row-->

                      <div class="row">
                        <div class="col-sm-12">
                          <div class="form-group">
                            <label for="ccnumber">Deskripsi</label>
                            <textarea class="form-control" id="deskripsi" name="deskripsi" placeholder="" rows="10">{{ $object->judul }}</textarea>
                          </div>
                        </div>
                      </div>
                      <!--/.row-->

                  </div>
                  <div class="card-footer">
                    <a href="{{ url('buku') }}" class="btn btn-outline-secondary pull-left" id="btnCancel"> <i class="icon-arrow-left"></i> Back</a>
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
            
            var judul           = $("#judul").val();
            var pengarang       = $("#pengarang").val();
            var tahun_terbit    = $("#tahun_terbit").val();
            var harga           = $("#harga").val();
            var deskripsi       = $("#deskripsi").val();

            var objRequest = {
              'request' : {
                'judul'      : judul,
                'pengarang' : pengarang,
                'tahun_terbit' : tahun_terbit,
                'harga'     : harga,
                'deskripsi' : deskripsi
              }
            };

            console.log(objRequest);
            
            $.ajax({
               type:'PUT',
               url:'{{ url("api/buku/update/".$object->id) }}',
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