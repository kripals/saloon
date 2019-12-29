<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAppointment extends FormRequest
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
            "client"   => 'required',
            "service"  => 'required',
            "employee" => 'required',
            "time"     => 'required',
            "duration" => 'required'
        ];
    }

    /**
     * @return array
     */
    public function data()
    {
        return $data = [
            'client_id'   => $this->get('client'),
            'service_id'  => $this->get('service'),
            'employee_id' => $this->get('employee'),
            'time'        => $this->get('time'),
            'duration'    => $this->get('duration'),
        ];
    }
}
