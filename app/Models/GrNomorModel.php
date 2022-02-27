<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GrNomorModel extends Model
{
    protected $table = 'gr_nomor_model';
    protected $guarded = ['id'];
    use HasFactory;
}
