<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateClient extends FormRequest
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
            "first_name"    => 'required',
            "last_name"     => 'required',
            "gender"        => 'required',
            "mobile_number" => 'required',
            "address"       => 'required'
        ];
    }

    /**
     * @return array
     */
    public function data()
    {
        return $data = [
            'first_name'    => $this->get('first_name'),
            'last_name'     => $this->get('last_name'),
            'gender'        => $this->get('gender'),
            'mobile_number' => $this->get('mobile_number'),
            'address'       => $this->get('address'),
            'branch_id'     => auth()->user()->branch_id
        ];
    }
}
