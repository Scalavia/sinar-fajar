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
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">

            <!-- Main content -->
            <div class="invoice p-3">
                <!-- title row -->
                <div class="row">
                  <div class="col-12">
                    <h4>
                    </h4>
                  </div>
                  <!-- /.col -->
                </div>
                <!-- info row -->
                <div class="row invoice-info mb-3">
                  <div class="col-sm-6 invoice-col">
                    <b> Invoice</b> <br>
                    <h3>{{ $transaksi->invoice }}</h3>
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-6 invoice-col">
                    <b>Kasir:</b> {{ $transaksi->user->name }}<br>
                    <b>Tanggal:</b> {{ date('d M Y', strtotime($transaksi->created_at)) }}<br>
                    <b>Jam:</b> {{ date('H:i', strtotime($transaksi->created_at)) }}
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->

                <!-- Table row -->
                <div class="row">
                  <div class="col-12 table-responsive">
                    <table class="table table-striped">
                      <thead>
                      <tr>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Qty</th>
                        <th>Harga</th>
                        <th>Subtotal</th>
                      </tr>
                      </thead>
                      <tbody>
                          @foreach ($detail as $dt)
                              <tr>
                                  <td>{{ $dt->barang->kode_barang }}</td>
                                  <td>{{ $dt->barang->nama_barang }}</td>
                                  <td>{{ $dt->jumlah }}</td>
                                  <td>{{ $dt->harga }}</td>
                                  <td>{{ $dt->total }}</td>
                              </tr>
                          @endforeach
                      </tbody>
                    </table>
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->

                <div class="row">
                  <div class="col-6"></div>
                  <div class="col-6">

                    <div class="table-responsive">
                      <table class="table">
                        <tr>
                          <th style="width:50%">Total Bayar:</th>
                          <td>{{ $transaksi->total_bayar }}</td>
                        </tr>
                        <tr>
                          <th>Jumlah Bayar:</th>
                          <td>{{ $transaksi->jumlah_bayar }}</td>
                        </tr>
                        <tr>
                          <th>Kembalian:</th>
                          <td>{{ $transaksi->kembalian }}</td>
                        </tr>
                      </table>
                    </div>
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->

                <!-- this row will not appear when printing -->
                <div class="row no-print">
                  <div class="col-12">
                    <a href="{{ url('/riwayat_transaksi/detail_transaksi/print_invoice/'.$transaksi->id) }}" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                  </div>
                </div>
              </div>
              <!-- /.invoice -->

            </div><!-- /.container-fluid -->
        </section>

        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
