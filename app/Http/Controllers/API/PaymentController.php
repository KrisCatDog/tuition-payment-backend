<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\StorePaymentRequest;
use App\Http\Resources\PaymentCollection;
use App\Http\Resources\PaymentResource;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return new PaymentCollection(Payment::with('officer', 'student')->latest()->paginate($request->per_page));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\API\StorePaymentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePaymentRequest $request)
    {
        return (new PaymentResource(auth()->user()->officer->payments()->create(
            array_merge($request->validated(), ['paid_at' => now()])
        )->load('officer', 'student')))
            ->additional(['message' => "Payment has been Submitted successfully"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        return new PaymentResource($payment->load('officer', 'student'));
    }
}
