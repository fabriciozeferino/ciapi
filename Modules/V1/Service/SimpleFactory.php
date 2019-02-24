<?php

namespace Modules\V1\Service;

use Exception;

class SimpleFactory
{
    public function factory($request)
    {
        switch ($request->object_kind) {

            case 'issue':
                $object = new IssueClass($request);
                break;

            case 'pipeline':
                $object = new PipelineClass($request);
                break;

            default:
                throw (new \Exception("Request factory could not create request of species . $request->object_kind"));
                break;
        }
        return $object;
    }
}
