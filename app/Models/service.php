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
        'service_cat_id',
        'picture',
        'short_description',
        'content',
        'status',
    ];

    public function service_catagory() {
        return $this->belongsTo(ServiceCatagory::class,'service_cat_id');
    }

}
