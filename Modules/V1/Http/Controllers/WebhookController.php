<?php

namespace Modules\V1\Http\Controllers;

use Illuminate\Routing\Controller;

use Illuminate\Http\Request;
use Modules\V1\Service\WebhookService;


class WebhookController extends Controller
{
    public $webhookService;

    public function __construct(WebhookService $webhookService)
    {
        $this->webhookService = $webhookService;
    }

    /**
     * Handle Request
     * @return Request
     */
    public function handle(Request $request)
    {
        return $this->webhookService->buildNotification($request);
    }
}
