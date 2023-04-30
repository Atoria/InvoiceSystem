<?php

namespace App\Domain\Transformers\Response;

class SuccessResponse extends ApiResponse
{
    public function __construct(int $code, array $data)
    {
        parent::__construct($code, null, $data);
    }
}
