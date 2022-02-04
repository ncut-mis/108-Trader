<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quality_item extends Model
{
    use HasFactory;
    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    public function exam_item_scores()
    {
        return $this->hasMany(Exam_item_score::class);
    }
}
