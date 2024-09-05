<?php

namespace App\Models;

use Carbon\Carbon;
use Generator;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory,HasUuids;

    protected $fillable = [
        'email', 
        'nama', 
        'alamat', 
        'nomor',
        'total',
        'status' 
    ];

    public function newUniqueId()
    {
        $date = Carbon::now();
        $jam = $date->format('Hiy');
        $random = strtoupper(Str::random(8));
        $id = 'TCU-'.$random.'-'.$jam;
        return $id;
        // 'TCU - 8 RANDOM STRING - JAM:MENIT:TAHUN '
        // contoh
        // order DI JAM 12:06 tahun 2024
        // order id = TCU-ZM8FF4321-120624
    }
    public function order_items() : HasMany{
        return $this->hasMany(ItemOrder::class,'order_id');
    }

    public function order_item() : BelongsTo {
        return $this->belongsTo(ItemOrder::class, 'order_id');
    }
    

}
