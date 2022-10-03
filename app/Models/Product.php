<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'produk';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id_produk';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nama_produk', 'id_kategori', 'harga_produk', 'foto_produk', 'deskripsi_produk'];


    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Get the category of product.
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'id_kategori');
    }

    /**
     * Get the SKUs of product.
     */
    public function skus()
    {
        return $this->hasMany(ProductSku::class, 'id_produk', 'id_produk');
    }
}
