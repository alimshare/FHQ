@extends('layouts.template')

@section('content')

<!-- Breadcrumb -->
<ol class="breadcrumb">
	<li class="breadcrumb-item">Home</li>
	<li class="breadcrumb-item">Laporan</li>
</ol>

<div class="container-fluid">
	<div class="animated fadeIn">
      <div class="row">
        <div class="col-lg-12">
            <div class="card">
              <!-- <div class="card-header">
                <strong>Laporan</strong>
              </div> -->

              <div class="card-body">
                  <h5>Laporan</h5><hr>
                  
                  <div class="row">

                    <div class="col-6 col-md-4 col-lg-3">
                      <a href="{{ url('laporan/jadwal') }}" style="text-decoration:none" class="">
                      <div class="card">
                        <div class="card-body">
                            <div class="h1 text-center mb-2">
                              <i class="icon-grid"></i>
                            </div>
                            <br>
                            <div class="h5 mb-0 text-center">Cetak Jadwal</div>
                        </div>
                      </div>
                      </a>
                    </div>
                  	
                  </div>

              </div>
            </div>
        </div>
    </div>

	</div>
</div>

@endsection