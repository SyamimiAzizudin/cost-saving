<?php

namespace App;

use App\Company;
use App\Initiative;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'company_id',
        'username',
        'email',
        'password',
        'role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'created_at',
        'updated_at'
    ];

    protected $dates = ['deleted_at'];

    /**
     * Get companies
     */
    public function companies()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    /**
     * Get initiative
     */
    public function initiatives()
    {
        return $this->hasMany(Initiative::class, 'user_id');
    }
}
