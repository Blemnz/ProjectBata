<?php

namespace App\Models;

use Generator;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'image',
        'price',
    ];
    public static function boot(){
        parent::boot();
        static::creating(function ($model) {
            $data = $model;
            $data->uid = Str::ulid()->toBase32();
        });
    }
    public function itemOrder() : HasMany {
        return $this->hasMany(ItemOrder::class, 'product_id');
    }
}
