<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDocumentationRequest;
use App\Http\Requests\UpdateDocumentationRequest;
use App\Models\Documentation;
use League\CommonMark\Node\Block\Document;

class DocumentationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $documentations = Documentation::all();
        return view('documentation', [
            'documentations' => $documentations
        ]);
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
        if ($request->file('image') != null) {
            $image_path = "storage/" . $request->file('image')->store('images', 'public');
        } else {
            $image_path = 'images/no-image.jpeg';
        }
        Documentation::create([
            'name' => $request->name,
            'status' => $request->status,
            'embed_video' => $request->embed_video ?? '-',
            'image' => $image_path
        ]);
        return redirect('documentation')->with('success', 'Berhasil tambah dokumentasi!');
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
        if ($request->file('image') != null) {
            $image_path = "storage/" . $request->file('image')->store('images', 'public');
            $data = [
                'name' => $request->name,
                'status' => $request->status,
                'embed_video' => $request->embed_video ?? '-',
                'image' => $image_path
            ];
        } else {
            $data = [
                'name' => $request->name,
                'status' => $request->status,
                'embed_video' => $request->embed_video ?? '-',
            ];
        }

        Documentation::find($documentation->id)->update($data);
        return redirect('documentation')->with('success', 'Berhasil ubah dokumentasi!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Documentation  $documentation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Documentation $documentation)
    {
        Documentation::destroy($documentation->id);
        return redirect('documentation')->with('success', 'Berhasil hapus dokumentasi!');
    }
}
