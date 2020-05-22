<?php

namespace App\Jobs;

use App\Events\PaymentPaid;
use App\Models\Payment;
use App\Services\IndicatorServices;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class ProcessIndicatorDollar implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $indicator;
    public $payment;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(IndicatorServices $indicator,  Payment $payment)
    {
        $this->payment = $payment;
        $this->indicator = $indicator;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->indicator->getIndicator($this->payment);
    }
}
