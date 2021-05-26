<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_sku',
        'product_id',
        'image_id',
        'img1',
        'img2',
        'img3',
        'img4',
        'img5',
        'img6',
        'img7',
        'img8',
        'img9',
        'img10',
        'img11',
        'img12',
        'img13',
        'img14',
        'img15',
    ];

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
