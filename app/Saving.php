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
        'month'
    ];

    protected $dates = ['created_at', 'updated_at'];
   
    public function initiatives()
    {
        return $this->belongsTo(Initiative::class);
    }

    public function getCreated_timestampAttribute()
    {
        return $this->created_at->timestamp();
    }

    public function getUpdated_timestampAttribute()
    {
        return $this->updated_at->timestamp();
    }

}
