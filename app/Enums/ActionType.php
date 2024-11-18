<?php

namespace App\Enums;

enum ActionType: string
{
    case getNumber = 'getNumber';
    case getSms = 'getSms';
    case cancelNumber = 'cancelNumber';
    case getStatus = 'getStatus';
}
