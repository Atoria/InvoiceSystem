<?php

namespace App\Modules\Approval\Infrastructure\Listeners;

use App\Modules\Approval\Api\Events\EntityApproved;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class EntityApprovedListener
{
    /**
     * Handle the event.
     *
     * @param  \Illuminate\Auth\Events\Registered  $event
     * @return void
     */
    public function handle(EntityApproved $event)
    {
        return 'approved';
    }
}
