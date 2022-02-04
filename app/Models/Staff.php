<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;
    public function sections()
    {
        return $this->hasMany(Section::class);
    }

    public function per_week_schedule()
    {
        return $this->hasMany(Per_week_schedule::class);
    }
}
