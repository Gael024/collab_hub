<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Grupo;
use App\Models\User;

class Mensaje extends Model
{
    protected $fillable = ['grupo_id', 'user_id', 'contenido'];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function grupo(){
        return $this->belongsTo(Grupo::class);
    }
}
