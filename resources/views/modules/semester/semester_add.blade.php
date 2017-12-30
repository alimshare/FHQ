@extends('layouts.template')

@section('content')
      <!-- Breadcrumb -->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item">Semester</li>
        <li class="breadcrumb-item active">Add</li>
      </ol>

      <div class="container-fluid">
        <div class="animated fadeIn">
          
          <div class="row">
            <div class="col-lg-6">
              <div class="card">
                <div class="card-header">
                  <strong>Semester</strong>
                  <small>Form</small>
                </div>
                <div class="card-body">
                  <form>

                    <div class="row">
                      <div class="col-sm-12">
                        <div class="form-group">
                          <label for="name">Angkatan</label>
                          <input type="text" class="form-control" id="nama" id="nama" placeholder="">
                        </div>
                      </div>
                    </div>
                    <!--/.row-->

                    <div class="row">
                      <div class="col-sm-12">
                        <div class="form-group">
                          <label for="ccnumber">Deskripsi</label>
                          <input type="text" class="form-control" id="deskripsi" name="deskripsi" placeholder="">
                        </div>
                      </div>
                    </div>
                    <!--/.row-->

                    <div class="row">
                      <div class="form-group col-sm-6">
                        <label for="tanggal_mulai">Tanggal Mulai</label>
                          <input type="text" class="form-control" id="tanggal_mulai" name="tanggal_mulai" placeholder="yyyy-MM-dd">
                        </select>
                      </div>

                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="tanggal_selesai">Tanggal Selesai</label>
                          <input type="text" class="form-control" id="tanggal_selesai" name="tanggal_selesai" placeholder="yyyy-MM-dd">
                        </div>
                      </div>
                    </div>
                    <!--/.row-->
                    
                  </form>
                </div>
                <div class="card-footer">
                  <a href="{{ url('semester') }}" class="btn btn-outline-secondary pull-left" id="btnCancel"> <i class="icon-arrow-left"></i> Back</a>
                  <button type="button" class="btn btn-outline-primary pull-right" id="btnSave"> <i class="fa fa-save"></i> Save</button>
                </div>
              </div>

            </div>
            <!--/.col-->

          </div>

        </div>

      </div>
@endsection

@section('footer-script')
      <script type="text/javascript">
        
        $("#btnSave").click(function(e){
            e.preventDefault();
            
            var angkatan        = $("#nama").val();
            var deskripsi       = $("#deskripsi").val();
            var tanggal_mulai   = $("#tanggal_mulai").val();
            var tanggal_selesai = $("#tanggal_selesai").val();

            var objRequest = {
              'request' : {
                'nama' : angkatan,
                'deskripsi' : deskripsi,
                'tanggal_mulai' : tanggal_mulai,
                'tanggal_selesai' : tanggal_selesai
              }
            };

            console.log(objRequest);
            
            $.ajax({
               type:'POST',
               url:'{{ url("api/semester/add") }}',
               data: JSON.stringify(objRequest),
               success:function(response){
                  if (response.errorCode == "00") {
                    console.log('success');
                  } else {
                    console.log(response.errorCode + " : "+ response.message);
                  }
               }
            });
        });

      </script>
@endsection