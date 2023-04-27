<?php

namespace App\Domain\Utils;
class ErrorResponse extends ApiResponse
{
    public function __construct(int $code, string $message)
    {
        parent::__construct($code, $message, null);
    }
}
