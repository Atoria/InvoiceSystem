<?php

namespace App\Infrastructure\Http\Controllers;


use App\Infrastructure\Controller;
use App\Modules\Invoices\Infrastructure\Services\InvoiceService;

class InvoiceController extends Controller
{

    private readonly InvoiceService $invoiceService;

    public function __construct(InvoiceService $invoiceService)
    {
        $this->invoiceService = $invoiceService;
    }

    public function list($id)
    {
        $result = $this->invoiceService->getInvoiceData($id);
        return response()->json($result->toArray(), $result->getCode());

    }

}
