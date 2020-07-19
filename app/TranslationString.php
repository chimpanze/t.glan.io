<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class String
 *
 * @package App
 * @property TranslationString $key
 * @property TranslationString $description
 * @property text $placholder_configuration
 * @property TranslationString $project
 * @property TranslationString $context
*/
class TranslationString extends Model
{
    use SoftDeletes;

    protected $fillable = ['key', 'description', 'placholder_configuration', 'project_id', 'context_id'];


    public static function storeValidation($request)
    {
        return [
            'key' => 'max:191|unique:translation_strings|required',
            'description' => 'max:191|required',
            'placholder_configuration' => 'max:65535|nullable',
            'project_id' => 'integer|exists:projects,id|max:4294967295|required',
            'context_id' => 'integer|exists:contexts,id|max:4294967295|required'
        ];
    }

    public static function updateValidation($request)
    {
        return [
            'key' => 'max:191|required',
            'description' => 'max:191|required',
            'placholder_configuration' => 'max:65535|nullable',
            'project_id' => 'integer|exists:projects,id|max:4294967295|required',
            'context_id' => 'integer|exists:contexts,id|max:4294967295|required'
        ];
    }





    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id')->withTrashed();
    }

    public function context()
    {
        return $this->belongsTo(Context::class, 'context_id')->withTrashed();
    }


}
