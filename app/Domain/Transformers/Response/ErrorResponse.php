<?php

namespace App\Domain\Transformers\Response;

class ErrorResponse extends ApiResponse
{
    public function __construct(int $code, string $message)
    {
        parent::__construct($code, $message, null);
    }
}
