<?php

namespace App;

use App\User;
use App\Initiative;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'user_id',
        'name',
        'group'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    protected $dates = ['deleted_at'];
   
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function initiatives()
    {
        return $this->hasMany(Initiative::class);
    }

}
