@extends('layouts.template')

@section('content')
      <!-- Breadcrumb -->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item">Semester</li>
        <li class="breadcrumb-item active">View</li>
      </ol>

      <div class="container-fluid">
        <div class="animated fadeIn">
          
          <div class="row">
            <div class="col-lg-6">
              <div class="card">
                <div class="card-header">
                  <strong>Semester</strong>
                  <small>Detail</small>
                </div>
                <div class="card-body">
                  <div class="row">

                    <div class="col-sm-12">

                      <table class="table table-bordered">
                        <tr>
                          <th>Angkatan</th>
                          <td>{{ $object->nama }}</td>
                        </tr>
                        <tr>
                          <th>Deskripsi</th>
                          <td>{{ $object->deskripsi }}</td>
                        </tr>
                        <tr>
                          <th>Tanggal Mulai</th>
                          <td>{{ $object->tanggal_mulai }}</td>
                        </tr>
                        <tr>
                          <th>Tanggal Selesai</th>
                          <td>{{ $object->tanggal_selesai }}</td>
                        </tr>
                      </table>

                    </div>

                  </div>
                  <!--/.row-->

                </div>
                <div class="card-footer">
                  <a href="{{ url('semester') }}" class="btn btn-outline-secondary pull-left" id="btnCancel"> <i class="icon-arrow-left"></i> Back</a>
                  <a href="{{ url('semester/edit/'.$object->id) }}" class="btn btn-outline-success pull-right" id="btnSave"> <i class="fa fa-pencil"></i> Edit</a>
                </div>
              </div>

            </div>
            <!--/.col-->

          </div>

        </div>

      </div>
@endsection