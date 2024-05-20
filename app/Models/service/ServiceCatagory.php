<?php

namespace App\Models\service;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceCatagory extends Model
{
    use HasFactory;


    protected $fillable = [
        'order_id',
        'title',
        'picture',
        'content',
        'status',
    ];


}
