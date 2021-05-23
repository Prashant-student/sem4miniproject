<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    use HasFactory;
    protected $guarded =[];

    protected $best_answer_ids = [
        'properties' => 'array'
    ];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function getRemopeningsAttribute()
    {
        return ($this->openings - count($this->best_answer_ids));
    }
    public function votes()
    {
        return $this->morphToMany(User::class, 'votable');
    }
    public function comments()
    {
        return $this->morphToMany(User::class, 'comments');
    }
    public function answers()
    {
        return $this->morphToMany(User::class, 'answers');
    }
    public function bestanswer(Answers $answers)
    {
        $this->best_answer_ids = $answers->id;
        return back();
    }
}
