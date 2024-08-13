<?php

namespace App\Models;

use App\Models\service\ServiceCatagory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class service extends Model
{
    use HasFactory;


    protected $fillable =[
        'order_id',
        'title',
        'picture',
        'description',
        'content',
        'status',
    ];

}
