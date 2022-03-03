<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Drf extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'drf';
    public $incrementing = false;
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
    public static function findDRFByMonth($month, $year)
    {
        return self::whereMonth('date', '=', $month)
        ->whereYear('date', '=', $year)
        ->orderBy('date', 'asc')
        ->get();
    }
}
