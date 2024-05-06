<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    use HasFactory;


    protected $fillable = [
        'data_name',
        'order_id',
        'menu_id',
        'title',
        'sub_title',
        'content',
        'picture',
        'data_type',
        'status',
    ];


}
