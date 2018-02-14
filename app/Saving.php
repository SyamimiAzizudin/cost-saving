<?php

namespace App;

use App\Initiative;
use Illuminate\Database\Eloquent\Model;

class Saving extends Model
{
    protected $fillable = [
        'initiative_id',
        'actual_saving',
        'taget_saving',
        'month'
    ];
   
    public function initiatives()
    {
        return $this->belongsTo(Initiative::class);
    }
}
