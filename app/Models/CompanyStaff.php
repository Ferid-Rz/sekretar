<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyStaff extends Model
{
    protected $table = 'company_staff';
    protected $guarded = [];
    public $timestamps = false;

    public function service()
    {    
        return $this->belongsTo('App\Models\StaffService', 'id','staff_id');
    }
}
