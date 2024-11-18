<?php

namespace App\Http\Controllers\Proxy;

use App\Http\Controllers\Controller;
use App\Http\Requests\CancelNumberFormRequest;
use App\Services\SmsService;
use Illuminate\Http\JsonResponse;

class CancelNumberController extends Controller
{
    public function __invoke(CancelNumberFormRequest $request): JsonResponse
    {
        return response()->json(...SmsService::cancelNumber($request->validated()));
    }
}
