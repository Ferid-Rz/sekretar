<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyService extends Model
{
    protected $table = 'company_services';
    protected $guarded = [];
    public $timestamps = false;
    public function service()
    {    
        return $this->belongsTo('App\Models\Service', 'service_id','id');
    }
}
