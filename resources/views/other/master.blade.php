@extends('layouts.template')

@section('content')
      <!-- Breadcrumb -->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item active">Master</li>
      </ol>

      <div class="container">

        <div class="animated fadeIn">
          <div class="row">
            <div class="col-sm-12">
              <div class="card">
                <!-- <div class="card-header" style="text-align: center"><h5>Master</h5></div> -->
                <div class="card-body">
                  <h5>Master</h5><hr>
                  <div class="row">

                    <div class="col-6 col-md-4 col-lg-3">
                      <a href="{{ url('santri') }}" style="text-decoration:none">
                      <div class="card text-white bg-primary">
                        <div class="card-body">
                            <div class="h1 text-muted text-right mb-2">
                              <i class="icon-people"></i>
                            </div>
                            <div class="h5 mb-0">Santri</div>
                        </div>
                      </div>
                      </a>
                    </div>

                    <div class="col-6 col-md-4 col-lg-3">
                      <a href="{{ url('pengajar') }}" style="text-decoration:none">
                      <div class="card text-white bg-primary">
                        <div class="card-body">
                            <div class="h1 text-muted text-right mb-2">
                              <i class="icon-people"></i>
                            </div>
                            <div class="h5 mb-0">Pengajar</div>
                        </div>
                      </div>
                      </a>
                    </div>

                    <div class="col-6 col-md-4 col-lg-3">
                      <a href="{{ url('user') }}" style="text-decoration:none">
                      <div class="card text-white bg-primary">
                        <div class="card-body">
                            <div class="h1 text-muted text-right mb-2">
                              <i class="icon-people"></i>
                            </div>
                            <div class="h5 mb-0">Staff</div>
                        </div>
                      </div>
                      </a>
                    </div>

                    <div class="col-6 col-md-4 col-lg-3">
                      <a href="{{ url('buku') }}" style="text-decoration:none">
                      <div class="card text-white bg-primary">
                        <div class="card-body">
                            <div class="h1 text-muted text-right mb-2">
                              <i class="icon-book-open"></i>
                            </div>
                            <div class="h5 mb-0">Buku</div>
                        </div>
                      </div>
                      </a>
                    </div>

                    <div class="col-6 col-md-4 col-lg-3">
                      <a href="{{ url('level') }}" style="text-decoration:none">
                      <div class="card text-white bg-primary">
                        <div class="card-body">
                            <div class="h1 text-muted text-right mb-2">
                              <i class="icon-layers"></i>
                            </div>
                            <div class="h5 mb-0">Level</div>
                        </div>
                      </div>
                      </a>
                    </div>

                    <div class="col-6 col-md-4 col-lg-3">
                      <a href="{{ url('semester') }}" style="text-decoration:none">
                      <div class="card text-white bg-primary">
                        <div class="card-body">
                            <div class="h1 text-muted text-right mb-2">
                              <i class="icon-graduation"></i>
                            </div>
                            <div class="h5 mb-0">Semester</div>
                        </div>
                      </div>
                      </a>
                    </div>

                    <!-- <div class="col-6 col-md-4 col-lg-3">
                      <a onclick="alert('coming soon')" style="text-decoration:none">
                      <div class="card text-white bg-primary">
                        <div class="card-body">
                            <div class="h1 text-muted text-right mb-2">
                              <i class="icon-map"></i>
                            </div>
                            <div class="h5 mb-0">Lokasi</div>
                        </div>
                      </div>
                      </a>
                    </div> -->

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
      <!-- /.conainer-fluid -->
@endsection