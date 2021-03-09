<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOfficerRequest;
use App\Http\Resources\OfficerCollection;
use App\Http\Resources\OfficerResource;
use App\Models\Officer;
use App\Models\User;
use Illuminate\Http\Request;

class OfficerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new OfficerCollection(Officer::with('user')->paginate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOfficerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOfficerRequest $request)
    {
        return (new OfficerResource(User::create(array_merge(
            $request->validated(),
            ['role_id' => 2, 'password' => bcrypt($request->password)]
        ))->officer()->create()))
            ->additional(['message' => "Officer has been Submitted successfully"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Officer  $officer
     * @return \Illuminate\Http\Response
     */
    public function show(Officer $officer)
    {
        return new OfficerResource($officer);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Officer  $officer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Officer $officer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Officer  $officer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Officer $officer)
    {
        //
    }
}
