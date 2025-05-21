<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products'; // matches your actual SQL table
    protected $primaryKey = 'product_id';
    public $timestamps = false;

    protected $fillable = [
        'sku', 'name', 'description', 'price', 'image_url'
    ];
}
