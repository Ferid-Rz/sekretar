<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StaffService extends Model
{
    protected $table = 'staff_services';
    protected $guarded = [];
    public $timestamps = false;

    public function service()
    {    
        return $this->belongsTo('App\Models\Service', 'service_id','id');
    }
}
