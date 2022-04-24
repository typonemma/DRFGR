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
    public static function findIvspByMonthAndYear($month, $year)
    {
        return self::whereMonth('in_date', $month)
        ->whereYear('in_date', $year)
        ->get();
    }
    public static function findIVSPThisWeek()
    {
        return self::whereBetween('in_date', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
        ->get()->count();
    }
    public static function findIVSPThisMonth()
    {
        return self::whereMonth('in_date', Carbon::now()->month)
        ->get()->count();
    }
    public static function checkIVSPid()
    {
        $result = self::whereYear('in_date',Carbon::now()->year)->get()->sortByDesc('id')->first();
        return ($result) ? $result->id : NULL;
    }
    public static function findIVSPAdmin()
    {
        return self::where('number_of_process', 0)
        ->get();
    }
    public static function findIVSPGL()
    {
        return self::where('number_of_process', 1)
        ->get();
    }
    public static function findIVSPEngineer()
    {
        return self::where('number_of_process', 2)
        ->orWhere('number_of_process', 3)
        ->get();
    }

    public static function findIVSPManager()
    {
        return self::where('number_of_process', 4)
        ->orWhere('number_of_process', 5)
        ->get();
    }
}
