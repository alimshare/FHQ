@extends('layouts.template')

@section('content')
      <!-- Breadcrumb -->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item active">Level</li>
      </ol>

      <div class="container-fluid">
        <div class="animated fadeIn">
          
          <div class="row">
            
            <div class="col-lg-12">
              <div class="card">
                <div class="card-header">
                  <i class="fa fa-align-justify"></i> List Peserta
                  <div class="pull-right">
                  </div>
                </div>
                <div class="card-body">
                
                  <table class="table table-responsive-sm table-bordered datatable table-sm">
                    <thead>
                      <tr>
                        <th>Tingkatan</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>

                      @foreach ( $list as $key => $value )
                        <tr>
                          <td>{{ $value['nama'] }} </td>
                          <td>
                            <a href="#" class="btn btn-primary btn-sm">View</a>
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
@endsection