@extends('layouts.template')

@section('content')
      <!-- Breadcrumb -->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item active">Dashboard</li>

        <!-- Breadcrumb Menu-->
        <!-- <li class="breadcrumb-menu d-md-down-none">
          <div class="btn-group" role="group" aria-label="Button group">
            <a class="btn" href="#"><i class="icon-speech"></i></a>
            <a class="btn" href="./"><i class="icon-graph"></i> &nbsp;Dashboard</a>
            <a class="btn" href="#"><i class="icon-settings"></i> &nbsp;Settings</a>
          </div>
        </li> -->
      </ol>

      <div class="container-fluid">

        <div class="animated fadeIn">
          <div class="row">
            <div class="col-sm-6 col-lg-3">
              <div class="card">
                <div class="card-body">
                  <div class="h1 text-muted text-right mb-4">
                    <i class="icon-people"></i>
                  </div>
                  <div class="h1 mb-0">{{ $count['kelas'] or '0' }}</div>
                  <small class="text-muted text-uppercase font-weight-bold">Kelas</small>
                </div>
                <div class="card-footer px-3 py-2">
                  <a class="font-weight-bold font-xs btn-block text-muted" href="#">View More <i class="fa fa-angle-right float-right font-lg"></i></a>
                </div>
              </div>
            </div>
            <!--/.col-->

            <div class="col-sm-6 col-lg-3">
              <div class="card">
                <div class="card-body">
                  <div class="h1 text-muted text-right mb-4">
                    <i class="icon-people"></i>
                  </div>
                  <div class="h1 mb-0">{{ $count['peserta'] or '0' }}</div>
                  <small class="text-muted text-uppercase font-weight-bold">Peserta</small>
                </div>
                <div class="card-footer px-3 py-2">
                  <a class="font-weight-bold font-xs btn-block text-muted" href="#">View More <i class="fa fa-angle-right float-right font-lg"></i></a>
                </div>
              </div>
            </div>
            <!--/.col-->

            <div class="col-sm-6 col-lg-3">
              <div class="card">
                <div class="card-body">
                  <div class="h1 text-muted text-right mb-4">
                    <i class="icon-people"></i>
                  </div>
                  <div class="h1 mb-0">{{ $count['pengajar'] or '0' }}</div>
                  <small class="text-muted text-uppercase font-weight-bold">Muwajih</small>
                </div>
                <div class="card-footer px-3 py-2">
                  <a class="font-weight-bold font-xs btn-block text-muted" href="#">View More <i class="fa fa-angle-right float-right font-lg"></i></a>
                </div>
              </div>
            </div>
            <!--/.col-->

            <div class="col-sm-6 col-lg-3">
              <div class="card">
                <div class="card-body">
                  <div class="h1 text-muted text-right mb-4">
                    <i class="icon-people"></i>
                  </div>
                  <div class="h1 mb-0">{{ $count['santri'] or '0' }}</div>
                  <small class="text-muted text-uppercase font-weight-bold">Santri</small>
                </div>
                <div class="card-footer px-3 py-2">
                  <a class="font-weight-bold font-xs btn-block text-muted" href="#">View More <i class="fa fa-angle-right float-right font-lg"></i></a>
                </div>
              </div>
            </div>
            <!--/.col-->
          </div>
          <!--/.row-->

        </div>

      </div>
      <!-- /.conainer-fluid -->
@endsection