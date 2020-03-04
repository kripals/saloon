<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCustomerAppointment extends FormRequest
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
            "service"       => 'required',
            "date"          => 'required',
            "time"          => 'required',
            "duration"      => 'required',
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
    public function clientData()
    {
        return $data = [
            'first_name'    => $this->get('first_name'),
            'last_name'     => $this->get('last_name'),
            'gender'        => $this->get('gender'),
            'mobile_number' => $this->get('mobile_number'),
            'address'       => $this->get('address'),
            'branch_id'     => $this->get('branch')
        ];
    }

    /**
     * @return array
     */
    public function appointmentData($client_id)
    {
        return $data = [
            'client_id'   => $client_id,
            'date'        => $this->get('date'),
            'time'        => $this->get('time') . ":00",
            'duration'    => $this->get('duration'),
            'branch_id'   => $this->get('branch')
        ];
    }
}
