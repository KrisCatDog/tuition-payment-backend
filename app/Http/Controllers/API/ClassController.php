<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\StoreClassRequest;
use App\Http\Requests\API\UpdateClassRequest;
use App\Http\Resources\ClassCollection;
use App\Http\Resources\ClassResource;
use App\Models\IClass;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('viewAny', IClass::class);

        return new ClassCollection(
            IClass::with('major')->search($request->search)->latest()->paginate($request->per_page)
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\API\StoreClassRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClassRequest $request)
    {
        $this->authorize('create', IClass::class);

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
        $this->authorize('view', $class);

        return new ClassResource($class->load('major'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\API\UpdateClassRequest  $request
     * @param  \App\Models\IClass  $class
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateClassRequest $request, IClass $class)
    {
        $this->authorize('update', $class);

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
        $this->authorize('delete', $class);

        $class->delete();

        return response(['message' => 'Class deleted successfully']);
    }
}
