<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'pembayaran';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id_pembayaran', 'id_pembelian', 'nama', 'bank', 'jumlah', 'tanggal', 'bukti'];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Get the order of payment.
     */
    public function order()
    {
        return $this->belongsTo(Order::class, 'id_pembelian', 'id_pembelian');
    }
}
