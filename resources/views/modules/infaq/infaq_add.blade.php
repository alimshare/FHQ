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
                <div class="card">
                  <div class="card-header">
                    <strong>Infaq</strong>
                    <small>Form</small>
                  </div>
                  <div class="card-body">

                    <form id="search">
                      <div class="row">
                        <div class="col-sm-12">
                          <div class="form-group">
                            <label for="id_peserta">Nomor Induk Santri</label>

                            <div class="form-group row">
                              <div class="col-md-12">
                                <div class="input-group">
                                  <input type="text" id="nomor_induk" name="nomor_induk" class="form-control" placeholder="Nomor Induk Santri" maxlength="10">
                                  <span class="input-group-btn">
                                    <button type="submit" class="btn btn-primary" id="btnSearch">Cari</button>
                                  </span>
                                </div>
                              </div>
                            </div>
                            <span id="message"></span>

                          </div>
                        </div>
                      </div>
                      <!--/.row-->
                    </form>

                    <form id="form" style="display: none;">
                      <div class="row" id="rowDetail">
                        <div class="col-sm-12">

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
                      </div>
                      <!--/.row-->
                    </form>
                      
                  </div>
                  <div class="card-footer">
                    <a href="{{ url('infaq') }}" class="btn btn-outline-secondary pull-left" id="btnCancel"> <i class="icon-arrow-left"></i> Back</a>
                    <button type="button" class="btn btn-outline-primary pull-right" id="btnSave" style="display: none"> <i class="fa fa-save"></i> Save</button>
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
      $(function(){

        // search peserta menggunakan nomor_induk santri
        $("#search").on('submit', function(e){
          e.preventDefault();
          var nis = $("#nomor_induk").val();
          
          $.ajax({
             type:'GET',
             url:'{{ url("api/peserta/nis") }}/'+nis,
             success:function(response){

                if (response.length > 0) {
                  
                  $("#form").slideDown();
                  $("#btnSave").show();

                  var opts =  '<option value="" selected="" disabled=""> -- Pilih Peserta -- </option>';
                  $.each(response, function(index, value){
                    opts += '<option value="'+ value.id +'">'+ value.kelas.level.nama +' - '+ value.kelas.pengajar.nama +'</option>';
                  });

                  $('#id_peserta').html(opts);

                } else {

                  $("#form").slideUp();
                  $("#btnSave").hide();
                  $("#message").html('<label style="color:red">'+response.message+'</label>');
                }
             }
          });

        });

        $("#btnSave").click(function(){
          $("#form").submit();
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