@extends('layouts.template')

@section('content')
      <!-- Breadcrumb -->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item">Kelas</li>
        <li class="breadcrumb-item active">View</li>
      </ol>

      <div class="container-fluid">
        <div class="animated fadeIn">
          
          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-header">
                  <strong>Kelas</strong>
                  <small>Detail</small>
                </div>
                <div class="card-body">
                  <div class="row">

                    <div class="col-lg-6">

                      <table class="table table-bordered">
                        <tr>
                          <th>Semester</th>
                          <td>{{ $object->getSemester()->nama }}</td>
                        </tr>
                        <tr>
                          <th>Level</th>
                          <td>{{ $object->getLevel()->nama }}</td>
                        </tr>
                        <tr>
                          <th>Pengajar</th>
                          <td>{{ $object->getPengajar()->nama }}</td>
                        </tr>
                        <tr>
                          <th>Hari</th>
                          <td>{{ $object->hari }}</td>
                        </tr>
                      </table>

                    </div>

                    <div class="col-lg-6">
                      <h4>Peserta</h4>

                      <table class="table table-bordered table-sm">
                        <tr style="background-color: #f0f3f5; text-align: center;">
                          <th>NIS</th>
                          <th>Nama</th>
                          <th>Action</th>
                        </tr>
                        @foreach ( $list as $key => $value )
                          <tr>
                            <td>{{ $value->getSantri()->nomor_induk or '-' }} </td>
                            <td>{{ $value->getSantri()->nama or '-' }} </td>
                            <td>
                              <a href="{{ url('/peserta/view/'.$value->id) }}" class="btn btn-outline-primary btn-sm">View</a>
                            </td>
                          </tr>
                        @endforeach
                      </table>
                    </div>

                  </div>
                  <!--/.row-->

                </div>
                <div class="card-footer">
                  <a href="{{ url('kelas') }}" class="btn btn-outline-secondary pull-left" id="btnCancel"> <i class="icon-arrow-left"></i> Back</a>
                  <a href="{{ url('kelas/edit/'.$object->id) }}" class="btn btn-outline-success pull-right" id="btnSave"> <i class="fa fa-pencil"></i> Edit</a>
                </div>
              </div>

            </div>
            <!--/.col-->

          </div>

        </div>

      </div>
@endsection