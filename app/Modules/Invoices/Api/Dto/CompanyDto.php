<?php

declare(strict_types=1);

namespace App\Modules\Invoices\Api\Dto;

use App\Domain\Enums\StatusEnum;
use App\Domain\Models\Company;
use Ramsey\Uuid\UuidInterface;

final readonly class CompanyDto
{
    public string $id;
    public string $name;
    public string $street;
    public string $city;
    public string $zip;
    public string $phone;
    public string $email;

    public function __construct(Company $company)
    {
        $this->id = $company->id;
        $this->name = $company->name;
        $this->street = $company->street;
        $this->city = $company->city;
        $this->zip = $company->zip;
        $this->phone = $company->phone;
        $this->email = $company->email;

    }
}
