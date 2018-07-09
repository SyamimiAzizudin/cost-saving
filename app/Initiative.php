<?php

namespace App;

use App\User;
use App\Company;
use App\Saving;
use Illuminate\Database\Eloquent\Model;

class Initiative extends Model
{
   
    protected $fillable = [
        'user_id',
        'company_id',
        'area',
        'analyze',
        'action'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
   
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function companies()
    {
        return $this->belongsTo(Company::class,'company_id');
    }

    public function savings()
    {
        return $this->hasMany(Saving::class);
    }
}
