<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gr extends Model
{
    protected $table = 'gr';
    use HasFactory;

    public static function searchGRById($id)
    {
        return self::find($id);
    }
}
