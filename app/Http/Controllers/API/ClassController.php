<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreClassRequest;
use App\Http\Requests\UpdateClassRequest;
use App\Http\Resources\ClassCollection;
use App\Http\Resources\ClassResource;
use App\Models\IClass;

class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new ClassCollection(IClass::with('major')->paginate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreClassRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClassRequest $request)
    {
        return (new ClassResource(IClass::create($request->validated())->load('major')))
            ->additional(['message' => "Class has been Submitted successfully"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\IClass  $class
     * @return \Illuminate\Http\Response
     */
    public function show(IClass $class)
    {
        return new ClassResource($class->load('major'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateClassRequest  $request
     * @param  \App\Models\IClass  $class
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateClassRequest $request, IClass $class)
    {
        $class->update($request->validated());

        return (new ClassResource($class->load('major')))
            ->additional(['message' => "Class updated successfully"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\IClass  $class
     * @return \Illuminate\Http\Response
     */
    public function destroy(IClass $class)
    {
        $class->delete();

        return response(['message' => 'Class deleted successfully']);
    }
}
