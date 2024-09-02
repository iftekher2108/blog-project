<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;


    protected $fillable = [

    ];


    public function category() {
        return $this->belongsTo(category::class,'cat_id','id');
    }


    public function user() {
        return $this->belongsTo(user::class,'user_id','id');
    }

}
