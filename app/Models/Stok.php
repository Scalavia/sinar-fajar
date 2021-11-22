<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stok extends Model
{
    use HasFactory;
    protected $table = 'stok';
    protected $primaryKey = 'id';

    public function barang()
    {
        return $this->hasOne('App\Models\Barang', 'id', 'id_barang');
    }

    public function supplier()
    {
        return $this->hasOne('App\Models\Supplier', 'id', 'id_supplier');
    }
}
