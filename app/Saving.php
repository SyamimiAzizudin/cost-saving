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

    // public function getPriceAttribute($actual_saving)
    // {
    //     return $this->attributes['actual_saving'] = sprintf('U$ %s', number_format($actual_saving, 2));
    // }
   
    public function initiatives()
    {
        return $this->belongsTo(Initiative::class);
    }
}
