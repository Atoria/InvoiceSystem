<?php

namespace App\Infrastructure\Http\Controllers;


use App\Infrastructure\Controller;
use App\Modules\Approval\Infrastructure\Requests\ApproveRequest;
use App\Modules\Approval\Infrastructure\Requests\RejectRequest;
use App\Modules\Approval\Infrastructure\Services\ApprovalService;
use Illuminate\Http\Request;


class ApprovalController extends Controller
{

    private readonly ApprovalService $approvalService;

    public function __construct(ApprovalService $approvalService)
    {
        $this->approvalService = $approvalService;
    }

    public function approve($id)
    {
        $result = $this->approvalService->approveInvoice($id);
        return response()->json($result->toArray(), $result->getCode());

    }

    public function reject($id)
    {
        $result = $this->approvalService->rejectInvoice($id);
        return response()->json($result->toArray(), $result->getCode());
    }

}
