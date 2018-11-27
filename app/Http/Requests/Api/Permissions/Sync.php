<?php

namespace App\Http\Requests\Api\Permissions;

use Dingo\Api\Http\FormRequest;

class Sync extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user()->can('sync', $this->route('permission'));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'roles.*' => 'exists:roles,id'

        ];
    }
}
