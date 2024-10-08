<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'title',
        'slug',
        'content',
        'keywords',
        'status'

    ];





    public function page() {
        return $this->hasOne(pages::class,'menu_id');
    }




}
