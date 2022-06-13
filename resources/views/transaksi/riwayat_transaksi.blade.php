@extends('layouts.index')

@section('title')
Riwayat Transaksi
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Riwayat Transaksi</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Riwayat Transaksi</li>
                    </ol>
                </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
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
                          </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-1">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th>Invoice</th>
                                    <th>Tanggal</th>
                                    <th>Jam</th>
                                    <th>Kasir</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @forelse ($transaksi as $trx)
                                        <tr>
                                            <td>{{ $trx->invoice }}</td>
                                            <td>{{ date('d M Y', strtotime($trx->created_at)) }}</td>
                                            <td>{{ date('H:i', strtotime($trx->created_at)) }}</td>
                                            <td>{{ $trx->user->name }}</td>
                                            <td><a href="{{ url('/riwayat_transaksi/detail_transaksi/'.$trx->id) }}" class="btn btn-primary">Detail</a></td>
                                        </tr>
                                        @empty
                                        <td class="text-center" colspan="10">DATA YANG ANDA CARI TIDAK DITEMUKAN!</td>
                                    @endforelse
                                </tbody>
                            </table>
                            <div class="row m-2">
                              <div class="col-md-3">
                                Showing {{ $transaksi->firstItem() }} to {{ $transaksi->lastItem() }} of {{ $transaksi->total() }} entries
                              </div>
                              <div class="col-md-9">
                                <span class="float-right">{!! $transaksi->links('bootstrap-4') !!}</span>
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
@endsection
