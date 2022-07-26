<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cozinheiro extends Model
{
    protected $table = 'cozinheiros';

    protected $fillable = ['nome', 'apelido', 'email', 'password'];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setPasswordAttribute($value) {

        $this->attributes['password'] = bcrypt($value);

    }
}

