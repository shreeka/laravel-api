<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BulkStoreInvoiceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            '*.customerId' => ['required','integer'],
            '*.amount' => ['required','numeric'],
            '*.status' => ['required',Rule::in(['B','P','V','b','p','v'])],
            '*.billedDate' => ['required','date_format:Y-m-d H:i:s'],
            '*.paidDate' => ['nullable','date_format:Y-m-d H:i:s'],
        ];
    }

    protected function prepareForValidation(): void
    {
        $data = [];
        foreach ($this->toArray() as $invoiceObj) {
            $invoiceObj['customer_id'] = $invoiceObj['customerId'] ?? null;
            $invoiceObj['billed_date'] = $invoiceObj['billedDate'] ?? null;
            $invoiceObj['paid_date'] = $invoiceObj['paidDate'] ?? null;
            $data[] = $invoiceObj;
        }
        $this->merge($data);

    }


}
