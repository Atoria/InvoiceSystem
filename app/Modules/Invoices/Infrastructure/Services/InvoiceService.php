<?php

namespace App\Modules\Invoices\Infrastructure\Services;

use App\Domain\Models\Invoice;
use App\Domain\Models\InvoiceProductLine;
use App\Domain\ResultTransformers\ApiResponse;
use App\Domain\ResultTransformers\ErrorResponse;
use App\Domain\ResultTransformers\SuccessResponse;
use App\Modules\Invoices\Api\Dto\CompanyDto;
use App\Modules\Invoices\Api\Dto\InvoiceDto;
use App\Modules\Invoices\Api\Dto\InvoiceLineDto;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\In;

class InvoiceService
{

    public function getInvoiceData($id): ApiResponse
    {
        $invoice = Invoice::find($id);

        if (!$invoice) {
            return new ErrorResponse(404, 'Invoice not found');
        }

        $invoiceLines = InvoiceProductLine::with(['invoice','product'])
            ->where('invoice_product_lines.invoice_id', $id)
            ->get();

        if (!$invoiceLines) {
            return new ErrorResponse(404, 'Invoice lines not found');
        }

        $total = 0;
        $list = [];
        foreach ($invoiceLines as $invoiceLine) {
            $lineDto = new InvoiceLineDto($invoiceLine);
            $total += $lineDto->totalAmount;
            $list[] = $lineDto;
        }

        $result = [
            'list' => $list,
            'total' => round($total, 2),
            'company' => $invoice->company ? new CompanyDto($invoice->company) : null,
            'invoice'=> new InvoiceDto($invoice)
        ];

        return new SuccessResponse(200,$result);
    }
}
