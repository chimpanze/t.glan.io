<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Context
 *
 * @package App
 * @property TranslationString $name
 * @property TranslationString $context_key
 * @property TranslationString $project
*/
class Context extends Model
{
    use SoftDeletes;


    protected $fillable = ['name', 'context_key', 'project_id'];


    public static function storeValidation($request)
    {
        return [
            'name' => 'max:191|required|unique:contexts,name',
            'context_key' => 'max:191|required|unique:contexts,context_key',
            'project_id' => 'integer|exists:projects,id|max:4294967295|required'
        ];
    }

    public static function updateValidation($request)
    {
        return [
            'name' => 'max:191|required|unique:contexts,name,'.$request->route('context'),
            'context_key' => 'max:191|required|unique:contexts,context_key,'.$request->route('context'),
            'project_id' => 'integer|exists:projects,id|max:4294967295|required'
        ];
    }





    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id')->withTrashed();
    }


}
