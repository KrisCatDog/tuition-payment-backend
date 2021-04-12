<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Officer extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function scopeSearch($query, $search)
    {
        return $query
            ->whereHas(
                'user',
                function ($user) use ($search) {
                    $user->where('name', 'LIKE', "%$search%")
                        ->orWhere('username', 'LIKE', "%$search%")
                        ->orWhereHas('role', function ($role) use ($search) {
                            $role->where('name', 'LIKE', "%$search%");
                        });
                }
            );
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
