<?php

namespace App\Models;

use App\Models\menu;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class subMenu extends Model
{
    use HasFactory;

    protected $fillable =[
        'parent_id',
        'order_id',
        'sub_title',
        'sub_slug',
        'feature',
        'content',
        'status',

    ];

    // public function menu(){
    //     return $this->belongsTo(menu::class);
    // }

}
