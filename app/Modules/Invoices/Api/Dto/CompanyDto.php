<?php

declare(strict_types=1);

namespace App\Modules\Invoices\Api\Dto;

use App\Domain\Enums\StatusEnum;
use Ramsey\Uuid\UuidInterface;

final readonly class CompanyDto
{
    public int $id;
    public string $name;
    public string $street;
    public string $city;
    public string $zip;
    public string $phone;
    public string $email;

    public function __construct($data)
    {
        $this->id = $data['id'];
        $this->name = $data['name'];
        $this->street = $data['street'];
        $this->city = $data['city'];
        $this->zip = $data['zip'];
        $this->phone = $data['phone'];
        $this->email = $data['email'];

    }
}
