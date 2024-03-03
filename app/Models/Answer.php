<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Answer extends Model
{
    protected $table = 'answers';

    protected $fillable = [
        'name',
    ];

    public function process()
    {
        return $this->belongsTo(Process::class);
    }

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function career()
    {
        return $this->belongsTo(Career::class);
    }

}
