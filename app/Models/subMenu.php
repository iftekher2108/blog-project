<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
