<?php

declare(strict_types=1);

namespace App\Modules\Invoices\Api\Dto;

use App\Domain\Enums\StatusEnum;
use Ramsey\Uuid\UuidInterface;

final readonly class InvoiceLineDto
{
    public int $quantity;
    public string $name;
    public float $price;
    public float $totalAmount;

    public function __construct($data)
    {
        $this->quantity = $data['quantity'];
        $this->name = $data['name'];
        $this->price = (float)$data['price'];
        $this->totalAmount = (float)$data['amount'];
    }
}
