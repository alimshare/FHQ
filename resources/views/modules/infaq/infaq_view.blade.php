@extends('layouts.template')

@section('content')
      <!-- Breadcrumb -->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item">Infaq</li>
        <li class="breadcrumb-item active">View</li>
      </ol>

      <div class="container-fluid">
        <div class="animated fadeIn">
          
          <div class="row">
            <div class="col-lg-6">
              <div class="card">
                <div class="card-header">
                  <strong>Infaq</strong>
                  <small>Detail</small>
                </div>
                <div class="card-body">
                  <div class="row">

                    <div class="col-sm-12">

                      <table class="table table-bordered">
                        <tr>
                          <th>Tanggal</th>
                          <td>{{ $object->tanggal }}</td>
                        </tr>
                        <tr>
                          <th>Peserta</th>
                          <td>{{ $object->getPeserta()->getSantri()->nomor_induk .' - '. $object->getPeserta()->getSantri()->nama }}</td>
                        </tr>
                        <tr>
                          <th>Nominal</th>
                          <td>{{ number_format($object->nominal) }}</td>
                        </tr>
                        <tr>
                          <th>Staff</th>
                          <td>{{ $object->getStaff()->name }}</td>
                        </tr>
                      </table>

                    </div>

                  </div>
                  <!--/.row-->

                </div>
                <div class="card-footer">
                  <a href="{{ url('infaq') }}" class="btn btn-outline-secondary pull-left" id="btnCancel"> <i class="icon-arrow-left"></i> Back</a>
                  <!-- <a href="{{ url('infaq/edit/'.$object->id) }}" class="btn btn-outline-success pull-right" id="btnSave"> <i class="fa fa-pencil"></i> Edit</a> -->
                </div>
              </div>

            </div>
            <!--/.col-->

          </div>

        </div>

      </div>
@endsection