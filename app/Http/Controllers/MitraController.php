<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMitraRequest;
use App\Http\Requests\UpdateMitraRequest;
use App\Models\Mitra;

class MitraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mitras = Mitra::all();
        return view('mitra', [
            'mitras' => $mitras
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
     * @param  \App\Http\Requests\StoreMitraRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMitraRequest $request)
    {
        if ($request->file('image') != null) {
            $image_path = "storage/" . $request->file('image')->store('images', 'public');
        } else {
            $image_path = 'images/no-image.jpeg';
        }
        Mitra::create([
            'name' => $request->name,
            'status' => $request->status,
            'image' => $image_path
        ]);
        return redirect('mitra')->with('success', 'Berhasil tambah mitra!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mitra  $mitra
     * @return \Illuminate\Http\Response
     */
    public function show(Mitra $mitra)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mitra  $mitra
     * @return \Illuminate\Http\Response
     */
    public function edit(Mitra $mitra)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMitraRequest  $request
     * @param  \App\Models\Mitra  $mitra
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMitraRequest $request, Mitra $mitra)
    {
        if ($request->file('image') != null) {
            $image_path = "storage/" . $request->file('image')->store('images', 'public');
            $data = [
                'name' => $request->name,
                'status' => $request->status,
                'image' => $image_path
            ];
        } else {
            $data = [
                'name' => $request->name,
                'status' => $request->status,
            ];
        }

        Mitra::find($mitra->id)->update($data);
        return redirect('mitra')->with('success', 'Berhasil ubah mitra!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mitra  $mitra
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mitra $mitra)
    {
        Mitra::destroy($mitra->id);
        return redirect('mitra')->with('success', 'Berhasil hapus mitra!');
    }
}
