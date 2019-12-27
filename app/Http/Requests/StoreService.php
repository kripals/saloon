<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreService extends FormRequest
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
            "name"     => 'required',
            "cost_per" => 'required',
            "price"    => 'required'
        ];
    }

    /**
     * @return array
     */
    public function data()
    {
        return $data = [
            'name'     => $this->get('name'),
            'cost_per' => $this->get('cost_per'),
            'price'    => $this->get('price')
        ];
    }
}
