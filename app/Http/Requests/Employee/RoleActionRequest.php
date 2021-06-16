<?php

namespace App\Http\Requests\Employee;

use App\Models\Role;
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
            'display_name' => ['string', 'max:80'],
            'description' => ['string', 'max:200'],
        ];
    }

    public function addRole(){
        $role = Role::create([
            'name' => $this->name,
            'display_name' => $this->display_name,
            'description' => $this->description,
        ]);

        foreach ($this->input('permissions') as $key => $permission){
            $role->attachPermission($key);
        }

        return $role;
    }

    public function updateRole($role){
        $role->update([
            'name' => $this->name,
            'display_name' => $this->display_name,
            'description' => $this->description,
        ]);

        $permissions = [];

        foreach ($this->input('permissions') as $key => $permission){
            array_push($permissions, $key);
        }

        $role->syncPermissions($permissions);

        return $role;
    }
}
