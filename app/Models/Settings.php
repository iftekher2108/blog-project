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
        'data_id',
        'slug',
        'title',
        'sub_title',
        'link',
        'content',
        'content_2',
        'picture',
        // 'dir_path',
        'data_type',
        'status',
    ];


}
