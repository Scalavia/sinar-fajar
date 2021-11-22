@extends('layouts.index')

@section('content_header')
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Laporan</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Filter Laporan</li>
                    </ol>
                </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="small-box">
                  <div class="inner">
                    <div class="row">
                        <div class="col-md-6">
                            <!-- select -->
                            <div class="form-group">
                                <label>Bulan</label>
                                <input type="month" class="form-group" name="bulan_tahun">
                            </div>
                        </div>
                        <div class="col-md-12 text-right">
                            <a href="{{ route('laporan_filter') }}" class="btn btn-primary">Filter</a>
                        </div>
                    </div>
                  </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
