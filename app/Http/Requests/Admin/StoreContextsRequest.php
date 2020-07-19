<?php
namespace App\Http\Requests\Admin;

use App\Context;
use Illuminate\Foundation\Http\FormRequest;

class StoreContextsRequest extends FormRequest
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
        return Context::storeValidation($this);
    }
}
