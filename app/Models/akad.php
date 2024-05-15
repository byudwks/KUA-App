<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class akad extends Model
{
    use HasFactory;
    protected $guarded = ['id_akad'];
    protected $primaryKey = 'id_akad';

    public function cppria() 
    {
        return $this->hasOne(cppria::class, 'id_cppria');
    }
    
    public function user() 
    {
        return $this->belongsTo(user::class, 'id_akad');
    }
}
