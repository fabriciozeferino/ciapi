<?php

namespace Modules\V1\Service;

class IssueClass
{
    public $request;

    public function __construct($request)
    {
        $this->request = $request;
    }

    public function notification()
    {

        return $this->request->changes;
    }
}
