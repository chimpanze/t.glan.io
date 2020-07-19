<?php

namespace App\Http\Controllers\Api\V1;

use App\Translation;
use App\Http\Controllers\Controller;
use App\Http\Resources\Translation as TranslationResource;
use App\Http\Requests\Admin\StoreTranslationsRequest;
use App\Http\Requests\Admin\UpdateTranslationsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;



class TranslationsController extends Controller
{
    public function index()
    {


        return new TranslationResource(Translation::with(['string', 'language', 'context'])->get());
    }

    public function show($id)
    {
        if (Gate::denies('translation_view')) {
            return abort(401);
        }

        $translation = Translation::with(['string', 'language', 'context'])->findOrFail($id);

        return new TranslationResource($translation);
    }

    public function store(StoreTranslationsRequest $request)
    {
        if (Gate::denies('translation_create')) {
            return abort(401);
        }

        $requestData = $request->all();
        $translationCount = Translation::where([
            ['language_id', '=', $requestData['language_id']],
            ['string_id', '=', $requestData['string_id']],
            ['context_id', '=', $requestData['context_id']],
        ])->count();

        if($translationCount > 0) {
            return abort(409, 'Translation already exists.');
        }

        $translation = Translation::create($request->all());



        return (new TranslationResource($translation))
            ->response()
            ->setStatusCode(201);
    }

    public function update(UpdateTranslationsRequest $request, $id)
    {
        if (Gate::denies('translation_edit')) {
            return abort(401);
        }

        $translation = Translation::findOrFail($id);
        $translation->update($request->all());




        return (new TranslationResource($translation))
            ->response()
            ->setStatusCode(202);
    }

    public function destroy($id)
    {
        if (Gate::denies('translation_delete')) {
            return abort(401);
        }

        $translation = Translation::findOrFail($id);
        $translation->delete();

        return response(null, 204);
    }
}
