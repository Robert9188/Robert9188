<?php

namespace App\Http\Requests\Employee;

use Illuminate\Foundation\Http\FormRequest;

class RoleActionRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:20'],
            'display_name' => ['string', 'max:50'],
            'description' => ['string', 'max:200'],
        ];
    }

    public function addRole(){
        $role = Role::create([
            'name' => $this->name,
            'display_name' => $this->display_name,
            'description' => $this->description,
        ]);

        foreach ($request->input('permissions') as $key => $permission){
            $role->attachPermission($key);
        }
    }
}
