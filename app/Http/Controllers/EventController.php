<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Models\Event;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::all();
        return view('event', [
            'events' => $events
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
     * @param  \App\Http\Requests\StoreEventRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEventRequest $request)
    {
        if ($request->file('image') != null) {
            $image_path = "storage/" . $request->file('image')->store('images', 'public');
        } else {
            $image_path = 'images/no-image.jpeg';
        }
        Event::create([
            'name' => $request->name,
            'slug' => strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $request->name))),
            'description' => $request->description,
            'status' => $request->status,
            'image' => $image_path
        ]);
        return redirect('event')->with('success', 'Berhasil tambah event!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEventRequest  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEventRequest $request, Event $event)
    {
        if ($request->file('image') != null) {
            $image_path = "storage/" . $request->file('image')->store('images', 'public');
            $data = [
                'name' => $request->name,
                'slug' => strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $request->name))),
                'description' => $request->description,
                'status' => $request->status,
                'image' => $image_path
            ];
        } else {
            $data = [
                'name' => $request->name,
                'slug' => strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $request->name))),
                'description' => $request->description,
                'status' => $request->status,
            ];
        }

        Event::find($event->id)->update($data);
        return redirect('event')->with('success', 'Berhasil ubah acara!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        Event::destroy($event->id);
        return redirect('event')->with('success', 'Berhasil hapus acara!');
    }
}
