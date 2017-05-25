<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clube extends Model
{
    protected $fillable = ['nome'];

    public function socios()
    {
        return $this->hasMany(Socio::class);
    }
}
