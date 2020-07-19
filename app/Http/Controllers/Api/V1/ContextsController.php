<?php

namespace App\Http\Controllers\Api\V1;

use App\Context;
use App\Http\Controllers\Controller;
use App\Http\Resources\Context as ContextResource;
use App\Http\Requests\Admin\StoreContextsRequest;
use App\Http\Requests\Admin\UpdateContextsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;



class ContextsController extends Controller
{
    public function index()
    {
        

        return new ContextResource(Context::with(['project'])->get());
    }

    public function show($id)
    {
        if (Gate::denies('context_view')) {
            return abort(401);
        }

        $context = Context::with(['project'])->findOrFail($id);

        return new ContextResource($context);
    }

    public function store(StoreContextsRequest $request)
    {
        if (Gate::denies('context_create')) {
            return abort(401);
        }

        $context = Context::create($request->all());
        
        

        return (new ContextResource($context))
            ->response()
            ->setStatusCode(201);
    }

    public function update(UpdateContextsRequest $request, $id)
    {
        if (Gate::denies('context_edit')) {
            return abort(401);
        }

        $context = Context::findOrFail($id);
        $context->update($request->all());
        
        
        

        return (new ContextResource($context))
            ->response()
            ->setStatusCode(202);
    }

    public function destroy($id)
    {
        if (Gate::denies('context_delete')) {
            return abort(401);
        }

        $context = Context::findOrFail($id);
        $context->delete();

        return response(null, 204);
    }
}
