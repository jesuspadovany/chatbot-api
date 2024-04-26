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

    public function resources()
    {
        return $this->hasMany(Resource::class, 'answers_id');
    }

    public function process()
    {
        return $this->belongsTo(Process::class, 'processes_id');
    }

    public function question()
    {
        return $this->belongsTo(Question::class, 'questions_id');
    }

    public function career()
    {
        return $this->belongsTo(Career::class, 'careers_id');
    }

    public function scopeCarrerKey(Builder $query, $key): void
    {
        $career = Career::where('key', $key)->first();
        if (!empty($career)) {
            $query->where('careers_id', $career->id);
        }
    }

    public function scopeByQuestionKey(Builder $query, $key): void
    {
        // dd($key);
        $question = Question::where('key', $key)->first();
        if (!empty($question)) {
            $query->where('questions_id', $question->id);
        }
    }
}
