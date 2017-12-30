@extends('layouts.template')

@section('content')
      <!-- Breadcrumb -->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item">Semester</li>
        <li class="breadcrumb-item active">Add</li>
      </ol>

      <div class="container-fluid">
        <div class="animated fadeIn">
          
          <div class="row">
            <div class="col-lg-6">
              <div class="card">
                <div class="card-header">
                  <strong>Semester</strong>
                  <small>Form</small>
                </div>
                <div class="card-body">
                  <div class="row">

                    <div class="col-sm-12">

                      <div class="form-group">
                        <label for="name">Angkatan</label>
                        <input type="text" class="form-control" id="nama" id="nama" placeholder="">
                      </div>

                    </div>

                  </div>
                  <!--/.row-->

                  <div class="row">

                    <div class="col-sm-12">

                      <div class="form-group">
                        <label for="ccnumber">Deskripsi</label>
                        <input type="text" class="form-control" id="deskripsi" name="deskripsi" placeholder="">
                      </div>

                    </div>

                  </div>
                  <!--/.row-->

                  <div class="row">

                    <div class="form-group col-sm-6">
                      <label for="ccmonth">Tanggal Mulai</label>
                        <input type="text" class="form-control" id="tanggal_mulai" name="tanggal_mulai" placeholder="yyyy-MM-dd">
                      </select>
                    </div>

                    <div class="col-sm-6">

                      <div class="form-group">
                        <label for="cvv">Tanggal Selesai</label>
                        <input type="text" class="form-control" id="tanggal_Selesai" name="tanggal_selesai" placeholder="yyyy-MM-dd">
                      </div>

                    </div>

                  </div>
                  <!--/.row-->
                </div>
                <div class="card-footer">
                  <a href="/semester" class="btn btn-outline-secondary pull-left" id="btnCancel"> <i class="icon-arrow-left"></i> Back</a>
                  <button type="button" class="btn btn-outline-primary pull-right" id="btnSave"> <i class="fa fa-save"></i> Save</button>
                </div>
              </div>

            </div>
            <!--/.col-->

          </div>

        </div>

      </div>
@endsection