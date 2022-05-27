<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Drf extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $incrementing = false;

    private static $__admin = 0;
    private static $__ackGL = 1;
    private static $__engineer = 2;
    private static $__qc = 3;
    private static $__reviewGL = 4;
    private static $__manager = 5;


    protected $table = 'drf';
    protected $keyType = 'string';
    protected $fillable = [
        'id',
        'cc',
        'cea_project',
        'cea_svo',
        'ci_company_name',
        'ci_phone_company',
        'ci_contact_person',
        'ci_email_company',
        'ci_address',
        'di_date',
        'di_duration',
        'number_of_engineering',
        'sitework_location',
        'lodging_recomendation',
        'scope_instrument_name',
        'scope_model_code',
        'post_work_document',
        'work_type',
        'description',
        'gl_initial',
        'current_work_status',
        'dokumen_pendukung'
    ];
    public static function findDRFById($id)
    {
        return self::find($id);
    }
    public static function allDRF()
    {
        return self::all()->sortBy('number_of_process');
    }
    public static function updateDRFById($data, $id)
    {
        return self::where('id', $id)
        ->update($data);
    }
    public static function deleteDRFById($id)
    {
        return self::where('id',$id)
        ->delete();
    }
    public static function findDRFByMonthAndYear($month, $year)
    {
        return self::whereMonth('di_date', $month)
        ->whereYear('di_date', $year)
        ->orderBy('number_of_process', 'asc')
        ->get();
    }
    
    public static function findDRFThisWeek()
    {
        return self::whereBetween('di_date', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
        ->get()->count();
    }
    public static function findDRFThisMonth()
    {
        return self::whereMonth('di_date', Carbon::now()->month)
        ->whereYear('di_date', Carbon::now()->year)
        ->get()->count();
    }

    public static function checkDRFid()
    {
        $result = self::whereYear('di_date',Carbon::now()->year)->get()->sortByDesc('id')->first();
        return ($result) ? $result->id : NULL;
    }

    public static function findDRFAdmin()
    {
        return self::where('number_of_process', self::$__admin)
        ->get();
    }

    public static function findDRFAckGL()
    {
        return self::where('number_of_process', self::$__ackGL)
        ->get();
    }

    public static function findDRFEngineer()
    {
        return self::where('number_of_process', self::$__engineer)
        ->get();
    }

    public static function findDRFQC()
    {
        return self::where('number_of_process', self::$__qc)
        ->get();
    }

    public static function findDRFReviewGL()
    {
        return self::where('number_of_process', self::$__reviewGL)
        ->get();
    }

    public static function findDRFReviewManager()
    {
        return self::where('number_of_process', self::$__manager)
        ->get();
    }

    public static function allDRFOrderByNumberOfProcesses()
    {
        return self::all()->sortBy('number_of_process');
    }
}
