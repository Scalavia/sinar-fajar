@extends('layouts.index')

@section('title')
Laporan
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
                            <div class="col-md-12">
                                <form action="{{ route('laporan_filter') }}" method="GET">
                                    <!-- Date range -->
                                    <div class="form-group">
                                        <label>Date range:</label>
                        
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="far fa-calendar-alt"></i>
                                            </span>
                                            </div>
                                            <input type="text" class="form-control float-right" name="tanggal" id="reservation">
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                    <!-- /.form group -->
                                    <div class="col-md-12 text-right">
                                        <button type="submit" class="btn btn-primary">Filter</button>
                                        {{-- <a type="submit" class="btn btn-primary">Filter</a> --}}
                                    </div>
                                </form>
                            </div>
                        </div>{{-- end row --}}
                    </div>{{-- end inner --}}
                </div> {{-- end small-box --}}
            </div><!-- /.container-fluid -->
        </section>

        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

@section('js')
    <script>
        $(function () {
            //Date range picker
            $('#reservation').daterangepicker({
                locale: {
                    format: 'YYYY-MM-DD'
                }
            });
        })      
    </script>
@endsection