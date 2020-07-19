<?php

namespace App\Http\Controllers\Api\V1;

use App\Context;
use App\Language;
use App\Translation;
use App\TranslationString;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class OutputController extends Controller
{
    public function json($project_id, $context_key, $language_iso_code) {
        $translationStrings = TranslationString::where('project_id', '=', $project_id)->get();
        if($translationStrings->count() == 0) {
            throw new NotFoundHttpException();
        }
        $context = Context::where('context_key', '=', $context_key)->get()->first();
        if($context == null) {
            throw new NotFoundHttpException();
        }
        $language = Language::where('iso_code', '=', $language_iso_code)->get()->first();
        if($language == null) {
            throw new NotFoundHttpException();
        }
        $pluckedIds = $translationStrings->pluck('id');
        $translations = Translation::whereIn('string_id', $pluckedIds->toArray())->where([
            ['context_id', '=', $context->id],
            ['language_id', '=', $language->id]
        ])->with('string')->get();

        $outputArray = [];

        foreach($translations as $translation) {
            $outputArray[$context->context_key . '.' . $translation->string->key] = $translation->translation;
        }

        return response()->json($outputArray);
    }
}
