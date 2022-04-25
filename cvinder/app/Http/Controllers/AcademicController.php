<?php

namespace App\Http\Controllers;

use App\Models\Academic;
use App\Http\Requests\StoreAcademicRequest;
use App\Http\Requests\UpdateAcademicRequest;

class AcademicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAcademicRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAcademicRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Academic  $academic
     * @return \Illuminate\Http\Response
     */
    public function show(Academic $academic)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Academic  $academic
     * @return \Illuminate\Http\Response
     */
    public function edit(Academic $academic)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAcademicRequest  $request
     * @param  \App\Models\Academic  $academic
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAcademicRequest $request, Academic $academic)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Academic  $academic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Academic $academic)
    {
        //
    }
}
