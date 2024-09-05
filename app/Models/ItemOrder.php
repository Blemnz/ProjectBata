<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ItemOrder extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'order_id',
        'product_id',
        'qty',
    ];
    public function orders() : HasOne {
        return $this->hasOne(Order::class, 'id', 'order_id');
    }

    public function products() : HasMany {
        return $this->hasMany(Product::class, 'id', 'product_id');
    }
}
