<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class content extends Model
{
    use HasFactory;


    protected $fillable = [
        'content_title',
        'title',
        'title_1',
        'description',
        'layout',
        'picture',
        'picture_1',
        'picture_2',
        'picture_3',
        'picture_4',
        'content',
        'content_1',
        'link',
        'link_1',
        'status',
    ];


}
