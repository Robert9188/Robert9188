<?php

namespace App\Http\Requests\Employee;

use App\Models\Employee;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class AddPersonnelRequest extends FormRequest
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
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone' => 'required|string',
            'role' => 'required|string',
            'email' => 'required|string|email|max:255|unique:employees',
            'password' => 'required|string|confirmed|min:8',
        ];
    }

    public function addPersonnel()
    {
//        dd($this->all());

        $personnel = Employee::create([
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'phone' => $this->phone,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        $role = json_decode($this->input('role'));
//        dd(gettype($role->name));

        $personnel->attachRole($role->name);

        return $personnel;
    }
}
