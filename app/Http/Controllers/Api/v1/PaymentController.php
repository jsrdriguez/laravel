<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\PaymentRequest;
use App\Http\Resources\Json\PaymentJson;
use App\Http\Resources\PaginatedCollection;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PaymentController extends Controller
{
    public function client(Request $request)
    {
        $payments = Payment::where('user_id', $request->client)->paginate(10);

        $response = new PaginatedCollection($payments, PaymentJson::class);

        return response()->json($response);
    }

    public function store(PaymentRequest $request)
    {
        $payment = Payment::create([
            "id"           => Str::uuid(),
            "payment_date" => now(),
            "expires_at"   => $request->expires_at,
            "status"       => Payment::STATUS_PENDING,
            "user_id"      => $request->user_id,
        ]);

        return response()->json(new PaymentJson($payment),201);
    }
}
