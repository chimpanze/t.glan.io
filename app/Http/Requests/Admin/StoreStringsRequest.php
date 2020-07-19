<?php
namespace App\Http\Requests\Admin;

use App\TranslationString;
use Illuminate\Foundation\Http\FormRequest;

class StoreStringsRequest extends FormRequest
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
        return TranslationString::storeValidation($this);
    }
}
