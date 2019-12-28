<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUser extends FormRequest
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
            'name'   => 'required|min:3|unique:users,name',
            'email'  => 'required|email|unique:users,email',
            'branch' => 'required|exists:branches,id',
        ];
    }

    /**
     * @return array
     */
    public function data()
    {
        $data = [
            'name'   => $this->get('name'),
            'email'  => $this->get('email'),
            'branch' => $this->get('branch_id'),
        ];

        if ($this->has('password'))
        {
            $data['password'] = bcrypt($this->get('password'));
        }

        return $data;
    }
}
