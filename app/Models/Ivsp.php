<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ivsp extends Model
{
    public $timestamps = false;
    protected $table = 'ivsp';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'id',
        'for',
        'customer_name',
        'customer_address',
        'customer_telephone',
        'contact_person',
        'description',
        'in_date',
        'updated_at',
        'created_at',
    ];
    use HasFactory;

    public static function findIVSPById($id)
    {
        return self::find($id);
    }
    public static function allIVSP()
    {
        return self::all();
    }
    public static function updateIVSPById($data, $id)
    {
        return self::where('id', $id)
        ->update($data);
    }
    public static function deleteIVSPById($id)
    {
        return self::where('id',$id)
        ->delete();
    }
    public static function findIVSPByMonth($month, $year)
    {
        return self::whereMonth('date', $month)
        ->whereYear('date', $year)
        ->orderBy('date', 'asc')
        ->get();
    }
}
