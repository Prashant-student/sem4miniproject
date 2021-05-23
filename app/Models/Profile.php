<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function profile_image()
    {
        $imagepath= ($this->image) ? '/storage/'.$this->image : "/images/Missing_avatar.svg.png";
        return $imagepath;
    }

    public function followers(){
        return $this->belongsToMany(User::class);
    }

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
