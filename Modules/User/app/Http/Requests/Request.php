<?php

namespace User\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use MP\Base\Traits\Request\Fileable;
use User\App\Models\User;

class Request extends \Core\App\Http\Requests\Request
{
    use Fileable;

    /**
     * validation passed
     * @author Amr
     */
    public function prepareForValidation()
    {
        $this->beforePreparation();
        $hasFile = $this->hasFiles();
        if (!$hasFile)
            return;
        $this->parseAttributes();

    }

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
            'email' => 'required|unique:' . User::class . $this->id(),
            'username' => 'required|unique:' . User::class . $this->id(),
            'password' => Arr::exists($this->route()->methods(), "post") ? 'required' : 'sometimes'
        ];
    }

    /**
     * merge some attributes after passing the validation
     *
     * @return void
     * @author Amr
     */
    protected function passedValidation()
    {
        $this->route()->setParameter('id' , $this->route()->parameter('id') ?? authenticated_id());
        $this->merge([
            'name' => Str::random(6),
            'id' => $this->route()->parameter('id') ?? authenticated_id()
        ]);
    }

    /**
     * id of model
     * @author Amr
     */
    public function id()
    {
        return Auth::id() ? "," . Auth::id() : '';
    }
}
