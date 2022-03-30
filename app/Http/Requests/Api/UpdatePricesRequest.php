<?php

namespace App\Http\Requests\Api;

use App\Rules\Api\UuidRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePricesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'product_id' => ['string', 'exists:products,id'],
            'prices' => ['present', 'array'],
            'prices.*.id' => ['required', new UuidRule(), 'exists:prices,id'],
            'prices.*.price' => ['required', 'numeric', 'min:1', 'max:500000']
        ];
    }

    /**
     * Catch product_id from get
     * @return void
     */
    protected function prepareForValidation()
    {
        $this->merge(['product_id' => $this->route('product_id')]);
    }
}
