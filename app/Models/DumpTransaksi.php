<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DumpTransaksi extends Model
{
    use HasFactory;
    protected $table = 'dump_transaksi';
    protected $primaryKey = 'id';

    public function barang()
    {
        return $this->hasOne('App\Models\Barang', 'id', 'id_barang');
    }
}
