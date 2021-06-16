<?php

namespace App\Http\Requests\Employee;

use App\Models\Permission;
use Illuminate\Foundation\Http\FormRequest;

class PermissionActionRequest extends FormRequest
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

    public function addPermission(){
        $permission = Permission::create([
            'name' => $this->name,
            'display_name' => $this->display_name,
            'description' => $this->description,
        ]);

        return $permission;
    }

    public function upadtePermission($permission){

        $permission->update([
            'name' => $this->name,
            'display_name' => $this->display_name,
            'description' => $this->description,
        ]);

        return $permission;
    }
}
