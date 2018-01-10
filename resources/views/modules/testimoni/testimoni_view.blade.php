@extends('layouts.template')

@section('content')
      <!-- Breadcrumb -->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item">Testimoni</li>
        <li class="breadcrumb-item active">View</li>
      </ol>

      <div class="container-fluid">
        <div class="animated fadeIn">
          
          <div class="row">
            <div class="col-lg-6">
              <div class="card">
                <div class="card-header">
                  <strong>Testimoni</strong>
                  <small>Detail</small>
                </div>
                <div class="card-body">
                  <div class="row">

                    <div class="col-sm-12">

                      <table class="table table-bordered">
                        <tr>
                          <th>Santri</th>
                          <td>{{ $object->getSantri()->nomor_induk . ' - ' . $object->getSantri()->nama }}</td>
                        </tr>
                        <tr>
                          <th>Testimoni</th>
                          <td>{{ $object->pesan }}</td>
                        </tr>
                        <tr>
                          <th>Tanggal</th>
                          <td>{{ $object->created_at or '-' }}</td>
                        </tr>
                      </table>

                    </div>

                  </div>
                  <!--/.row-->

                </div>
                <div class="card-footer">
                  <a href="{{ url('testimoni') }}" class="btn btn-outline-secondary pull-left" id="btnCancel"> <i class="icon-arrow-left"></i> Back</a>
                </div>
              </div>

            </div>
            <!--/.col-->

          </div>

        </div>

      </div>
@endsection