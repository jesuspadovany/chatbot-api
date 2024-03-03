<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Career extends Model
{
    protected $table = 'careers';
    public function answers(){
        return $this->hasMany(Answer::class);
    }
}
