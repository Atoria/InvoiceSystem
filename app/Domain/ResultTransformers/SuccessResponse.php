<?php

namespace App\Domain\ResultTransformers;
class SuccessResponse extends ApiResponse
{
    public function __construct(int $code, array $data)
    {
        parent::__construct($code, null, $data);
    }
}
