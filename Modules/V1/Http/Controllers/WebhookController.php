<?php

namespace Modules\V1\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\V1\Service\WebhookFactory;


class WebhookController extends Controller
{
    /**
     * Handle Request
     * @return Request
     */
    public function handle(Request $request)
    {
        return (new WebhookFactory)->buildNotification($request);
    }
}
