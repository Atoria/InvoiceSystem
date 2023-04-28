<?php

namespace App\Modules\Approval\Infrastructure\Listeners;

use App\Domain\Enums\StatusEnum;
use App\Domain\Models\Invoice;
use App\Modules\Approval\Api\Dto\InvoiceDto;
use App\Modules\Approval\Api\Events\EntityApproved;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class EntityApprovedListener
{
    /**
     * Handle the event.
     *
     * @param \Illuminate\Auth\Events\Registered $event
     * @return void
     */
    public function handle(EntityApproved $event): InvoiceDto
    {
        $invoice = Invoice::find($event->approvalDto->id);
        $invoice->status = StatusEnum::APPROVED->value;
        $invoice->save();
        return new InvoiceDto($invoice);
    }
}
