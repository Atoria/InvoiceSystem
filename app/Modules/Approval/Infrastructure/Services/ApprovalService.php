<?php

namespace App\Modules\Approval\Infrastructure\Services;

use App\Domain\Enums\StatusEnum;
use App\Domain\Models\Invoice;
use App\Domain\Transformers\Response\ApiResponse;
use App\Domain\Transformers\Response\ErrorResponse;
use App\Domain\Transformers\Response\SuccessResponse;
use App\Modules\Approval\Api\Dto\ApprovalDto;
use App\Modules\Approval\Application\ApprovalFacade;
use Ramsey\Uuid\Uuid;

class ApprovalService
{
    private readonly ApprovalFacade $approvalFacade;

    public function __construct(ApprovalFacade $approvalFacade)
    {
        $this->approvalFacade = $approvalFacade;
    }

    public function approveInvoice($id): ApiResponse
    {
        $invoice = Invoice::find($id);

        if (!$invoice) {
            return new ErrorResponse(404, 'Invoice not found');
        }

        $dto = new ApprovalDto(Uuid::fromString($invoice->id), StatusEnum::from($invoice->status), $invoice->id);
        try {
            $result = $this->approvalFacade->approve($dto);
            return new SuccessResponse(200, $result);
        } catch (\LogicException $exception) {
            return new ErrorResponse(422, $exception->getMessage());
        } catch (\Exception $exception) {
            return new ErrorResponse(500, $exception->getMessage());
        }
    }

    public function rejectInvoice($id): ApiResponse
    {
        $invoice = Invoice::find($id);

        if (!$invoice) {
            return new ErrorResponse(404, 'Invoice not found');
        }

        $dto = new ApprovalDto(Uuid::fromString($invoice->id), StatusEnum::from($invoice->status), $invoice->id);
        try {
            $result = $this->approvalFacade->reject($dto);
            return new SuccessResponse(200, $result);
        } catch (\LogicException $exception) {
            return new ErrorResponse(422, $exception->getMessage());
        } catch (\Exception $exception) {
            return new ErrorResponse(500, $exception->getMessage());
        }
    }

}
