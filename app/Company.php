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
        'name',
        'group',
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
