<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Sale extends Model
{
    use HasFactory;
    use SoftDeletes;

 /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
            'product_id',
            'qty',
            'unit_cost',
            'selling_price'
    ];


    /**
     * Get the Product associated with the Sale.
     */
    public function product(): HasOne
    {

        return $this->hasOne(Product::class, 'id', 'product_id');

    }

}
