@extends('layouts.template')

@section('content')
      <!-- Breadcrumb -->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item">Pembelian</li>
        <li class="breadcrumb-item active">View</li>
      </ol>

      <div class="container-fluid">
        <div class="animated fadeIn">
          
          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-header">
                  <strong>Pembelian</strong>
                  <small>Detail</small>
                </div>
                <div class="card-body">
                  <div class="row">

                    <div class="col-sm-6">

                      <table class="table table-bordered">
                        <tr>
                          <th>Tanggal</th>
                          <td>{{ $object->tanggal }}</td>
                        </tr>
                        <tr>
                          <th>Nomor Transaksi</th>
                          <td>{{ $object->nomor_transaksi }}</td>
                        </tr>
                        <tr>
                          <th>Deskripsi</th>
                          <td>{{ $object->deskripsi }}</td>
                        </tr>
                        <tr>
                          <th>Staff</th>
                          <td>{{ $object->getStaff()->name }}</td>
                        </tr>
                        <tr>
                          <th>Total</th>
                          <td>Rp. {{ number_format($object->getTotal()) }}</td>
                        </tr>
                      </table>

                    </div>

                  </div>
                  <!--/.row-->

                  <div class="row">
                    <div class="col-sm-12">
                      <h4><i class="fa fa-shopping-cart"> |</i> Detail <small>Transaksi</small> </h4><hr>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-12">
                      <table class="table table-bordered">
                        <tr class="text-center">
                          <th class="text-left">No</th>
                          <th>Barang</th>
                          <th>Harga</th>
                          <th>Qty</th>
                          <th>Total</th>
                        </tr>
                        <tbody class="">
                          <?php $no = 1; ?>
                          @foreach ( $object->getDetail() as $key => $detail )
                            <tr>
                              <td>{{ $no++ }}</td>
                              <td>{{ $detail->getBuku()->judul }}</td>
                              <td class="text-right">{{ number_format($detail->harga) }}</td>
                              <td class="text-right">{{ $detail->qty }}</td>
                              <td class="text-right">{{ number_format($detail->harga * $detail->qty) }}</td>
                            </tr>                          
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>

                </div>
                <div class="card-footer">
                  <a href="{{ url('pembelian') }}" class="btn btn-outline-secondary pull-left" id="btnCancel"> <i class="icon-arrow-left"></i> Back</a>
                </div>
              </div>

            </div>
            <!--/.col-->

          </div>

        </div>

      </div>
@endsection