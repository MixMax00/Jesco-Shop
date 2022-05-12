<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;

class Subcategory extends Model
{
    use HasFactory, SoftDeletes;

    public function subcategoryTouser()
    {
        return $this->belongsTo(User::class, 'added_by', 'id');
    }
    public function subcategoryToCategory()
    {
        return $this->belongsTo(Categors::class, 'category_id', 'id');
    }
}
