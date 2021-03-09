<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTuitionRequest;
use App\Http\Requests\UpdateTuitionRequest;
use App\Http\Resources\TuitionCollection;
use App\Models\Tuition;

class TuitionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new TuitionCollection(Tuition::paginate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTuitionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTuitionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tuition  $tuition
     * @return \Illuminate\Http\Response
     */
    public function show(Tuition $tuition)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTuitionRequest  $request
     * @param  \App\Models\Tuition  $tuition
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTuitionRequest $request, Tuition $tuition)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tuition  $tuition
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tuition $tuition)
    {
        //
    }
}
