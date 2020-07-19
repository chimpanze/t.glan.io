<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Project
 *
 * @package App
 * @property TranslationString $name
 * @property text $description
*/
class Project extends Model
{
    use SoftDeletes;


    protected $fillable = ['name', 'description'];


    public static function storeValidation($request)
    {
        return [
            'name' => 'max:191|required|unique:projects,name',
            'description' => 'max:65535|nullable'
        ];
    }

    public static function updateValidation($request)
    {
        return [
            'name' => 'max:191|required|unique:projects,name,'.$request->route('project'),
            'description' => 'max:65535|nullable'
        ];
    }






}
