<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class wali extends Model
{
    use HasFactory;
    protected $guarded = ['id_wali'];
    protected $primaryKey = 'id_wali';


    public function cpwanita() 
    {
        return $this->belongsTo(cpwanita::class, 'id_cpwanita');
    }
}
