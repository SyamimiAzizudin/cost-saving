<?php

namespace App;

use App\Initiative;
use Illuminate\Database\Eloquent\Model;

class Saving extends Model
{
    protected $fillable = [
        'initiative_id',
        'actual_saving',
        'target_saving',
        'month',
        'year',
        'display'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    protected $dates = ['created_at', 'updated_at'];
   
    public function initiatives()
    {
        return $this->belongsTo(Initiative::class);
    }

}
