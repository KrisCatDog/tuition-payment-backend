<?php

namespace App\Http\Controllers\API;

use App\Exports\PaymentsExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\StorePaymentRequest;
use App\Http\Resources\PaymentCollection;
use App\Http\Resources\PaymentResource;
use App\Models\Payment;
use App\Models\Student;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

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
        return new PaymentCollection(
            Payment::with('officer', 'student', 'officer.user', 'student.user')
                ->search($request->search)->latest()->paginate($request->per_page)
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\API\StorePaymentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePaymentRequest $request)
    {
        $student = Student::find($request->student_id);
        $payment = auth()->user()->officer->payments()->create(
            array_merge($request->validated(), ['paid_at' => now(), 'tuition_id' => $student->tuition->id])
        )->load('officer', 'student');

        return (new PaymentResource($payment))
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

    public function export(Request $request)
    {
        return Excel::download(
            new PaymentsExport($request->start_date, $request->end_date),
            'Laporan Pembayaran SPP.xlsx'
        );
    }

    public function exportPDF(Request $request)
    {
        $data = [
            'logo' => public_path('img/logo.jpg'),
            'payments' => Payment::with('officer', 'student', 'officer.user', 'student.user')
                ->when($request->start_date != "" && $request->end_date != "", function ($query) use ($request) {
                    $query->whereBetween('paid_at', [$request->start_date . ' 00:00:00', $request->end_date . ' 23:59:59']);
                })
                ->get()
        ];

        $pdf = PDF::loadView('pdf.payment-report', $data);

        return $pdf->download('Laporan Pembayaran SPP.pdf');
    }
}
