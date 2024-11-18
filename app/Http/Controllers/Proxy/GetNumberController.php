<?php

namespace App\Http\Controllers\Proxy;

use App\Http\Controllers\Controller;
use App\Http\Requests\GetNumberFormRequest;
use App\Services\SmsService;
use Illuminate\Http\JsonResponse;

class GetNumberController extends Controller
{
    public function __invoke(GetNumberFormRequest $request): JsonResponse
    {
        return response()->json(...SmsService::getNumber($request->getDTO()));
    }
}
