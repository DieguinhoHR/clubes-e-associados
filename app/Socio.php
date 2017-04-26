<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Socio extends Model
{
    protected $fillable = ['nomeCompleto', 'clube_id'];

    public function clube()
    {
        return $this->belongsTo(Clube::class);
    }
}
