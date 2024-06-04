<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pages extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'menu_id',
        'sub_title',
        'picture',
        'description',
        'content',
        'keywords',
        'views',
        'status',

    ];


    public function menus() {
       return $this->belongsTo(Menu::class,'menu_id');
    }

}
