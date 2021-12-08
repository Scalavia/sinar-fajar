@extends('layouts.index')

@section('title')
Akun
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Akun</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Akun</li>
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
                      <div class="card">
                        <div class="card-header">
                          <h3 class="card-title text-middle">
                            <form action="">
                              <div class="input-group input-group-sm mt-3" style="width: 250px;">
                                  <input type="text" name="cari" id="cari" class="form-control float-right" value="{{old('cari')}}" placeholder="Search">
  
                                  <div class="input-group-append">
                                      <button type="submit" class="btn btn-default">
                                          <i class="fas fa-search"></i>
                                      </button>
                                  </div>
                              </div>
                            </form>
                          </h3>

                          <div class="card-tools">
                            <a class="btn btn-app btn-sm bg-primary" data-toggle="modal" data-target="#modal-tambah-akun">
                                <i class="fas fa-plus"></i> Tambah Akun
                            </a>
                          </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Level</th>
                                    <th>Nama</th>
                                    <th>Nomor</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @forelse ($akun as $nakun)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ strtoupper($nakun->role) }}</td>
                                            <td>{{ $nakun->name }}</td>
                                            <td>{{ $nakun->notelp }}</td>
                                            <td>
                                                <a href="{{ url('/akun/'.$nakun->id.'/edit') }}" class="btn btn-warning"><i class="fa fa-edit"></i> Ubah</a>
                                                <a href="{{ url('/akun/delete/'.$nakun->id) }}" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</a>
                                            </td>
                                        </tr>
                                        @empty
                                        <td class="text-center" colspan="10">DATA YANG ANDA CARI TIDAK DITEMUKAN!</td>
                                    @endforelse
                                </tbody>
                            </table>
                            <div class="row m-2">
                              <div class="col-md-3">
                                Showing {{ $akun->firstItem() }} to {{ $akun->lastItem() }} of {{ $akun->total() }} entries
                              </div>
                              <div class="col-md-9">
                                <span class="float-right">{!! $akun->links('bootstrap-4') !!}</span>
                              </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
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

    {{-- Modal Tambah Akun --}}
    <div class="modal fade" id="modal-tambah-akun">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah Akun</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <!-- form start -->
            <form action="{{ route('akun.store') }}" method="POST">
                <div class="modal-body">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="Nama">Nama Lengkap</label>
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="NomorTelepon">Nomor Telepon</label>
                            <input type="text" class="form-control" id="notelp" name="notelp" placeholder="Nomor Telepon">
                            </div>
                        </div>
                        <div class="col-sm-12">
                        <!-- textarea -->
                        <div class="form-group">
                            <label>Alamat</label>
                            <textarea class="form-control" rows="3" name="alamat" placeholder="Masukkan Alamat"></textarea>
                        </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="Email">Email</label>
                            <input type="text" class="form-control" id="email" name="email" placeholder="Email">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="Username">Username</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Username">
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
                        <div class="col-sm-6">
                            <!-- select -->
                            <div class="form-group">
                                <label>Level</label>
                                <select class="form-control" name="level">
                                    <option value=""> - Pilih Level - </option>
                                    <option value="admin">Admin</option>
                                    <option value="karyawan">Karyawan</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
@endsection
