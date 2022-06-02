<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
        'updated_at',
        'created_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Admin
    public static function allAdmin()
    {
        return User::where('role_id', '0202')->get();
    }

    public static function findAdmin($id)
    {
        return User::where('id', $id)->where('role_id', '0202')->first();
    }

    public static function deleteAdmin($id)
    {
        return User::where('id', $id)->where('role_id', '0202')->delete();
    }
    // END Admin


    // GL
    public static function allGL()
    {
        return User::where('role_id', '0101')->get();
    }

    public static function findGL($id)
    {
        return User::where('id', $id)->where('role_id', '0101')->first();
    }

    public static function deleteGL($id)
    {
        return User::where('id', $id)->where('role_id', '0101')->delete();
    }
    // END GL

    // Engineer
    public static function allEngineer()
    {
        return User::where('role_id', '0303')->get();
    }

    public static function findEngineer($id)
    {
        return User::where('id', $id)->where('role_id', '0303')->first();
    }

    public static function deleteEngineer($id)
    {
        return User::where('id', $id)->where('role_id', '0303')->delete();
    }
    // END Engineer

    // QC
    public static function allQC()
    {
        return User::where('role_id', '0505')->get();
    }

    public static function findQC($id)
    {
        return User::where('id', $id)->where('role_id', '0505')->first();
    }

    public static function deleteQC($id)
    {
        return User::where('id', $id)->where('role_id', '0505')->delete();
    }
    // END QC

    // Manager
    public static function allManager()
    {
        return User::where('role_id', '0606')->get();
    }

    public static function findManager($id)
    {
        return User::where('id', $id)->where('role_id', '0606')->first();
    }

    public static function deleteManager($id)
    {
        return User::where('id', $id)->where('role_id', '0606')->delete();
    }
    // END Manager
}
