<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDocumentationRequest;
use App\Http\Requests\UpdateDocumentationRequest;
use App\Models\Documentation;

class DocumentationController extends Controller
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
     * @param  \App\Http\Requests\StoreDocumentationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDocumentationRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Documentation  $documentation
     * @return \Illuminate\Http\Response
     */
    public function show(Documentation $documentation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Documentation  $documentation
     * @return \Illuminate\Http\Response
     */
    public function edit(Documentation $documentation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDocumentationRequest  $request
     * @param  \App\Models\Documentation  $documentation
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDocumentationRequest $request, Documentation $documentation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Documentation  $documentation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Documentation $documentation)
    {
        //
    }
}
