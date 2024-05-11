<?php

namespace App\Models;

use App\Models\subMenu;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class menu extends Model
{
    use HasFactory;




    protected $fillable = [
        'order_id',
        'title',
        'slug',
        'status',
        'feature',
        'content',
        'status'
    ];


    // public function sub_menus() {
    //     return $this->hasMany(subMenu::class);
    // }

    // public function sub_menu() {
    //     return $this->hasMany(subMenu::class);
    // }


}
