<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $appends = ['isLike'];

    public function categories() {
        return $this->belongsToMany(Category::class);
    }

    public function users() {
        return $this->belongsToMany(User::class);
    }

    public function comments() {
        return $this->hasMany(Comments::class,'product_id');
    }

    public function likes() {
        return $this->hasMany(Like::class,'product_id');
    }

    public function getIsLikeAttribute() {
        if (Auth::check()) {
            $like = Like::where('product_id',$this->id)->where('user_id', Auth::id())->first();
            if(isset($like)){
                return true ;
            }
        }
        return false ;
    }
}
