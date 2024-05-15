<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cpwanita extends Model
{
    use HasFactory;
    protected $guarded = ['id_cpwanita'];
    protected $primaryKey = 'id_cpwanita';

    public function cppria() 
    {
        return $this->belongsTo(cppria::class,  'id_cppria');
    }

    public function wali() 
    {
        return $this->hasOne(wali::class, 'id_wali');
    }
}
