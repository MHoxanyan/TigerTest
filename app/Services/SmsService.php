<?php

namespace App\Services;

use App\DTO\GetNumberDTO;
use App\Enums\ActionType;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Facades\Http;

class SmsService
{
    private static $instance;

    private function __construct(
        private readonly string $url,
        private readonly string $token,
    ) {
    }

    public static function getNumber(GetNumberDTO $params): array
    {
        return self::getInstance()
            ->sendRequest(ActionType::getNumber, $params);
    }

    public static function getSms(array $params): array
    {
        return self::getInstance()
            ->sendRequest(ActionType::getSms, $params);
    }

    public static function cancelNumber(array $params): array
    {
        return self::getInstance()
            ->sendRequest(ActionType::cancelNumber, $params);
    }

    public static function getStatus(array $params): array
    {
        return self::getInstance()
            ->sendRequest(ActionType::getStatus, $params);
    }


    private function sendRequest(ActionType $type, array|Arrayable $params): array
    {
        $params = is_array($params)
            ? $params
            : $params->toArray();

        $resp = Http::withHeaders(['Accept' => 'application/json'])
            ->get(
                $this->url,
                http_build_query([
                    ...$params,
                    'token' => $this->token,
                    'action' => $type->value,
                ])
            );

        return [$resp->json(), $resp->getStatusCode()];
    }

    private static function getInstance(): self
    {
        if (self::$instance) {
            return self::$instance;
        }

        return self::$instance = new self(
            url: config('sms.url'),
            token: config('sms.token'),
        );
    }
}
