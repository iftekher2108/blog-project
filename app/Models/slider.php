<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class slider extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'title',
        'picture',
        'sub_title',
        'link',
        'picture',
        'status'
    ];
}
