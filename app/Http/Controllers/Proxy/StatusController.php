<?php

namespace App\Http\Controllers\Proxy;

use App\Http\Controllers\Controller;
use App\Http\Requests\GetStatusFormRequest;
use App\Services\SmsService;
use Illuminate\Http\JsonResponse;

class StatusController extends Controller
{
    public function __invoke(GetStatusFormRequest $request): JsonResponse
    {
        return response()->json(...SmsService::getStatus($request->validated()));
    }
}
