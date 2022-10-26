<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrintDesign extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'desain_sablon';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id_desain_sablon';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id_desain_sablon', 'id_sku', 'desain_depan', 'desain_belakang', 'letak_sablon', 'catatan', 'bahan_produk'];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Get the SKU of Design.
     */
    public function sku()
    {
        return $this->belongsTo(ProductSku::class, 'id_sku', 'id');
    }
}
