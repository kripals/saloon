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
            "date"     => 'required',
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
            'employee_id' => $this->get('employee'),
            'date'        => $this->get('date'),
            'time'        => $this->get('time') . ":00",
            'duration'    => $this->get('duration'),
            'branch_id'     => auth()->user()->branch_id
        ];
    }
}
