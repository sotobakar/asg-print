<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'pembelian';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id_pembelian';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id_pembelian', 'id_user', 'id_ongkir', 'tanggal_pembelian', 'total_pembelian', 'alamat_pengiriman', 'status_pembelian'];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Get the user of order.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    /**
     * Get the ongkir of order.
     */
    public function ongkir()
    {
        return $this->belongsTo(Ongkir::class, 'id_ongkir', 'id_ongkir');
    }

    /**
     * Get the items of order.
     */
    public function items()
    {
        return $this->hasMany(OrderItem::class, 'id_pembelian', 'id_pembelian');
    }

    /**
     * Get the payment of order.
     */
    public function payment()
    {
        return $this->hasOne(Payment::class, 'id_pembelian', 'id_pembelian');
    }

    /**
     * Check if order has been received by user.
     * 
     */
    public function received()
    {
        return $this->hasOne(OrderReceived::class, 'id_pembelian', 'id_pembelian');
    }
}
