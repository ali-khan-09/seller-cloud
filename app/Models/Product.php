<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'sku',
        'product_name',
        'product_image',
        'product_short_desc',
        'product_long_desc',
        'product_weight',
        'product_shipping_weight',
        'product_weightOz',
        'product_package_weightLbs',
        'product_company_id',
        'product_brand_id',
        'product_type',
        'product_condition',
        'product_upc',
        'product_cost_price',
        'product_map_price',
        'category_id',
        'subcategory_id',
        'product_msrp_price',
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function subcategory(){
        return $this->belongsTo(Subcategory::class);
    }
    public function images(){
        return $this->hasMany(Image::class);
    }
}
