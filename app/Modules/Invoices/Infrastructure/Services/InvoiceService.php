<?php

namespace App\Modules\Invoices\Infrastructure\Services;

use App\Domain\Models\Invoice;
use App\Domain\Models\InvoiceProductLine;
use App\Domain\Utils\ApiResponse;
use App\Domain\Utils\ErrorResponse;
use App\Domain\Utils\SuccessResponse;
use App\Modules\Invoices\Api\Dto\CompanyDto;
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

        $invoiceLines = InvoiceProductLine::select(
            'invoice_product_lines.quantity',
            'products.name',
            DB::raw('ROUND(products.price / 100,2) as price'),
            DB::raw('ROUND((products.price * invoice_product_lines.quantity) / 100,2) as amount'),
        )
            ->with('invoice')
            ->join('products', 'invoice_product_lines.product_id', '=', 'products.id')
            ->where('invoice_product_lines.invoice_id', '=', $id)
            ->get()
            ->toArray();

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
            'company' => new CompanyDto($invoice->company->toArray()),
        ];

        return new SuccessResponse(200,$result);
    }
}
