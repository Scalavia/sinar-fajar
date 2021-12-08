@extends('layouts.index')

@section('title')
Profile
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Profile</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Profile</li>
                    </ol>
                </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                @include('flash-message')
                <div class="row">
                    <div class="col-12">
                        <!-- general form elements -->
                        <div class="card card-warning">
                          <div class="card-header">
                            <h3 class="card-title"><b>Ubah Profile</h3>
                          </div><!-- /.card-header -->

                            <!-- form start -->
                            <form action="{{ url('/profile/update/'.Auth::user()->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row m-2">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                        <label for="Nama">Nama Lengkap</label>
                                        <input type="text" class="form-control" id="nama" name="nama" value="{{ $akun->name }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                        <label for="NomorTelepon">Nomor Telepon</label>
                                        <input type="text" class="form-control" id="notelp" name="notelp" value="{{ $akun->notelp }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <!-- textarea -->
                                        <div class="form-group">
                                            <label>Alamat</label>
                                            <textarea class="form-control" rows="3" name="alamat" placeholder="Alamat supplier">{{ $akun->alamat }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                        <label for="Email">Email</label>
                                        <input type="text" class="form-control" id="email" name="email" value="{{ $akun->email }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                        <label for="Password">Password</label>
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                        <label for="Password">Konfirmasi Password</label>
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-right">
                                    <button type="submit" class="btn btn-warning">Simpan</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>

        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
