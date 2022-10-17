<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSku extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'sku';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['ukuran', 'stok', 'kode_warna', 'warna', 'id_produk'];


    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Get the Product of SKU.
     */
    public function product()
    {
        return $this->belongsTo(Product::class, 'id_produk');
    }

    /**
     * Check SKU availability.
     *
     * @return  \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function available(): Attribute
    {
        return Attribute::make(
            get: fn ($value, $attributes) => 0
        );
    }

    /**
     * Get the print design of sku.
     */
    public function print_design()
    {
        return $this->hasOne(PrintDesign::class, 'id_sku', 'id');
    }
}
