<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Drf extends Model
{
    protected $table = 'drf';
    protected $guarded = ['id'];
    use HasFactory;
    public static function searchDRFById($id)
    {
        return self::find($id);
    }
    public static function allDRF()
    {
        return self::all();
    }
}
