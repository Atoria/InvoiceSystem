<?php

namespace Tests\Feature;

use App\Domain\Enums\StatusEnum;
use App\Domain\Models\Company;
use App\Domain\Models\Invoice;
use App\Domain\Models\InvoiceProductLine;
use Database\Factories\Domain\Models\InvoiceProductLineFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class ApprovalTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Check if pending invoice gets approved
     *
     * @return void
     */
    public function test_approving_invoice()
    {
        $invoice = Invoice::factory()->create([
            'status' => StatusEnum::DRAFT
        ]);
        $response = $this->patch("/api/approve/$invoice->id");
        $response->assertStatus(200);
    }


    /**
     *  Check if pending invoice gets rejected
     *
     * @return void
     */
    public function test_rejecting_invoice()
    {
        $invoice = Invoice::factory()->create([
            'status' => StatusEnum::DRAFT
        ]);
        $response = $this->patch("/api/reject/$invoice->id");
        $response->assertStatus(200);
    }

    /**
     *  Check approval for approved/rejected invoice
     *
     * @return void
     */
    public function test_changing_assigned_invoice_status()
    {
        $invoice = Invoice::factory()->create([
            'status' => StatusEnum::APPROVED
        ]);
        $responseReject = $this->patch("/api/reject/$invoice->id");
        $responseReject->assertStatus(422);

        $responseApprove = $this->patch("/api/approve/$invoice->id");
        $responseApprove->assertStatus(422);


        $invoice = Invoice::factory()->create([
            'status' => StatusEnum::REJECTED
        ]);
        $responseReject = $this->patch("/api/reject/$invoice->id");
        $responseReject->assertStatus(422);

        $responseApprove = $this->patch("/api/approve/$invoice->id");
        $responseApprove->assertStatus(422);



    }
    /**
     *  Check approval for invalid invoice
     *
     * @return void
     */
    public function test_change_invalid_invoice_status()
    {
        $invoice = Invoice::factory()->create([
            'status' => StatusEnum::DRAFT
        ]);
        $response = $this->patch("/api/reject/test");
        $response->assertStatus(404);
    }
}
