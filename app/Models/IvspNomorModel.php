<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IvspNomorModel extends Model
{
    protected $table = 'ivsp_nomor_model';
    protected $guarded = ['id'];
    use HasFactory;
}
