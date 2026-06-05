<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Grupo;


#[Fillable([
    'name',
    'email',
    'password',
    'apellido', 
    'edad', 
    'celular', 
    'tipo', 
    'sector', 
    'procedencia', 
    'pais', 
    'estado', 
    'referencia', 
    'carac_principal',
    'rol',
    'grado_academico',
    'codigo_postal'])]  

    
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

/*    
protected $fillable = [
    'name',
    'email',
    'password',
    'apellido', 
    'edad', 
    'celular', 
    'tipo', 
    'sector', 
    'procedencia', 
    'pais', 
    'estado', 
    'referencia', 
    'carac_principal',
    'rol'];    
  */
    

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    //Relacion con modelo Grupo.php
    public function grupos(){
        return $this->belongsToMany(Grupo::class)->withTimestamps();
    }

    public function mensajes(){
        return $this->hasMany(Mensaje::class);
    }

    public function administrador(){
        return $this->rol == 'administrador';
    }
}
