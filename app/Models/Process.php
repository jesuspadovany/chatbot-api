<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Process extends Model
{
    public function answers(){
        return $this->hasMany(Answer::class);
    }

}
