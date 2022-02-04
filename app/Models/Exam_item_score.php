<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam_item_score extends Model
{
    use HasFactory;
    public function quality_item()
    {
        return $this->hasMany(Quality_item::class);
    }

    public function exams()
    {
        return $this->hasMany(Exam::class);
    }
}
