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
             <div class="row">
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
</div>
<!-- ./wrapper -->
<!-- Page specific script -->
<script>
  window.addEventListener("load", window.print());
</script>
</body>
</html>
