<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Questions extends Model
{
    use HasFactory;
    protected $guarded =[];
    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function getStatusAttribute(): string
    {
        if ($this->answers_count >0)
        {
            if($this->best_answer_id){
                return "answered-accepted";
        }
            return "answered";
        }
            return "unanswered";
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
    public function bestanswer(Answers $answers){
        $this->best_answer_id = $answers->id;
        $this->save();
        return back();
    }
}
