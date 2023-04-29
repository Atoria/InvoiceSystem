<?php

declare(strict_types=1);

namespace App\Modules\Invoices\Api\Dto;

use App\Domain\Enums\StatusEnum;
use App\Domain\Models\Company;
use App\Domain\Models\Invoice;
use Ramsey\Uuid\UuidInterface;

final readonly class InvoiceDto
{
    public string $number;
    public string $date;
    public string $due_date;

    public function __construct(Invoice $invoice)
    {
        $this->number = $invoice->number;
        $this->date = $invoice->date;
        $this->due_date = $invoice->due_date;

    }
}
