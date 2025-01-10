<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = "products";

    protected $fillable = [
        'title',
        'product_sku',
        'short_description',
        'long_description',
        'model',
        'price',
        'quantity',
        'vendor',
        'author_id',
        'live_status',
        'thumbnail_1',
        'brand',
        'freeshipping',
        'flat_delivery_crg',
        'cod_status',
        'slug',
        'video_platform',
        'video_link',
        'discount_type',
        'discount',
        'amount',
        'img-1',
        'img-2',
        'img-3',
        'img-4',
        'img-5',
        'img-6',
        'img-7',
        'img-8',
        'img-9',
        'mg-10',
        'product_type',
        'L1_commission',
        'L2_commission',
        'L3_commission',
        'L4_commission',
        'L5_commission',
        'total_commission',
        'money_back',
        'target_audience',
        'purchase_rate'
    ];

    public $timestamps = true;

    // get vendor products
    public function get_vendor_products($vendor, $paginate = 0, $status = 'shihab')
    {
        $query = Product::where('vendor', $vendor);
        if ($paginate == 0) {
            if ($status != 'shihab') {
                return $query->where('live_status', $status)->get();
            } else {
                return $query->get();
            }
        } else {
            if ($status != 'shihab') {
                return $query->where('live_status', $status)->paginate($paginate);
            } else {
                return $query->paginate($paginate);
            }
        }
    }
}
