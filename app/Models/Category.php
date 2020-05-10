<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = ['*'];
    public $timestamps = false;

    public function company()
    {
        return $this->hasMany('App\User');
    }
    // public function service()
    // {    
    //     return $this->belongsTo('App\Models\Service', 'service_id','id');
    // }
}
