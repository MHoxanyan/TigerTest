<?php

namespace App\Http\Controllers\Proxy;

use App\Http\Controllers\Controller;
use App\Http\Requests\GetSmsFormRequest;
use App\Services\SmsService;

class GetSmsController extends Controller
{
    public function __invoke(GetSmsFormRequest $request)
    {
        return response()->json(...SmsService::getSms($request->validated()));
    }
}
