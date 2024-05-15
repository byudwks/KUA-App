<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cppria extends Model
{
    use HasFactory;
    protected $guarded = ['id_cppria'];
    protected $primaryKey = 'id_cppria';


    public function cpwanita() 
    {
        return $this->hasOne(cpwanita::class, 'id_cpwanita');
    }

    public function akad() 
    {
        return $this->belongsTo(akad::class, 'id_akad');
    }

}
