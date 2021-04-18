<?php

namespace Database\Factories;

use App\Models\Payment;
use Illuminate\Database\Eloquent\Factories\Factory;

class PaymentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Payment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'officer_id' => 2,
            'student_id' => 1,
            'tuition_id' => 1,
            'amount_paid' => 300000,
            'bills_date' => '2021-04',
            'paid_at' => now(),
        ];
    }
}
