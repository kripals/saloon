<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUser extends FormRequest
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
            'name'     => 'required|min:3|unique:users,name',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'branch'   => 'required|exists:branches,id',
        ];
    }

    /**
     * @return array
     */
    public function data()
    {
        return $data = [
            'name'      => $this->get('name'),
            'email'     => $this->get('email'),
            'password'  => bcrypt($this->get('password')),
            'branch_id' => $this->get('branch'),
        ];
    }
}
