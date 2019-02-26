<?php

namespace Modules\V1\Service;

use Modules\V1\Notifications\issueNotification;
use Illuminate\Support\Facades\Notification;



class IssueParse
{
    public $object_kind;
    public $issue_title;
    public $issue_description;
    public $issue_state;
    public $assigned_to_name;
    public $assigned_to_avatar;
    public $updated_at;
    public $changes;

    public function __construct($request)
    {
        $this->object_kind = $request->object_kind;

        $this->issue_title = $request->object_attributes['title'];

        $this->issue_description = $request->object_attributes['description'];

        $this->issue_state = $request->object_attributes['state'];

        $this->assigned_to_name = $request->assignee['name'];

        $this->assigned_to_avatar = $request->assignee['avatar_url'];

        $this->updated_at = $request->changes['updated_at'];

        $this->changes = $request['changes'];
    }

    public function sendNotification()
    {
        Notification::route('mail', '3c351ec7a-0e3161@inbox.mailtrap.io')
            ->notify(
                new issueNotification($this)
            );
    }
}
