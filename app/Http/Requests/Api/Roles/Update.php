<?php

namespace App\Http\Requests\Api\Roles;

use Dingo\Api\Http\FormRequest;

class Update extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user()->can('update', $this->route('role'));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:250',
            'slug' => 'alpha_num|max:250|unique:roles,slug,' . $this->route('id'),
            'permissions.*' => 'exists:permissions,id'
        ];
    }

}
