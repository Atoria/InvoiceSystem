<?php

namespace Tests\Feature;

use App\Domain\Models\Company;
use App\Domain\Models\Invoice;
use App\Domain\Models\InvoiceProductLine;
use Database\Factories\Domain\Models\InvoiceProductLineFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class InvoiceTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Check list of the invoices for existing id
     *
     * @return void
     */
    public function test_check_valid_invoice_data()
    {
        $len = 5;
        $invoice = Invoice::factory()->create();
        $invoiceLines = InvoiceProductLine::factory()
            ->count($len)
            ->for($invoice)
            ->create();

        $response = $this->get("/api/invoice/$invoice->id/lines");
        $result = $response->decodeResponseJson()->json();


        $this->assertEquals($len, count($result['data']['list']));
        $this->assertEquals($invoice->company_id, $result['data']['company']['id']);
        $response->assertStatus(200);
    }


    /**
     *  Check list of the invoices for non-existing id
     *
     * @return void
     */
    public function test_check_invalid_id()
    {
        $invoice = Invoice::factory()->create();

        $response = $this->get("/api/invoice/randomid/lines");
        $response->assertStatus(404);
    }
}
