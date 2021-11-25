<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Invoice Print</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('vendor/AdminLTE-3.1.0') }}/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('vendor/AdminLTE-3.1.0') }}/dist/css/adminlte.min.css">
</head>
<body>
<div class="wrapper">
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
            </div>
            <!-- /.invoice -->

        </div><!-- /.container-fluid -->
    </section>
</div>
<!-- ./wrapper -->
<!-- Page specific script -->
<script>
  window.addEventListener("load", window.print());
</script>
</body>
</html>
