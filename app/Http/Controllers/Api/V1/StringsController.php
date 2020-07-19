<?php

namespace App\Http\Controllers\Api\V1;

use App\TranslationString;
use App\Http\Controllers\Controller;
use App\Http\Resources\TranslationString as StringResource;
use App\Http\Requests\Admin\StoreStringsRequest;
use App\Http\Requests\Admin\UpdateStringsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;



class StringsController extends Controller
{
    public function index()
    {


        return new StringResource(TranslationString::with(['project', 'context'])->get());
    }

    public function show($id)
    {
        if (Gate::denies('string_view')) {
            return abort(401);
        }

        $string = TranslationString::with(['project', 'context'])->findOrFail($id);

        return new StringResource($string);
    }

    public function store(StoreStringsRequest $request)
    {
        if (Gate::denies('string_create')) {
            return abort(401);
        }

        $string = TranslationString::create($request->all());



        return (new StringResource($string))
            ->response()
            ->setStatusCode(201);
    }

    public function update(UpdateStringsRequest $request, $id)
    {
        if (Gate::denies('string_edit')) {
            return abort(401);
        }

        $string = TranslationString::findOrFail($id);
        $string->update($request->all());




        return (new StringResource($string))
            ->response()
            ->setStatusCode(202);
    }

    public function destroy($id)
    {
        if (Gate::denies('string_delete')) {
            return abort(401);
        }

        $string = TranslationString::findOrFail($id);
        $string->delete();

        return response(null, 204);
    }
}
