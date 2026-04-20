<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    protected $fillable = ['grupo_id', 'contenido'];
    public function grupo(){
        return $this->belongsTo(Grupo::class);
    }

    public function documento(){
        return $this->hasOne(Documento::class);
    }
}
