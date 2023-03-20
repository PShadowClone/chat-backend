<?php

namespace User\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Request extends \MP\Base\Http\Requests\Request
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
//            "username" => 'required',
//            'password' => 'required'
        ];
    }
}
