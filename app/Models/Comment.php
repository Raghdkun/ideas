<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Feeds;


class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'image' , 
        'content',

    ];

    public function feeds(){
        return $this->hasMany(Feeds::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }


    
    public function getImageUrl(?User $user){
        if($this->$user->image){
            return url('storage/'.$this->$user->image) ;
        }
        return "https://api.dicebear.com/6.x/fun-emoji/svg?seed=bla" ; 
    }

}
