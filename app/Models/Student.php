<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function scopeSearch($query, $search)
    {
        return $query->where('nisn', 'LIKE', "%$search%")
            ->orWhere('nis', 'LIKE', "%$search%")
            ->orWhere('address', 'LIKE', "%$search%")
            ->orWhere('telp_number', 'LIKE', "%$search%")
            ->orWhereHas(
                'user',
                function ($user) use ($search) {
                    $user->where('name', 'LIKE', "%$search%")
                        ->orWhere('username', 'LIKE', "%$search%");
                }
            )
            ->orWhereHas(
                'class',
                function ($class) use ($search) {
                    $class->where('grade', 'LIKE', "%$search%")
                        ->orWhere('code', 'LIKE', "%$search%")
                        ->orWhereHas('major', function ($major) use ($search) {
                            $major->where('name', 'LIKE', "%$search%");
                        });
                }
            );
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function class()
    {
        return $this->belongsTo(IClass::class);
    }

    public function tuition()
    {
        return $this->belongsTo(Tuition::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
