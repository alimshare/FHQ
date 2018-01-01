@extends('layouts.template')

@section('content')
      <!-- Breadcrumb -->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item">Pengajar</li>
        <li class="breadcrumb-item active">View</li>
      </ol>

      <div class="container-fluid">
        <div class="animated fadeIn">
          
          <div class="row">
            <div class="col-lg-6">
              <div class="card">
                <div class="card-header">
                  <strong>Pengajar</strong>
                  <small>Detail</small>
                </div>
                <div class="card-body">
                  <div class="row">

                    <div class="col-sm-12">

                      <table class="table table-bordered">
                        <tr>
                          <th>NIS</th>
                          <td>{{ $object->nomor_induk }}</td>
                        </tr>
                        <tr>
                          <th>Nama</th>
                          <td>{{ $object->nama }}</td>
                        </tr>
                        <tr>
                          <th>Jenis Kelamin</th>
                          <td>{{ $object->jenis_kelamin }}</td>
                        </tr>
                        <tr>
                          <th>Telephone</th>
                          <td>{{ $object->telephone }}</td>
                        </tr>
                        <tr>
                          <th>Email</th>
                          <td>{{ $object->email }}</td>
                        </tr>
                      </table>

                    </div>

                  </div>
                  <!--/.row-->

                </div>
                <div class="card-footer">
                  <a href="{{ url('pengajar') }}" class="btn btn-outline-secondary pull-left" id="btnCancel"> <i class="icon-arrow-left"></i> Back</a>
                  <a href="{{ url('pengajar/edit/'.$object->id) }}" class="btn btn-outline-success pull-right" id="btnSave"> <i class="fa fa-pencil"></i> Edit</a>
                </div>
              </div>

            </div>
            <!--/.col-->

          </div>

        </div>

      </div>
@endsection