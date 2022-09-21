<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;


    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'pembelian_produk';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id_pembelian_produk', 'id_pembelian', 'id_sku', 'jumlah' , 'nama', 'harga', 'subharga'];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Get the order of order item.
     */
    public function order()
    {
        return $this->belongsTo(Order::class, 'id_pembelian', 'id_pembelian');
    }

    /**
     * Get the sku of order item.
     */
    public function sku()
    {
        return $this->belongsTo(ProductSku::class, 'id_sku');
    }
}
