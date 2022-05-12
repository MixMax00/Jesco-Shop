<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Banner extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
      'banner_title_one',
      'banner_title_two',
      'banner_img',
      'added_by',
      'updated_at',
    ];
    public function bannerTouser()
    {
      return $this->belongsTo(User::class, 'added_by', 'id');
    }
}
