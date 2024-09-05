<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SetWeb extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul1',
        'judul2',
        'judul3',
        'judul4',
        'judul5',
        'judul6',
        'map',
        'kontakEmail',
        'kontakNomor',
        'kontakAlamat',
    ];

    public static function dataMap() {
        $data = SetWeb::all();
        return json_decode($data);
    }
}
