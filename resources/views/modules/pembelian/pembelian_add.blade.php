@extends('layouts.template')

@section('content')
      <!-- Breadcrumb -->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item">Pembelian</li>
        <li class="breadcrumb-item active">Add</li>
      </ol>

      <div class="container-fluid">
        <div class="animated fadeIn">
          
          <div class="row">
            <div class="col-lg-12">
              <form id="form" action="{{ url('pembelian/add') }}" method="POST">
                {{ csrf_field() }}
                <div class="card">
                  <div class="card-header">
                    <strong>Pembelian</strong>
                    <small>Form</small>
                  </div>
                  <div class="card-body">

                      @if (session('status'))
                        <div class="alert alert-{{ session('type','info') }}">
                            {!! session('status') !!}
                        </div>
                      @endif

                      <div class="row">

                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-sm-12">
                              <!-- <div class="form-group">
                                <label for="name">Tanggal</label>
                                <input type="text" class="form-control" id="tanggal" id="tanggal" placeholder="" required="">
                              </div> -->
                              <div class="form-group">
                                <label for="tanggal" class="col-form-label">Tanggal</label>
                                <div class="input-group">
                                  <input type="text" id="tanggal" name="tanggal" class="form-control" placeholder="Tanggal" required="" value="{{ date('Y-m-d') }}" readonly="">
                                  <div class="input-group-append">
                                    <button class="btn btn-default" type="button" id="btnCalendar"><i class="fa fa-calendar"></i></button>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm-12">
                              <div class="form-group">
                                <label for="nomor_transaksi" class="col-form-label">Nomor Transaksi</label>
                                <input type="text" class="form-control" name="nomor_transaksi" id="nomor_transaksi" placeholder="">
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="col-md-6">                          
                          <div class="row">
                            <div class="col-sm-12">
                              <div class="form-group">
                                <label for="deskripsi" class="col-form-label">Deskripsi</label>
                                <textarea class="form-control" id="deskripsi" name="deskripsi" placeholder="" rows="5"></textarea>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      
                      <div class="row">
                        <div class="col-sm-12">
                          <h4><i class="fa fa-shopping-cart"> |</i> Detail <small>Transaksi</small> </h4><hr>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-sm-12">
                          <table class="table table-bordered" id="tableDetail">
                            <thead class="text-center">
                              <th>Barang</th>
                              <th width="20%">Harga</th>
                              <th width="10%">Jumlah</th>
                              <th width="25%">Total</th>
                              <th width="5%"></th>
                            </thead>
                            <tbody id="tableDetailBody">
                            </tbody>
                            <tfoot>
                              <tr>
                                <td colspan="5" class="text-center">
                                  <button type="button" class="btn btn-success btn-sm btn-block" onclick="createRow()"> <i class="fa fa-plus"></i> Add</button>
                                </td>
                              </tr>
                              <tr>
                                <td colspan="3" class="text-right"><strong>Total</strong></td>
                                <td class="text-right" id="tableDetailTotal">0</td>
                              </tr>
                            </tfoot>
                          </table>
                        </div>
                      </div>


                      <div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-secondary" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h4 class="modal-title">Confirmation</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">×</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                Total yang harus dibayarkan : 
                                <div class="text-center" id="confirmationTotalPrice" style="font-size: 3em"><strong>Rp. 0</strong></div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="btnClose">Close</button>
                                <button type="submit" class="btn btn-primary" id="btnSave">Bayar</button>
                              </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                      </div>
                      <!-- /.modal -->

                  </div>
                  <div class="card-footer">
                    <a href="{{ url('pembelian') }}" class="btn btn-outline-secondary pull-left" id="btnCancel"> <i class="icon-arrow-left"></i> Back</a>
                    <button type="button" class="btn btn-outline-primary pull-right" id="btnConfirmation" data-toggle="modal" data-target="#confirmationModal"> <i class="fa fa-save"></i> Proses</button>
                  </div>
                </div>

              </form>
            </div>
            <!--/.col-->

          </div>

        </div>

      </div>
@endsection

@section('head-script')
  <link href="{{ url('/') }}/dist/vendors/select2/select2/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('footer-script')
  <script src="{{ url('/') }}/dist/vendors/select2/select2/dist/js/select2.min.js"></script>
  <script type="text/javascript">
    
    var listBuku = {!! $listBuku !!};//[{"id_buku":"1","harga":10000,"nama":"Buku 01"}];
    var data = $.map(listBuku, function (obj) {
      obj.id = obj.id + '|' + obj.harga; 
      obj.text = obj.judul; // replace name with the property used for the text
      return obj;
    });

    // $("#form").on('submit', function(e){
    //     e.preventDefault();
        
    //     var judul           = $("#judul").val();
    //     var pengarang       = $("#pengarang").val();
    //     var tahun_terbit    = $("#tahun_terbit").val();
    //     var harga           = $("#harga").val();
    //     var deskripsi       = $("#deskripsi").val();

    //     var objRequest = {
    //       'request' : {
    //         'judul'      : judul,
    //         'pengarang' : pengarang,
    //         'tahun_terbit' : tahun_terbit,
    //         'harga'     : harga,
    //         'deskripsi' : deskripsi
    //       }
    //     };

    //     console.log(objRequest);
        
    //     $.ajax({
    //        type:'POST',
    //        url:'{{ url("api/pembelian/add") }}',
    //        data: JSON.stringify(objRequest),
    //        success:function(response){
    //           if (response.errorCode == "00") {
    //             alert('success');
    //             window.location.href = "{{ url('pembelian') }}";
    //           } else {
    //             console.log(response.errorCode + " : "+ response.message);
    //           }
    //        }
    //     });
    // });

    function createRow(){
        var row = document.createElement('tr');

        var col1 = document.createElement('td');
        var col2 = document.createElement('td');
        var col3 = document.createElement('td');
        var col4 = document.createElement('td');
        var col5 = document.createElement('td');

        row.appendChild(col1); // append first column to row
        row.appendChild(col2); // append second column to row
        row.appendChild(col3); // append second column to row
        row.appendChild(col4); // append second column to row
        row.appendChild(col5); // append second column to row

        var selectBuku = "<select name='buku[]' class='form-control select2'><option></option></select>";

        col1.innerHTML= selectBuku;
        col2.innerHTML= "<input type='text' name='harga[]' class='form-control text-right' value='0' onchange='updatePrice(this)' readonly=''>";
        col3.innerHTML= "<input type='text' name='qty[]' class='form-control text-right' value='0' onchange='updatePrice(this)'>";
        col4.innerHTML= "0";
        col5.innerHTML= "<button class='btn btn-sm btn-danger' type='button' onclick='remove(this)'><i class='fa fa-times'></i></button>";

        col4.classList.add("text-right");

        var table = document.getElementById("tableDetailBody"); // find table to append to
        table.appendChild(row); // append row to table

        initSelect2();
    }

    function remove(x){
      var rowIndex = x.parentNode.parentNode.rowIndex;
      document.getElementById("tableDetail").deleteRow(rowIndex);
    }

    function updatePrice(x){
      var rowIndex = x.parentNode.parentNode.rowIndex;
      var tbl = document.getElementById("tableDetail");
      var row = tbl.rows[rowIndex].cells;

      var cell1 = (row[1].getElementsByTagName('input')[0].value).replace(/[^0-9.]/g,'');
      var cell2 = (row[2].getElementsByTagName('input')[0].value);

      var total = cell1 * cell2;
      row[3].innerHTML = Number(total.toFixed(1)).toLocaleString();

      sum();
    }

    function sum(){
      var tbl = document.getElementById("tableDetail");
      var rows = tbl.tBodies.tableDetailBody.rows;

      var total = 0;
      for (var i=0; i<rows.length; i++){
        var value = (rows[i].cells[3].innerHTML).replace(/[^0-9.]/g,'');
        total += parseInt(value,10);
      }
      console.log(total);
      var strTotal = Number(total.toFixed(1)).toLocaleString();
      document.getElementById("tableDetailTotal").innerHTML = strTotal;
      document.getElementById("confirmationTotalPrice").innerHTML= "<strong>Rp. "+strTotal+"</strong>";

    }

    function initSelect2(){
      $(".select2").select2({
        placeholder: 'Pilih Buku',
        data : data
      });

      // Bind an event
      $('.select2').on('select2:select', function (e) { 
          var harga = e.params.data.harga;
          this.parentNode.nextSibling.getElementsByTagName('input')[0].value = Number(harga.toFixed(1)).toLocaleString();
      });
    }

  </script>
@endsection