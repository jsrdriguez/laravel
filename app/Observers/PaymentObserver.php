<?php

namespace App\Observers;

use App\Events\PaymentPaid;
use App\Jobs\ProcessIndicatorDollar;
use App\Models\Payment;
use App\Services\IndicatorServices;

class PaymentObserver
{
    private $indicator;

    public function __construct(IndicatorServices $indicator)
    {
        $this->indicator = $indicator;
    }

    public function created(Payment $payment)
    {
        ProcessIndicatorDollar::dispatch($this->indicator, $payment);

        event(new PaymentPaid($payment, $payment->user));
    }
}
