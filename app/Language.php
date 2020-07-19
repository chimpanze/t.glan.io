<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Language
 *
 * @package App
 * @property TranslationString $name
 * @property TranslationString $iso_code
 * @property TranslationString $project
*/
class Language extends Model
{
    use SoftDeletes;


    protected $fillable = ['name', 'iso_code', 'project_id'];


    public static function storeValidation($request)
    {
        return [
            'name' => 'max:191|required|unique:languages,name',
            'iso_code' => 'max:191|required|unique:languages,iso_code',
            'project_id' => 'integer|exists:projects,id|max:4294967295|required'
        ];
    }

    public static function updateValidation($request)
    {
        return [
            'name' => 'max:191|required|unique:languages,name,'.$request->route('language'),
            'iso_code' => 'max:191|required',
            'project_id' => 'integer|exists:projects,id|max:4294967295|required'
        ];
    }





    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id')->withTrashed();
    }


}
