<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    use HasFactory;
    protected $guarded = [] ;

    public function user() {
        return $this->belongsTo(User::class,'talker_id');
    }

    public function lastMessage() {
        return $this->hasOne(Message::class,'conversation_id')->latest();
    }

    public function messages() {
        return $this->hasMany(Message::class,'conversation_id');
    }

    public function conversations() {
        return $this->hasMany(Message::class,'conversation_id');
    }
}
