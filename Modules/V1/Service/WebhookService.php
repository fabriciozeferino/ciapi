<?php

namespace Modules\V1\Service;

use Modules\V1\Exceptions\WebhookFailed;


class WebhookService
{
    public $notification;

    /* public function __construct()
    { } */

    public function factory($request)
    {
        switch ($request->object_kind) {

            case 'issue':
                $object = new IssueParse($request);
                break;

            case 'pipeline':
                $object = new PipelineClass($request);
                break;

            default:
                throw (new WebhookFailed("Request factory could not create request of species" . $request->object_kind));
                break;
        }
        return $object;
    }

    public function buildNotification($request)
    {

        try {
            logger()->info($request);

            $this->notification = $this->factory($request);

            $this->notification->sendNotification();

            dump($this->notification);

            logger()->info('Notification ' . get_class($this->notification) . ' requested.');
        } catch (WebhookFailed $th) {
            throw new WebhookFailed('API faild');
        }
    }
}
