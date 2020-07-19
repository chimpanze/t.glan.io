<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Translation
 *
 * @package App
 * @property TranslationString $string
 * @property TranslationString $language
 * @property TranslationString $context
 * @property text $translation
*/
class Translation extends Model
{
    use SoftDeletes;


    protected $fillable = ['translation', 'string_id', 'language_id', 'context_id'];


    public static function storeValidation($request)
    {
        return [
            'string_id' => 'integer|exists:translation_strings,id|max:4294967295|required',
            'language_id' => 'integer|exists:languages,id|max:4294967295|required',
            'context_id' => 'integer|exists:contexts,id|max:4294967295|required',
            'translation' => 'max:65535|required'
        ];
    }

    public static function updateValidation($request)
    {
        return [
            'string_id' => 'integer|exists:translation_strings,id|max:4294967295|required',
            'language_id' => 'integer|exists:languages,id|max:4294967295|required',
            'context_id' => 'integer|exists:contexts,id|max:4294967295|required',
            'translation' => 'max:65535|required'
        ];
    }





    public function string()
    {
        return $this->belongsTo(TranslationString::class, 'string_id')->withTrashed();
    }

    public function language()
    {
        return $this->belongsTo(Language::class, 'language_id')->withTrashed();
    }

    public function context()
    {
        return $this->belongsTo(Context::class, 'context_id')->withTrashed();
    }


}
