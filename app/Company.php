<?php

namespace App;

use App\User;
use App\Initiative;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    
    protected $fillable = [
        'name',
        'group'
    ];
   
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function initiatives()
    {
        return $this->hasMany(Initiative::class);
    }

}
