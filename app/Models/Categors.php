<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;

class Categors extends Model
{
    use HasFactory, SoftDeletes;
    

    public function categoryTouser()
    {
        return $this->belongsTo(User::class, 'added_by', 'id');
    }
}
