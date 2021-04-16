<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'paid_at' => 'datetime',
        'bills_date' => 'date',
    ];

    public function scopeSearch($query, $search)
    {
        return $query->where('amount_paid', 'LIKE', "%$search%")
            ->orWhereHas(
                'officer',
                function ($officer) use ($search) {
                    $officer->whereHas('user', function ($user) use ($search) {
                        $user->where('name', 'LIKE', "%$search%");
                    });
                }
            )->orWhereHas(
                'student',
                function ($officer) use ($search) {
                    $officer->whereHas('user', function ($user) use ($search) {
                        $user->where('name', 'LIKE', "%$search%");
                    });
                }
            );
    }

    public function officer()
    {
        return $this->belongsTo(Officer::class);
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
