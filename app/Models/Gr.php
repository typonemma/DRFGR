<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gr extends Model
{
    protected $table = 'gr';
    protected $guarded = ['id'];
    use HasFactory;

    public static function findGRById($id)
    {
        return self::find($id);
    }
    public static function allGR()
    {
        return self::all();
    }
    public static function updateGRById($data, $id)
    {
        return self::where('id', $id)
        ->update($data);
    }
    public static function deleteGRById($id)
    {
        return self::where('id',$id)
        ->delete();
    }
    public static function findDRFByMonth($month, $year)
    {
        return self::whereMonth('date', $month)
        ->whereYear('date', $year)
        ->orderBy('date', 'asc')
        ->get();
    }
}
