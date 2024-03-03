<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
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

    public function scopeCarrerKey(Builder $query, $key) : void{
        $career = Career::whereRaw('LOWER(key) = LOWER(?)', [$key])->first();
        if (!empty($career)){
            $query->where('careers_id', $career->id);
        }
    }

    public function scopeQuestionKey(Builder $query, $key) : void{
        $question = Question::whereRaw('LOWER(key) = LOWER(?)', [$key])->first();
        if (!empty($question)){
            $query->where('questions_id', $question->id);
        }
    }

}
