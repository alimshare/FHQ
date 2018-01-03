@extends('layouts.template')

@section('content')
      <!-- Breadcrumb -->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item">Peserta</li>
        <li class="breadcrumb-item active">View</li>
      </ol>

      <div class="container-fluid">
        <div class="animated fadeIn">
          
          <div class="row">
            <div class="col-lg-6">
              <div class="card">
                <div class="card-header">
                  <strong>Peserta</strong>
                  <small>Detail</small>
                </div>
                <div class="card-body">
                  <div class="row">

                    <div class="col-sm-12">

                      <table class="table table-bordered">
                        <tr>
                          <th>Hari</th>
                          <td>{{ $object->getKelas()->hari }}</td>
                        </tr>
                        <tr>
                          <th>Kelas</th>
                          <td>{{ $object->getKelas()->getLevel()->nama }}</td>
                        </tr>
                        <tr>
                          <th>Pengajar</th>
                          <td>{{ $object->getKelas()->getPengajar()->nama }}</td>
                        </tr>
                        <tr>
                          <th>Santri</th>
                          <td>{{ $object->getSantri()->nama }}</td>
                        </tr>
                      </table>

                    </div>

                  </div>
                  <!--/.row-->

                </div>
                <div class="card-footer">
                  <a href="{{ url('peserta') }}" class="btn btn-outline-secondary pull-left" id="btnCancel"> <i class="icon-arrow-left"></i> Back</a>
                  <a href="{{ url('peserta/edit/'.$object->id) }}" class="btn btn-outline-success pull-right" id="btnSave"> <i class="fa fa-pencil"></i> Edit</a>
                </div>
              </div>

            </div>
            <!--/.col-->

          </div>

        </div>

      </div>
@endsection