<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'bio',
        'image',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

 
    public function followings(){
        return $this->belongsToMany(User::class,'follower_user','follower_id','user_id')->withTimestamps();

    }

    public function followers(){
        return $this->belongsToMany(User::class,'follower_user','user_id','follower_id')->withTimestamps();
        
    }

    public function follows (User $user){
        return $this->followings()->where('user_id', $user->id)->exists(); 
    }

    public function feeds(){
        return $this->hasMany(Feeds::class);
    }

    public function comment(){
        return $this->hasMany(Comment::class);
    }

    public function likes(){
        return $this->belongsToMany(Feeds::class,)->withTimestamps();
    }

    public function getImageUrl(){
        if($this->image){
            return url('storage/'.$this->image) ;
        }
        return "https://api.dicebear.com/6.x/fun-emoji/svg?seed={$this->name}" ; 
    }
}
