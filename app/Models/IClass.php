<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IClass extends Model
{
    use HasFactory;

    protected $table = 'classes';
    protected $guarded = [];

    public function scopeSearch($query, $search)
    {
        return $query->where('grade', 'LIKE', "%$search%")
            ->orWhere('code', 'LIKE', "%$search%")
            ->orWhereHas(
                'major',
                function ($major) use ($search) {
                    $major->where('name', 'LIKE', "%$search%");
                }
            );
    }

    public function major()
    {
        return $this->belongsTo(Major::class);
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
