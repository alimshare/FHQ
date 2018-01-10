@extends('layouts.template')

@section('content')
      <!-- Breadcrumb -->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item">Saran</li>
        <li class="breadcrumb-item active">View</li>
      </ol>

      <div class="container-fluid">
        <div class="animated fadeIn">
          
          <div class="row">
            <div class="col-lg-6">
              <div class="card">
                <div class="card-header">
                  <strong>Saran</strong>
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
                          <th>Pesan</th>
                          <td>{{ $object->pesan }}</td>
                        </tr>
                        <tr>
                          <th>Tanggapan</th>
                          <td>{{ $object->tanggapan or '-' }}</td>
                        </tr>
                        <tr>
                          <th>Staff</th>
                          <td>{{ $object->getStaff()->name or '-' }}</td>
                        </tr>
                      </table>

                    </div>

                  </div>
                  <!--/.row-->

                </div>
                <div class="card-footer">
                  <a href="{{ url('saran') }}" class="btn btn-outline-secondary pull-left" id="btnCancel"> <i class="icon-arrow-left"></i> Back</a>
                  @if ($object->tanggapan == '')
                    <a href="{{ url('/saran/jawab/'.$object->id) }}" class="btn btn-outline-success pull-right">Tanggapi</a>
                  @endif
                </div>
              </div>

            </div>
            <!--/.col-->

          </div>

        </div>

      </div>
@endsection