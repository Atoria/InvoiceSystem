<?php

namespace App\Infrastructure\Http\Controllers;


use App\Domain\Enums\StatusEnum;
use App\Infrastructure\Controller;
use App\Modules\Approval\Api\Dto\ApprovalDto;
use App\Modules\Approval\Application\ApprovalFacade;
use App\Modules\Approval\Infrastructure\Requests\ApproveRequest;
use App\Modules\Approval\Infrastructure\Requests\RejectRequest;


class ApprovalController extends Controller
{
    public function approve(ApproveRequest $request, ApprovalFacade $facade)
    {

    }

    public function reject(RejectRequest $request)
    {

    }

}
