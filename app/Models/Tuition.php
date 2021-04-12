<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tuition extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function scopeSearch($query, $search)
    {
        return $query->where('year', 'LIKE', "%$search%")
            ->orWhere('amount', 'LIKE', "%$search%");
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
