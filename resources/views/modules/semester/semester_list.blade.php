@extends('layouts.template')

@section('content')
      <!-- Breadcrumb -->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item active">Semester</li>
      </ol>

      <div class="container-fluid">
        <div class="animated fadeIn">
          
          <div class="row">
            
            <div class="col-lg-12">
              <div class="card">
                <div class="card-header">
                  <i class="fa fa-align-justify"></i> List Semester
                  <div class="pull-right">
                    <a href="semester/add" class="btn btn-primary"> <i class="fa fa-plus"></i> Add</a>
                  </div>
                </div>
                <div class="card-body">
                
                  <table class="table table-responsive-sm table-bordered datatable">
                    <thead>
                      <tr>
                        <th>Angkatan</th>
                        <th>Periode</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>

                      @foreach ( $list as $key => $value )
                        <tr>
                          <td>{{ $value['nama'] ." - ". $value['deskripsi'] }} </td>
                          <td>{{ $value['tanggal_mulai'] }}</td>
                          <td>
                            @if ($value->status != '')
                              <span class="badge badge-primary">Active</span>
                            @endif
                          </td>
                          <td>
                            <a href="{{ url('/semester/view/'.$value->id) }}" class="btn btn-outline-primary btn-sm">View</a>
                            <a href="{{ url('/semester/edit/'.$value->id) }}" class="btn btn-success btn-sm">Edit</a>
                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#dangerModal">Delete</button>
                          </td>
                        </tr>
                      @endforeach

                    </tbody>
                  </table>

                </div>
              </div>
            </div>
            <!--/.col-->

          </div>

        </div>

      </div>



      <div class="modal fade" id="dangerModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-danger" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Confirmation Delete</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Are you sure want to delete this data ?</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-danger">Delete</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

@endsection