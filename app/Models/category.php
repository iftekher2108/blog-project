<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;


    protected $fillable = [

    ];



    public function news() {
        return $this->hasMany(News::class,'cat_id','id');
    }




    // public function sub_category() {
    //     return $this->belongsToMany('categories','sub_categories');
    // }

}
