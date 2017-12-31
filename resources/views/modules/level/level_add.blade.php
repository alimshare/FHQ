@extends('layouts.template')

@section('content')
      <!-- Breadcrumb -->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item">Level</li>
        <li class="breadcrumb-item active">Add</li>
      </ol>

      <div class="container-fluid">
        <div class="animated fadeIn">
          
          <div class="row">
            <div class="col-lg-6">
              <form id="form">
                <div class="card">
                  <div class="card-header">
                    <strong>Level</strong>
                    <small>Form</small>
                  </div>
                  <div class="card-body">

                      <div class="row">
                        <div class="col-sm-12">
                          <div class="form-group">
                            <label for="name">Tingkatan</label>
                            <input type="text" class="form-control" id="nama" id="nama" placeholder="" required="">
                          </div>
                        </div>
                      </div>
                      <!--/.row-->

                      <div class="row">
                        <div class="col-sm-12">
                          <div class="form-group">
                            <label for="ccnumber">Deskripsi</label>
                            <textarea class="form-control" id="deskripsi" name="deskripsi" placeholder="" rows="10"></textarea>
                          </div>
                        </div>
                      </div>
                      <!--/.row-->
                      
                  </div>
                  <div class="card-footer">
                    <a href="{{ url('level') }}" class="btn btn-outline-secondary pull-left" id="btnCancel"> <i class="icon-arrow-left"></i> Back</a>
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
            
            var tingkatan       = $("#nama").val();
            var deskripsi       = $("#deskripsi").val();

            var objRequest = {
              'request' : {
                'nama'      : tingkatan,
                'deskripsi' : deskripsi
              }
            };

            console.log(objRequest);
            
            $.ajax({
               type:'POST',
               url:'{{ url("api/level/add") }}',
               data: JSON.stringify(objRequest),
               success:function(response){
                  if (response.errorCode == "00") {
                    alert('success');
                    window.location.href = "{{ url('level') }}";
                  } else {
                    console.log(response.errorCode + " : "+ response.message);
                  }
               }
            });
        });

      </script>
@endsection