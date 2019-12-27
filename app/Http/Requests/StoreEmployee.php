<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployee extends FormRequest
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
            "first_name"   => 'required',
            "last_name"    => 'required',
            "in_time"      => 'required',
            "out_time"     => 'required',
            "phone_number" => 'required',
            "address"      => 'required'
        ];
    }

    /**
     * @return array
     */
    public function data()
    {
        return $data = [
            'first_name'   => $this->get('first_name'),
            'last_name'    => $this->get('last_name'),
            'in_time'      => $this->get('in_time'),
            'out_time'     => $this->get('out_time'),
            'phone_number' => $this->get('phone_number'),
            'address'      => $this->get('address')
        ];
    }
}
