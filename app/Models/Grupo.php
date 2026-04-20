<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Documento;

class Grupo extends Model
{
    protected $fillable = ['name', 'id_propietario'];
    public function users(){
       return $this->belongsToMany(User::class)->withTimestamps();
    }
    public function propietario(){
        return $this->belongsTo(User::class, 'id_propietario');
    }
    public function mensajes(){
        return $this->hasMany(Mensaje::class);
    }
    public function documento(){
        return $this->hasOne(Documento::class);
    }
}
