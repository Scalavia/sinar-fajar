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
                    <li class="breadcrumb-item active">Laporan</li>
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
                  <div class="col-12 mb-2">
                    <!-- this row will not appear when printing -->
                    <div class="row no-print">
                      <div class="col-12">
                        <a href="javascript:void(0)" rel="noopener" target="_blank" id="print" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                      </div>
                    </div>
                  </div>
                  <div class="col-12">
                      <!-- general form elements -->
                      <div class="card">
                          <div class="card-header">
                            <div class="card-tools">
                              Total Transaksi : {{ $ttltrx }}
                            </div>
                          </div>
                          <!-- /.card-header -->
                          <div class="card-body table-responsive p-0">
                              <table class="table table-hover text-nowrap">
                                  <thead>
                                  <tr>
                                      <th>#</th>
                                      <th>Invoice</th>
                                      <th>Kasir</th>
                                      <th>Tanggal</th>
                                  </tr>
                                  </thead>
                                  <tbody>
                                    @foreach ($transaksi as $trx)
                                      <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $trx->invoice }}</td>
                                        <td>{{ $trx->user->name }}</td>
                                        <td>{{ date('d M Y', strtotime($trx->created_at)) }}</td>
                                      </tr>
                                    @endforeach
                                  </tbody>
                              </table>
                          </div>
                          <!-- /.card-body -->
                      </div>
                      <!-- /.card -->
                  </div>
                  <div class="col-12">
                      <!-- general form elements -->
                      <div class="card">
                          <div class="card-header">
                            <div class="card-tools">
                              Total Barang Terjual: {{ $ttlbarang }}
                            </div>
                          </div>
                          <!-- /.card-header -->
                          <div class="card-body table-responsive p-0">
                              <table class="table table-hover text-nowrap">
                                  <thead>
                                  <tr>
                                      <th>#</th>
                                      <th>Nama Barang</th>
                                      <th>Harga</th>
                                      <th>Jumlah</th>
                                      <th>Subtotal</th>
                                  </tr>
                                  </thead>
                                  <tbody>
                                    @foreach ($detail as $dt)
                                        <tr>
                                          <td>{{ $loop->iteration }}</td>
                                          <td>{{ $dt->barang->nama_barang }}</td>
                                          <td>{{ $dt->harga }}</td>
                                          <td>{{ $dt->jumlah }}</td>
                                          <td>{{ $dt->total }}</td>
                                        </tr>
                                    @endforeach
                                  </tbody>
                                  <tfoot>
                                    <th colspan="4">Total</th>
                                    <th>{{ $total }}</th>
                                  </tfoot>
                              </table>
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

@section('js')
    <script>
      $("#print").click(function (e) { 
        e.preventDefault();
        window.addEventListener("load", window.print());
      });
    </script>
@endsection