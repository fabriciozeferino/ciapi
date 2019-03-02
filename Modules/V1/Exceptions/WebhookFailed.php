<?php

namespace  Modules\V1\Exceptions;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Http\Client\Exception\RequestException;


use Exception;

class WebhookFailed extends Exception
{
    /* public static function jobClassDoesNotExist(string $jobClass)
    {
        // {$webhookCall->id}` of type `{$webhookCall->type}

        return new static("Could not process webhook id ` because the configured jobclass `$jobClass` does not exist.");
    } */

    public function render($request, Exception $exception)
    {
        if ($exception instanceof ModelNotFoundException) {
            return response()->json(['error' => 'Entry for ' . str_replace('App\\', '', $exception->getModel()) . ' not found'], 404);
        } else if ($exception instanceof GithubAPIException) {
            return response()->json(['error' => $exception->getMessage()], 500);
        } else if ($exception instanceof RequestException) {
            return response()->json(['error' => 'External API call failed.'], 500);
        }

        return parent::render($request, $exception);
    }
}
