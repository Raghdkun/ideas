<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feeds extends Model
{
    use HasFactory;


    protected $with = ['user:id,name,image', 'comment.user'];

    // protected $withCount = ['likes'];
    protected $fillable = [
        'user_id',
        'content',
        

    ];

    // protected $guarded = []; // alt to fillable but can in reverse

    public function comment()
    {
        return $this->hasMany(Comment::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function likes(){
        return $this->belongsToMany(User::class,)->withTimestamps();
    }
}
