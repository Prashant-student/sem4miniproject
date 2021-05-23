<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answers extends Model
{
    use HasFactory;
    protected $guarded =[];

    public function votes()
    {
        return $this->morphToMany(User::class, 'votable');
    }
    public function comments()
    {
        return $this->morphToMany(User::class, 'comments');
    }
}
