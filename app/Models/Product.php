<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;
use App\Models\Categors;
use App\Models\Subcategory;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable =[
      'category_id',
      'subcategory_id',
      'product_name',
      'old_price',
      'new_price',
      'product_image',
      'slug',
      'sku',
      'short_description',
      'long_description',
      'weight',
      'dimensions',
      'materials',
      'other_info',
      'Added_by',
      'status',
    ];

    public function productTouser()
    {
      return $this->belongsTo(User::class, 'Added_by', 'id');
    }
    public function productTocategory()
    {
      return $this->belongsTo(Categors::class, 'category_id', 'id');
    }
    public function productToSubcategory()
    {
      return $this->belongsTo(Subcategory::class, 'subcategory_id', 'id');
    }
}
