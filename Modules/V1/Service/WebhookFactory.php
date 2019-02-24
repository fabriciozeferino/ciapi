<?php

namespace Modules\V1\Service;

class WebhookFactory
{
    public $simpleFactory;

    public function __construct()
    {
        $this->simpleFactory = new SimpleFactory();
    }

    public function buildNotification($request)
    {
        $notification = $this->simpleFactory->factory($request);

        return $notification->notification();
    }
}
