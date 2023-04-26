<?php

namespace App\Modules\Invoices\Infrastructure\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GetInvoicesRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'limit' => ['required', 'integer'],
            'offset' => ['required', 'integer'],
            'id' => ['required','integer']
        ];
    }
}
