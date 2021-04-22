<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\HomeResource;
use App\Http\Resources\PaymentCollection;
use App\Models\Payment;
use App\Models\Student;

class HomeController extends Controller
{
    public function index()
    {
        $data = [
            'total_student' => Student::count(),
            'total_payment_today' => Payment::whereDate('created_at', today())->count(),
            'total_payment_all' => Payment::count(),
        ];

        return new HomeResource($data);
    }

    public function getTodayPayments()
    {
        return new PaymentCollection(
            Payment::with('officer', 'student', 'officer.user', 'student.user')->whereDate('paid_at', today())->latest()->paginate(10)
        );
    }
}
