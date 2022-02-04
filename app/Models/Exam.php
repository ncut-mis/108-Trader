<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;
    public function products()
    {
        return $this->belongsTo(Product::class);
    }

    public function exam_item_scores()
    {
        return $this->hasMany(Exam_item_score::class);
    }

    public function sections()
    {
        return $this->belongsTo(Section::class);
    }
}
