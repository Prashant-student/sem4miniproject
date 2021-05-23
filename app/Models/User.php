<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use function Symfony\Component\String\b;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'username',
        'linkedin',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function profile(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Profile::class);
    }
    protected static function boot()
    {
        parent::boot();

        static::created(function ($user) {
            $user->profile()->create([
                'title' => $user->username,
            ]);
        });
    }

    public function following(){
        return $this->belongsToMany(Profile::class);
    }

    public function posts(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Posts::class)->orderBy('created_at','DESC');
    }
    public function commentPosts()
    {
        return $this->morphedByMany(Posts::class, 'comments');
    }
    public function commentComments()
    {
        return $this->morphedByMany(Comments::class, 'comments');
    }
    public function commentPost(Posts $posts, $comment)
    {
        $commentPosts = $this->commentPosts();
        if($commentPosts->where('comments_id',$posts->id)->exists())
        {$commentPosts->updateExistingPivot($posts,['comment'=>$comment]);}
        else{$commentPosts->attach($posts,['comment'=>$comment]);}
        $posts->load('comments');
        return back();
    }
    public function getUrlAttribute()
    {
        return "/profile/$this->id";
    }
}
