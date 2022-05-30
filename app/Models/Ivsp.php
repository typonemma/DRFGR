<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ivsp extends Model
{
    private static $__admin = 0;
    private static $__ackGL = 1;
    private static $__engineer = 2;
    private static $__reviewGL = 3;
    private static $__reviewManager = 4;
    private static $__approveManager = 5;

    public $timestamps = false;
    public $incrementing = false;

    protected $table = 'ivsp';
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

    public function ivspNomorModel()
    {
        return $this->hasMany(IvspNomorModel::class, 'ivsp_id', 'id');
    }

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
        ->orderBy('number_of_process', 'asc')
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
        return self::where('number_of_process', self::$__admin)
        ->get();
    }
    public static function findIVSPGL()
    {
        return self::where('number_of_process', self::$__ackGL)
        ->orWhere('number_of_process', self::$__reviewGL)
        ->get();
    }
    public static function findIVSPEngineer()
    {
        return self::where('number_of_process', self::$__engineer)
        ->get();
    }

    public static function findIVSPReviewManager()
    {
        return self::where('number_of_process', self::$__reviewManager)
        ->get();
    }

    public static function findIVSPApproveManager()
    {
        return self::where('number_of_process', self::$__approveManager)
        ->get();
    }

    public static function allIVSPOrderByNumberOfProcesses()
    {
        return self::all()
        ->sortBy('number_of_process');
    }
}
