@extends('layouts.index')

@section('title')
Transaksi
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Transaksi</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Transaksi</li>
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
                    <div class="col-6">
                        <!-- general form elements -->
                        <div class="card card-outline card-primary">
                            <div class="row m-2">
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <label for="Nama">Kasir</label>
                                    <input type="text" readonly class="form-control" id="nama" name="nama" value="{{ Auth::user()->name }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <label for="Nama">Hari ini</label>
                                    <input type="text" readonly class="form-control" id="nama" name="nama" value="<?php echo date('l, d-m-Y') ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>

                    <div class="col-6">
                        <!-- general form elements -->
                        <div class="card card-outline card-primary">
                            <form action="{{ route('transaksi.tambah_keranjang') }}" method="POST">
                                @csrf
                                <div class="row m-2">
                                    <div class="col-md-6">
                                        <!-- select -->
                                        <div class="form-group">
                                            <label>Barang</label>
                                            <select class="form-control" name="barang">
                                                <option value=""> - Pilih Barang - </option>
                                                <optgroup label="Jumlah - Nama">
                                                    @foreach ($barang as $barang)
                                                        <option value="{{ $barang->id }}"> {{ $barang->stok }} - {{ $barang->nama_barang }}</option>
                                                    @endforeach
                                                </optgroup>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <strong>Qty</strong>
                                        <div class="input-group mb-3 mt-2">
                                          <input type="text" class="form-control rounded-0" name="qty">
                                          <span class="input-group-append">
                                            <button type="submit" class="btn btn-info btn-flat">Proses</button>
                                          </span>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->
                    </div>

                    <div class="col-12">
                        <!-- general form elements -->
                        <div class="card card-outline card-primary">
                            <div class="card-header">
                              <h3 class="card-title text-middle">
                                <b> Keranjang</b>
                              </h3>

                              <div class="card-tools">
                                Total Barang : {{ $total_barang }}
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
                                        <th>Aksi</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($dump_transaksi as $transaksi)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $transaksi->barang->nama_barang }}</td>
                                            <td>{{ $transaksi->harga }}</td>
                                            <td>{{ $transaksi->jumlah }}</td>
                                            <td>{{ $transaksi->subtotal }}</td>
                                            <td>
                                                <a href="{{ url('/transaksi/delete/'.$transaksi->id) }}" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>

                    <div class="col-6"></div>

                    <div class="col-6">
                        <!-- general form elements -->
                        <div class="card card-outline card-primary">
                            <form action="{{ route('transaksi.proses') }}" method="POST">
                                @csrf
                                <div class="row m-2">
                                    <div class="col-md-2 mt-2">
                                        <label for="TotalBayar">Total Bayar</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                        <input type="text" readonly onkeyup="pengurangan();" class="form-control" id="total_bayar" name="total_bayar" value="{{ $total_baryar }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row m-2">
                                    <div class="col-md-2 mt-2">
                                        <label for="Bayar">Bayar</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                        <input type="text" onkeyup="pengurangan();" class="form-control" id="bayar" name="bayar" placeholder="Jumlah Bayar">
                                        </div>
                                    </div>
                                </div>
                                <div class="row m-2">
                                    <div class="col-md-2 mt-2">
                                        <label for="Kembalian">Kembalian</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                        <input type="text" readonly class="form-control" id="kembalian" name="kembalian" placeholder="Jumlah Kembalian">
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer justify-content-between">
                                    <button type="submit" class="btn btn-success">Proses Pembayaran</button>
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

@section('js')
    <script>
        function pengurangan()
        {
            var total_bayar = document.getElementById('total_bayar').value;
            var bayar = document.getElementById('bayar').value;
            var hasil = parseInt(bayar) - parseInt(total_bayar);
            document.getElementById('kembalian').value = hasil;
        }
    </script>
@endsection
