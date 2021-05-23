<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    use HasFactory;
    protected $guarded =[];
    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function votes()
    {
        return $this->morphToMany(User::class, 'votable');
    }
    public function comments()
    {
        return $this->morphToMany(User::class, 'comments');
    }
    public function accept(User $user)
    {
        $this->accepted_by = $user->id;
        return back();
    }
}
