<?php

namespace Api\AppBase\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use App\Components\Signature\Http\Controllers\SignatureController as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Onsigbaar\Foundation\Base\Traits\LogMessage;

abstract class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests, LogMessage;
}
