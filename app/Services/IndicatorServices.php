<?php

namespace App\Services;

use App\Models\Indicator;
use App\Models\Payment;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class IndicatorServices
{
    private $url;

    public function __construct()
    {
        $this->url = config('api.dollar');
    }

    public function getIndicator(Payment $payment)
    {
        try {
            $indicator = $this->getValueDay();

            $payment->clp_usd = $indicator->value;
            $payment->update();

        } catch (\Exception $e) {
            Log::error($e->getMessage());
        }
    }

    public function getValueDay()
    {
        try {
            $value = Indicator::whereDate('created_at', now())->first();

            return $value == null ? $this->resquestIndicator() : $value;

        } catch (\Exception $e) {
            Log::error($e->getMessage());
        }
    }

    public function resquestIndicator()
    {
        try {
            $response = Http::get($this->url)->json()['serie'][0];

            $parseDate = \Carbon\Carbon::parse($response['fecha'], 'UTC')->format("Y-m-d");

            $indicator = Indicator::create([
                'value' => $response['valor'],
                'date' => $parseDate
            ]);

            return $indicator;
        } catch (\Exception $e) {
            Log::error($e->getMessage());
        }
    }
}
