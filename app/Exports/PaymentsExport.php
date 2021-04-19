<?php

namespace App\Exports;

use App\Models\Payment;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class PaymentsExport implements FromCollection, WithHeadings, WithMapping
{
    private $startDate;
    private $endDate;

    public function __construct($startDate, $endDate)
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Payment::with('student', 'student.user', 'officer', 'officer.user')
            ->when($this->startDate != "" && $this->endDate != "", function ($query) {
                $query->whereBetween('paid_at', [$this->startDate . ' 00:00:00', $this->endDate . ' 23:59:59']);
            })
            ->get();
    }

    public function headings(): array
    {
        return [
            'No',
            'Nama Siswa',
            'Nama Petugas',
            'Jumlah Bayar',
            'Di Bayar Tanggal',
            'Di Bayar Jam',
        ];
    }

    /**
     * @var Payment $payment
     */
    public function map($payment): array
    {
        return [
            $payment->id,
            $payment->student->user->name,
            $payment->officer->user->name,
            $payment->amount_paid,
            $payment->created_at->isoFormat('d MMMM Y'),
            $payment->created_at->format('H:i:s'),
        ];
    }
}
