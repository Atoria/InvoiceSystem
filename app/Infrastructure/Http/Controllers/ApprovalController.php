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

    public function approve(ApproveRequest $request)
    {
        $data = $request->validated();

        $result = $this->approvalService->approveInvoice($data['id']);
        return response()->json($result->toArray(), $result->getCode());

    }

    public function reject(RejectRequest $request)
    {
        $data = $request->validated();

        $result = $this->approvalService->rejectInvoice($data['id']);
        return response()->json($result->toArray(), $result->getCode());
    }

}
