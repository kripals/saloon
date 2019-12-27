<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBranch extends FormRequest
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
            "location"     => 'required',
            "phone_number" => 'required',
            "open_time"    => 'required',
            "close_time"   => 'required'
        ];
    }

    /**
     * @return array
     */
    public function data()
    {
        return $data = [
            'location'     => $this->get('location'),
            'phone_number' => $this->get('phone_number'),
            'open_time'    => $this->get('open_time'),
            'close_time'   => $this->get('close_time')
        ];
    }
}
