<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
        return self::whereMonth('created_at', $month)
        ->whereYear('created_at', $year)
        ->get();
    }
    public static function findIVSPThisWeek()
    {
        return self::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
        ->get()->count();
    }
    public static function findIVSPThisMonth()
    {
        return self::whereMonth('created_at', Carbon::now()->month)
        ->get()->count();
    }
}
