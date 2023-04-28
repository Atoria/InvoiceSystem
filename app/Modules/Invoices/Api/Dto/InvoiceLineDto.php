<?php

declare(strict_types=1);

namespace App\Modules\Invoices\Api\Dto;

use App\Domain\Enums\StatusEnum;
use App\Domain\Models\InvoiceProductLine;
use Ramsey\Uuid\UuidInterface;

final readonly class InvoiceLineDto
{
    public int $quantity;
    public string $name;
    public float $price;
    public float $totalAmount;

    public function __construct(InvoiceProductLine $invoiceProductLine)
    {
        $this->quantity = $invoiceProductLine->quantity;
        $this->name = $invoiceProductLine->product->name;
        $this->price = round($invoiceProductLine->product->price / 100, 2);
        $this->totalAmount = round(($invoiceProductLine->product->price * $invoiceProductLine->quantity) / 100, 2);
    }
}
