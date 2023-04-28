<?php

declare(strict_types=1);

namespace App\Modules\Approval\Api\Dto;

use App\Domain\Enums\StatusEnum;
use App\Domain\Models\Invoice;
use Ramsey\Uuid\UuidInterface;

final readonly class InvoiceDto
{

    public string $id;
    public string $number;
    public string $date;
    public string $due_date;
    public string $company_id;
    public string $status;

    public function __construct(Invoice $invoice)
    {
        $this->id = $invoice->id;
        $this->number = $invoice->number;
        $this->date = $invoice->date;
        $this->due_date = $invoice->due_date;
        $this->company_id = $invoice->company_id;
        $this->status = $invoice->status;
    }
}
